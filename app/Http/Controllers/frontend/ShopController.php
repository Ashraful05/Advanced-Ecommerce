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
        $products = Product::query();
        if (!empty($_GET['category'])){
            $slugs = explode(',',$_GET['category']);
            $categoryIds = Category::select('id')->whereIn('category_slug_english',$slugs)->pluck('id')->toArray();
            $products = $products->whereIn('category_id',$categoryIds)->paginate(3);
        }else{
            $products = Product::where('status',1)->orderby('id','desc')->paginate(3);
        }

        $categories = Category::orderby('category_name_english','asc')->get();
        return view('frontend.shop.shop_page',compact('products','categories'));
    }
    public function shopFilter(Request $request)
    {
        $data = $request->all();

        // Filter by Category

        $categoryUrl = '';
        if(!empty($data['category']))
        {
            foreach ($data['category'] as $category){
                if (empty($categoryUrl)){
                    $categoryUrl .= '&category='.$category;
                }else{
                    $categoryUrl .= ','.$category;
                }
            }
        }
        return redirect()->route('shop.page',$categoryUrl);
    }
}
