<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function addProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $subSubCategories = SubSubCategory::latest()->get();
        return view('admin.product.add_product',compact('categories','brands','subCategories','subSubCategories'));
    }
    public function manageProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.manage_product',compact('products'));
    }
    public function saveProduct(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
        Image::make($image)->resize(300,200)->save('upload/product_images/thumbnail_images/'.$name_gen);
        $save_url = 'upload/product_images/thumbnail_images/'.$name_gen;
        $productId = Product::insertGetId([
           'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'sub_subcategory_id'=>$request->sub_subcategory_id,
            'product_name_english'=>$request->product_name_english,
            'product_name_bangla'=>$request->product_name_bangla,
            'product_slug_english'=>strtolower(str_replace(' ','-',$request->product_name_english)),
            'product_slug_bangla'=>str_replace(' ','-',$request->product_name_bangla),
            'product_code'=>$request->product_code,
            'product_quantity'=>$request->product_quantity,
            'product_tag_english'=>$request->product_tag_english,
            'product_tag_bangla'=>$request->product_tag_bangla,
            'product_size_english'=>$request->product_size_english,
            'product_size_bangla'=>$request->product_size_bangla,
            'product_color_bangla'=>$request->product_color_bangla,
            'product_color_english'=>$request->product_color_english,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description_english'=>$request->short_description_english,
            'short_description_bangla'=>$request->short_description_bangla,
            'long_description_bangla'=>$request->long_description_bangla,
            'long_description_english'=>$request->long_description_english,
            'product_thumbnail'=>$save_url,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,

        ]);

        //multiple image upload start........
        $images = $request->file('multi_image');
        foreach($images as $image)
        {
            $makeName = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(300,200)->save('upload/product_images/multi_images/'.$makeName);
            $uploadPath = 'upload/product_images/multi_images/'.$makeName;
            MultiImage::insert([
               'product_id'=>$productId,
                'photo_name'=>$uploadPath,
            ]);
        }
        $notification = array(
            'message'=>'Product Info Added Successfully!!',
            'alert-type'=>'success'
        );
        return redirect()->route('manage-product')->with($notification);
    }
    public function editProduct($id)
    {
        $multiImages = MultiImage::where('product_id',$id)->get();
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('admin.product.edit_product',compact('categories','brands',
            'subcategories','subsubcategories','product','multiImages'));
    }
    public function updateProduct(Request $request,$id)
    {

        Product::findOrFail($id)->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'sub_subcategory_id'=>$request->sub_subcategory_id,
            'product_name_english'=>$request->product_name_english,
            'product_name_bangla'=>$request->product_name_bangla,
            'product_slug_english'=>strtolower(str_replace(' ','-',$request->product_name_english)),
            'product_slug_bangla'=>str_replace(' ','-',$request->product_name_bangla),
            'product_code'=>$request->product_code,
            'product_quantity'=>$request->product_quantity,
            'product_tag_english'=>$request->product_tag_english,
            'product_tag_bangla'=>$request->product_tag_bangla,
            'product_size_english'=>$request->product_size_english,
            'product_size_bangla'=>$request->product_size_bangla,
            'product_color_bangla'=>$request->product_color_bangla,
            'product_color_english'=>$request->product_color_english,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_description_english'=>$request->short_description_english,
            'short_description_bangla'=>$request->short_description_bangla,
            'long_description_bangla'=>$request->long_description_bangla,
            'long_description_english'=>$request->long_description_english,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
        ]);
        $notification = array(
            'message'=>'Product Info Updated Successfully!!',
            'alert-type'=>'info'
        );
        return redirect()->route('manage-product')->with($notification);
    }
    public function updateProductMultiImage(Request $request)
    {
        $images = $request->multi_image;
//        dd($images);
        foreach ($images as $id => $image)
        {
            $imageDelete = MultiImage::findOrFail($id);
            unlink($imageDelete->photo_name);
            $makeName = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(300,200)->save('upload/product_images/multi_images/'.$makeName);
            $uploadPath = 'upload/product_images/multi_images/'.$makeName;
            MultiImage::where('id',$id)->update([
                'photo_name'=>$uploadPath,
            ]);
        }
        $notification = array(
            'message'=>'Product Multiple Image Updated Successfully!!',
            'alert-type'=>'info'
        );
//        return redirect()->route('manage-product')->with($notification);
        return redirect()->back()->with($notification);
    }
    public function updateProductThumbnailImage(Request $request,$id)
    {
        $oldImage = $request->old_img;
        unlink($oldImage);
        $image = $request->file('product_thumbnail');
        $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
        Image::make($image)->resize(300,200)->save('upload/product_images/thumbnail_images/'.$name_gen);
        $save_url = 'upload/product_images/thumbnail_images/'.$name_gen;
        Product::findOrFail($id)->update([
            'product_thumbnail'=>$save_url
        ]);
        $notification = array(
            'message'=>'Product Thumbnail Image Updated Successfully!!',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);
    }
    public function multiImageDelete($id)
    {
        $oldImage = MultiImage::findOrFail($id);
        unlink($oldImage->photo_name);
        MultiImage::findOrFail($id)->delete();
        $notification = array(
            'message'=>'Product Multiple Image Successfully Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function detailsProduct($id)
    {

    }
    public function inActiveProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message'=>'Product is InActive!!',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function activeProduct($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message'=>'Product is Active!!',
            'alert-type'=>'info'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        $images = MultiImage::where('product_id',$id)->get();
        foreach($images as $image)
        {
            unlink($image->photo_name);
            MultiImage::where('product_id',$id)->delete();
        }
        $notification = array(
            'message'=>'Product Info is Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
