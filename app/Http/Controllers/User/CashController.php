<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function cashOrder(Request $request)
    {
        if(Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $cart_amount = (double)(Cart::total());
            $cart_amount = str_replace(',','',Cart::total());
            $total_amount = round($cart_amount);
        }

        $order_id = Order::insertGetId([
            'user_id'=>Auth::id(),
            'division_id'=>$request->division_id,
            'district_id'=>$request->district_id,
            'area_id'=>$request->area_id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'post_code'=>$request->post_code,
            'notes'=>$request->notes,

            'payment_type'=>'Cash On Delivery',
            'payment_method'=>'Cash On Delivery',

            'amount'=>$total_amount,
            'currency'=>'USD',


            'invoice_no'=>'EOS'.mt_rand(10000000,99999999),
            'order_date'=>Carbon::now()->format('d F Y'),
            'order_month'=>Carbon::now()->format('F'),
            'order_year'=>Carbon::now()->format('Y'),

            'status'=>'pending',
            'created_at'=>Carbon::now(),

        ]);

//        Send email start....
        $invoice = Order::findorfail($order_id);
        $data=[
            'invoice_no'=>$invoice->invoice_no,
            'amount'=>$total_amount,
            'name'=>$invoice->name,
            'email'=>$invoice->email,
        ];
        Mail::to($request->email)->send(new OrderMail($data));
//          Send email end....
        $carts = Cart::content();
        foreach ($carts as $cart){
            OrderItem::insert([
                'order_id'=>$order_id,
                'product_id'=>$cart->id,
                'color'=>$cart->options->color,
                'size'=>$cart->options->size,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'created_at'=>Carbon::now(),
            ]);
        }
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        Cart::destroy();
        $notification = [
            'message' => 'Your order placed successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('dashboard')->with($notification);
    }
}
