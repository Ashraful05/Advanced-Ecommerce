<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderby('id','desc')->get();
        return view('frontend.user.order.order_view',compact('orders'));

    }
    public function orderDetails($order_id)
    {
        $order = Order::with('division','district','area','user')
                ->where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem = OrderItem::with('product')
                    ->where('order_id',$order_id)
                    ->orderby('id','desc')
                    ->get();
        return view('frontend.user.order.order_details',compact('order','orderItem'));
    }
    public function orderInvoiceDownload($order_id)
    {
        $order = Order::with('division','district','area','user')
            ->where(['id'=>$order_id,'user_id'=>Auth::id()])
            ->first();
//        $order = Order::where('id',$order_id)->where('user_id',Auth::id())->first();

        $orderItem = OrderItem::with('product')
            ->where('order_id',$order_id)
            ->orderby('id','desc')
            ->get();
//        return view('frontend.user.order.order_invoice',compact('order','orderItem'));
        $pdf = Pdf::loadView('frontend.user.order.order_invoice',
            compact('order','orderItem'))->setPaper('a4')
            ->setOptions([
                'tempDir' => public_path(),
                'chroot' => public_path()
        ]);
        return $pdf->download('invoice.pdf');
    }
    public function returnOrder(Request $request,$order_id)
    {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    }
    public function returnOrderList()
    {
        $orders = Order::where('user_id',Auth::id())
                        ->where('return_reason','!=',NULL)->orderby('id','desc')
                        ->get();
        return view('frontend.user.order.return_order_list',compact('orders'));
    }
    public function cancelOrder()
    {
        $orders = Order::where(['user_id'=>Auth::id(),'status'=>'cancel'])->orderby('id','desc')->get();
        return view('frontend.user.order.cancel_order_list',compact('orders'));
    }
}
