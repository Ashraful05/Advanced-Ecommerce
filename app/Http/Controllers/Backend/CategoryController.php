<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function allCateogry()
    {
        $categories = Category::latest()->get();
        return view('admin.category.all_category',compact('categories'));
    }
    public function saveCateogry(Request $request)
    {
        $this->validate($request,[
            'category_name_english'=>'required',
            'category_name_bangla'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name_english.required'=>'Category name in english required',
            'category_name_bangla.required'=>'Category name in bangla required',
            'category_icon.required'=>'Category Icon is required'
        ]);
//            $image = $request->file('category_icon');
//            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
//            Image::make($image)->resize(300,200)->save('upload/category_images'.$name_gen);
//            $save_url = 'upload/category_images'.$name_gen;
        Category::insert([
            'category_name_english'=>$request->category_name_english,
            'category_name_bangla'=>$request->category_name_bangla,
            'category_slug_english'=>strtolower(str_replace(' ','-',$request->category_name_english)),
            'category_slug_bangla'=>str_replace(' ','-',$request->category_name_bangla),
            'category_icon'=>$request->category_icon,
        ]);
        $notification=array(
            'message'=>"Category Info Saved!!",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editCateogry($id)
    {
        $editCategory = Category::findOrFail($id);
        return view('admin.category.edit_category',compact('editCategory'));
    }
    public function updateCategory(Request $request,$id)
    {
        $this->validate($request,[
            'category_name_english'=>'required',
            'category_name_bangla'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name_english.required'=>'Category name in english required',
            'category_name_bangla.required'=>'Category name in bangla required',
            'category_icon.required'=>'Category Icon is required'
        ]);
//        $categoryId = $request->id;
        Category::findOrFail($id)->update([
            'category_name_english'=>$request->category_name_english,
            'category_name_bangla'=>$request->category_name_bangla,
            'category_slug_english'=>strtolower(str_replace(' ','-',$request->category_name_english)),
            'category_slug_bangla'=>str_replace(' ','-',$request->category_name_bangla),
            'category_icon'=>$request->category_icon,
        ]);
//        dd($result);

        $notification=array(
            'message'=>"Category Info updated!!",
            'alert-type'=>'info'
        );
        return redirect()->route('all-category')->with($notification);
    }
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $notification=array(
            'message'=>"Category Info Deleted!!",
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
}
