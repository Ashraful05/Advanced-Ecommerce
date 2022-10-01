<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShippingArea;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\WishList;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request,$id)
    {
        if(Session::has('coupon'))
        {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if($product->discount_price == null){
            Cart::add([
               'id'=>$id,
               'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$product->selling_price,
                'weight'=>1,
                'options'=>[
                  'size'=>$request->size,
                  'color'=>$request->color,
                    'image'=>$product->product_thumbnail,
                ],
            ]);
            return response()->json(['success'=>'Product Successfully added to your cart']);
        }else{
            Cart::add([
                'id'=>$id,
                'name'=>$request->product_name,
                'qty'=>$request->quantity,
                'price'=>$product->discount_price,
                'weight'=>1,
                'options'=>[
                    'size'=>$request->size,
                    'image'=>$product->product_thumbnail,
                    'color'=>$request->color,
                ],
            ]);
            return response()->json(['success'=>'Product Successfully added to your cart']);
        }
    }

    public function addMiniCart()
    {
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
           'carts'=>$carts,
           'cartQuantity'=>$cartQuantity,
           'cartTotal'=> $cartTotal,
        ));
    }
    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success'=>'Product remove from cart successfully']);
    }
    public function addToWishlist(Request $request,$product_id)
    {
        if(Auth::check()){
            $exists = WishList::where('user_id',Auth::id())
                ->where('product_id',$product_id)
                ->first();
            if(!$exists)
            {
                WishList::create([
                    'user_id'=>Auth::id(),
                    'product_id'=>$product_id,
                ]);
                return response()->json(['success'=>'Product added to your wishlist']);
            }else{
                return response()->json(['error'=>'This Product already exists!']);
            }
        }else{
            return response()->json(['error'=>'First Login to your Account']);
        }
    }
    public function applyCoupon(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)
            ->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))
            ->first();
        if ($coupon) {
            $coupon_discount = (double)$coupon->coupon_discount;
            $cart_amount = (double)(Cart::total());
            $cart_amount = str_replace(',','', Cart::total());//12,00.00 eita astece. aitkate 1200.00 te convert kor
           // $cart_amount = floatval($cart_amount);
            $discount_amount = $cart_amount * $coupon_discount / 100;
            $total_amount = round($cart_amount - $discount_amount);
            $test = array(
                    'discount'=>array('type'=>gettype($coupon_discount), 'value'=>$coupon_discount),
                    'total'=>array('type'=>gettype(Cart::total()), 'value'=>[$cart_amount, Cart::total()])
                );
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon_discount,
                'discount_amount' => $discount_amount,
          //      'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
               'total_amount' =>$total_amount
//                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);


            return response()->json(array(
                'validity' => true,

                'test'=>$test,

                'success' => 'Coupon Applied Successfully'
            ));

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    }
    public function couponCalculation()
    {
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
//                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_name' => Session::get('coupon')['coupon_name'],
//                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'coupon_discount' =>Session::get('coupon')['coupon_discount'],
//                'discount_amount' => session()->get('coupon')['discount_amount'],
                'discount_amount' => Session::get('coupon')['discount_amount'],
//                'total_amount' => session()->get('coupon')['total_amount'],
            'total_amount'=>Session::get('coupon')['total_amount']
            ));
        }else{
            return response()->json([
                'total'=>Cart::total(),
            ]);
        }
    }
    public function couponRemove()
    {
        Session::forget('coupon');
        return response()->json(['success'=>'coupon removed successfully']);
    }
    //checkout methods...
    public function checkoutCreate()
    {
        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                $cartQuantity = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShippingDivision::orderby('division_name','asc')->get();
                $districts = ShippingDistrict::orderby('district_name','asc')->get();
                $areas = ShippingArea::orderby('area_name','asc')->get();

                return view('frontend.checkout.checkout_view',compact('carts','cartQuantity',
                    'cartTotal','divisions','districts','areas'));
            }else{
                $notification=[
                  'message'=>'Shop at least one product',
                  'alert-type'=>'warning'
                ];
                return redirect()->to('/')->with($notification);
            }

        }else{
            $notification = array(
              'message'=>'Login to your account',
              'alert-type'=>'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
