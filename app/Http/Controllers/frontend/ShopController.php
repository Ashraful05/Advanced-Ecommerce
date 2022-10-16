<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shopPage()
    {
        $products = Product::where('status',1)->orderby('id','desc')->paginate(3);
        $categories = Category::orderby('category_name_english','asc')->get();
        return view('frontend.shop.shop_page',compact('products','categories'));
    }
}
