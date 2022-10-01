<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShippingArea;
use App\Models\ShippingDistrict;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function districtGetAjax($division_id)
    {
        $ship = ShippingDistrict::where('division_id',$division_id)->orderby('district_name','asc')->get();
        return response()->json($ship);

    }
    public function areaGetAjax($district_id)
    {
        $area = ShippingArea::where('district_id',$district_id)->orderby('area_name','asc')->get();
        return response()->json($area);
    }
    public function saveCheckout(Request $request)
    {
//        return $request->all();
        $data = array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_phone']=$request->shipping_phone;
        $data['post_code']=$request->post_code;
        $data['notes']=$request->notes;
        $data['area_id']=$request->area_id;
        $data['district_id']=$request->district_id;
        $data['division_id']=$request->division_id;
        $data['order_id']=$request->order_id;
        $cartTotal = Cart::total();

        if($request->payment_method=='stripe'){
            return view('frontend.payment.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_method=='card'){
            return view('frontend.payment.card',compact('data','cartTotal'));
        }else{
            return view('frontend.payment.cash',compact('data','cartTotal'));
        }


    }
}
