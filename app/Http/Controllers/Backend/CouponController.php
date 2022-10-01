<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function viewCoupon()
    {
        $coupons = Coupon::orderby('id','desc')->get();
        return view('admin.coupon.view_coupon',compact('coupons'));
    }
    public function saveCoupon(Request $request)
    {
        $this->validate($request,[
            'coupon_name'=>'required',
            'coupon_discount'=>'required|numeric',
            'coupon_validity'=>'required'
        ],[
            'coupon_name.required'=>'Coupon name is required',
            'coupon_discount.required'=>'Discount required in numeric',
            'coupon_validity.required'=>'Coupon validity is required',
        ]);
        Coupon::create([
           'coupon_name'=>strtoupper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity
        ]);
        $notification = array(
          'message'=>'Coupon Info Saved Successfully!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }
    public function updateCoupon(Request $request, $id)
    {
        $this->validate($request,[
            'coupon_name'=>'required',
            'coupon_discount'=>'required|numeric',
            'coupon_validity'=>'required'
        ],[
            'coupon_name.required'=>'Coupon name is required',
            'coupon_discount.required'=>'Discount required in numeric',
            'coupon_validity.required'=>'Coupon validity is required',
        ]);
        Coupon::find($id)->update([
            'coupon_name'=>strtoupper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity'=>$request->coupon_validity
        ]);
        $notification = array(
            'message'=>'Coupon Info updated!',
            'alert-type'=>'info'
        );
        return redirect()->route('manage-coupon')->with($notification);
    }
    public function deleteCoupon($id)
    {
        Coupon::find($id)->delete();
        $notification = array(
            'message'=>'Coupon Info deleted!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
