<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ReviewProduct;
use Illuminate\Http\Request;

class ReturnRequestController extends Controller
{
    public function returnRequest()
    {
        $orders = Order::where('return_order',1)->orderby('id','desc')->get();
        return view('admin.return_order.return_request',compact('orders'));
    }
    public function allRequest()
    {
        $orders = Order::where('return_order',2)->orderby('id','desc')->get();
        return view('admin.return_order.all_request',compact('orders'));
    }
    public function requestApprove($id)
    {
        Order::where('id',$id)->update(['return_order'=>2]);
        $notification=[
          'message'=>'Request Approved',
          'alert-type'=>'info'
        ];
        return redirect()->back()->with($notification);
    }
    public function pendingReview()
    {
        $reviews = ReviewProduct::where('status',0)->orderby('id','desc')->get();
        return view('admin.product_review.pending_review',compact('reviews'));
    }
    public function approveReview($id)
    {
        ReviewProduct::where(['id'=>$id])->update(['status'=>1]);
        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function publishReview()
    {
        $reviews = ReviewProduct::where('status',1)->orderby('id','desc')->get();
        return view('admin.product_review.publish_review',compact('reviews'));
    }
    public function reviewDelete($id)
    {
        ReviewProduct::find($id)->delete();
        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
