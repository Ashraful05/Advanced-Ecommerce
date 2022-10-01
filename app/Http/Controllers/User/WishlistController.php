<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function viewWishList()
    {
        return view('frontend.wishlist.view_wishlist');
    }

    public function getWishlistProduct()
    {
        $wishlist = WishList::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function removeWishlistProduct($id)
    {
        WishList::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=>'Product remove from wishlist successfully']);
    }
}
