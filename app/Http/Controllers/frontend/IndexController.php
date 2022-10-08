<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderby('category_name_english','asc')->get();
        $sliders = Slider::where('status',1)->orderby('id','desc')->limit(3)->get();
        $products = Product::where('status',1)->orderby('id','desc')->limit(6)->get();
        $features = Product::where('featured',1)->orderby('id','desc')->limit(5)->get();
        $hotDeals = Product::where('hot_deals',1)->where('discount_price','!=',Null)->orderby('id','desc')->limit(5)->get();
        $specialOffers = Product::where('special_offer',1)->orderby('id','desc')->limit(5)->get();
        $specialDeals = Product::where('special_deals',1)->orderby('id','desc')->limit(5)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)
            ->orderby('id','desc')->limit(5)
            ->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)
            ->where('category_id',$skip_category_1->id)
            ->orderby('id','desc')->limit(5)
            ->get();
        $skip_brand_0 = Brand::skip(0)->first();
        $skip_product_brand_0 = Product::where('status',1)
            ->where('brand_id',$skip_brand_0->id)
            ->orderby('id','desc')->limit(5)
            ->get();
//        return $skip_product_brand_0;
        $blogPosts = BlogPost::latest()->get();
        return view('frontend.index',
            compact('categories',
            'sliders','products','features',
            'hotDeals','specialOffers','specialDeals',
        'skip_category_0','skip_product_0','skip_category_1',
                'skip_product_1','skip_brand_0','skip_product_brand_0','blogPosts'));
    }
    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));

    }
    public function userProfileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;

        if($request->file('profile_photo_path'))
        {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $fileName = date('Y_m_d_Hi_').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);
            $data->profile_photo_path = $fileName;
        }
        $data->save();
        $notification = array(
            'message'=>"User Profile Updated Successfully!!!",
            'alert-type'=>'success'
        );
        return redirect()->route('user.profile')->with($notification);
    }
    public function changePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
      return view('frontend.profile.change_password',compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required',
            'password'=>'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password,$hashedPassword))
        {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            $notification = array(
                'message'=>"User Password Changed Successfully & now login with your new password!!!",
                'alert-type'=>'success'
            );
            return redirect()->route('login')->with($notification);
        }
    }
    public function productDetails($id,$slug)
    {
        $product = Product::findOrFail($id);
        $color_english = $product->product_color_english;
        $product_color_english = explode(',',$color_english);
        $color_bangla = $product->product_color_bangla;
        $product_color_bangla = explode(',',$color_bangla);
        $size_english = $product->product_size_english;
        $product_size_english = explode(',',$size_english);
        $size_bangla = $product->product_size_bangla;
        $product_size_bangla = explode(',',$size_bangla);

        $multiImages = MultiImage::with('product')->where('product_id',$id)->get();
        $category_id = $product->category_id;
        $relatedProduct = Product::where('category_id',$category_id)
            ->where('id','!=',$id)
            ->orderby('id','desc')
            ->get();
        return view('frontend.product.product_details',compact('product',
            'multiImages','product_color_english','product_color_bangla',
            'product_size_english','product_size_bangla','relatedProduct'));
    }
    public function tagWiseProduct($tag)
    {
        $products = Product::where('status',1)
            ->where('product_tag_english',$tag)
            ->where('product_tag_bangla',$tag)
            ->orderby('id','desc')
            ->paginate(3);
        $categories = Category::orderby('category_name_english','asc')->get();
        return view('frontend.product.tag_wise_product',compact('products','categories'));
    }
    public function subCategoryWiseProduct($subcategory_id,$slug)
    {
        $products = Product::where('status',1)
            ->where('subcategory_id',$subcategory_id)
            ->orderby('id','desc')
            ->paginate(3);
        $categories = Category::orderby('category_name_english','asc')->get();
        $breadcrumbSubCategory = SubCategory::with('category')->where('id',$subcategory_id)->get();
        return view('frontend.product.sub_category_wise_product',compact(
            'products','categories','breadcrumbSubCategory'));
    }
    public function subSubCategoryWiseProduct($sub_subcategory_id,$slug)
    {
        $products = Product::where('status',1)
            ->where('sub_subcategory_id',$sub_subcategory_id)
            ->orderby('id','desc')
            ->paginate(3);
        $categories = Category::orderby('category_name_english','asc')->get();
        $breadcrumbSubSubCategory = SubSubCategory::with(['category','subcategory'])->where('id',$sub_subcategory_id)->get();
        return view('frontend.product.sub_sub_category_wise_product',compact(
            'products','categories','breadcrumbSubSubCategory'));
    }

    //product view with ajax......
    public function productViewAjax($id)
    {
        $product = Product::with('category','brand')->findOrFail($id);
        $color = $product->product_color_english;
        $product_color = explode(',',$color);
        $size = $product->product_size_english;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }

    public function productSearch(Request $request)
    {
        $item = $request->search;
        $categories = Category::orderby('category_name_english','asc')->get();
        $products = Product::where('product_name_english','LIKE',"%$item%")->get();
        return view('frontend.product.product_search',compact('categories','products'));
    }
}
