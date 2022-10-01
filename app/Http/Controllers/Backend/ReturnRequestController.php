<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
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
}
