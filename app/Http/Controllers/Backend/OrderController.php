<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pendingOrders()
    {
        $orders = Order::where('status','pending')->orderby('id','desc')->get();
        return view('admin.orders.pending_orders',compact('orders'));
    }
    public function pendingOrderDetails($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();
        return view('admin.orders.pending_order_details',compact('order','orderItem'));
    }
    public function confirmedOrders()
    {
        $orders = Order::where('status','confirm')->orderby('id','desc')->get();
        return view('admin.orders.confirmed_order',compact('orders'));
    }
    public function processingOrders()
    {
        $orders = Order::where('status','processing')->orderby('id','desc')->get();
        return view('admin.orders.processing_orders',compact('orders'));
    }
    public function pickedOrders()
    {
        $orders = Order::where('status','picked')->orderby('id','desc')->get();
        return view('admin.orders.picked_orders',compact('orders'));
    }
    public function shippedOrders()
    {
        $orders = Order::where('status','shipped')->orderby('id','desc')->get();
        return view('admin.orders.shipped_orders',compact('orders'));
    }
    public function deliveredOrders()
    {
        $orders = Order::where('status','delivered')->orderBy('id','desc')->get();
        return view('admin.orders.delivered_orders',compact('orders'));
    }
    public function cancelOrders()
    {
        $orders = Order::where('status','cancel')->orderBy('id','desc')->get();
        return view('admin.orders.cancel_orders',compact('orders'));
    }
    public function pendingToConfirm($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'confirm']);
        $notification =[
            'message'=>'Order confirmed successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('pending-orders')->with($notification);
    }
    public function confirmToProcess($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'processing']);
        $notification =[
            'message'=>'Order confirmed successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('confirmed-orders')->with($notification);
    }
    public function processToPicked($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'picked']);
        $notification =[
            'message'=>'Order picked successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('processing-orders')->with($notification);
    }
    public function pickedToShipped($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'shipped']);
        $notification =[
            'message'=>'Order shipped successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('picked-orders')->with($notification);
    }
    public function shipToDeliver($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'delivered']);
        $notification =[
            'message'=>'Order delivered successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('shipped-orders')->with($notification);
    }
    public function deliverToCancel($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>'cancel']);
        $notification =[
            'message'=>'Order cancelled successfully!',
            'alert-type'=>'success',
        ];
        return redirect()->route('delivered-orders')->with($notification);
    }
    public function adminInvoiceDownload($order_id)
    {
        $order = Order::with('division','district','area','user')->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();
        $pdf = Pdf::loadView('admin.orders.admin_order_invoice',compact('order','orderItem'))
            ->setPaper('a4')
            ->setOptions([
           'tempDir'=>public_path(),
           'chroot'=>public_path(),
        ]);
        return $pdf->download('admin_invoice.pdf');
    }

}
