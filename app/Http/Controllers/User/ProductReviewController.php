<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReviewProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function saveReview(Request $request)
    {
        $product = $request->product_id;
        $this->validate($request,[
           'summary'=>'required',
           'comment'=>'required'
        ]);
        ReviewProduct::insert([
           'product_id'=>$product,
            'user_id'=>Auth::id(),
            'summary'=>$request->summary,
            'comment'=>$request->comment,
            'created_at'=>Carbon::now(),
        ]);
        $notification=[
          'message'=>'Product Review will approved by admin!',
          'alert-type'=>'success'
        ];
        return redirect()->back()->with($notification);
    }
}
