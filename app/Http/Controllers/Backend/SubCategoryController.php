<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $categories = Category::orderBy('category_name_english','asc')->get();
        $subCategories = SubCategory::latest()->get();
        return view('admin.subcategory.all_subcategory',compact('subCategories','categories'));
    }
    public function saveSubCategory(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'subcategory_name_english'=>'required',
            'subcategory_name_bangla'=>'required',
        ],[
            'category_id.required'=>'Select Any Category',
            'subcategory_name_english.required'=>'SubCategory name in english is required',
            'subcategory_name_bangla.required'=>'SubCategory name in bangla is required',
        ]);
//            $image = $request->file('category_icon');
//            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
//            Image::make($image)->resize(300,200)->save('upload/category_images'.$name_gen);
//            $save_url = 'upload/category_images'.$name_gen;
        SubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name_english'=>$request->subcategory_name_english,
            'subcategory_name_bangla'=>$request->subcategory_name_bangla,
            'subcategory_slug_english'=>strtolower(str_replace(' ','-',$request->subcategory_name_english)),
            'subcategory_slug_bangla'=>str_replace(' ','-',$request->subcategory_name_bangla),
        ]);
        $notification=array(
            'message'=>"SubCategory Info Saved!!",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSubCategory($id)
    {
        $categories = Category::orderBy('category_name_english','asc')->get();
        $editSubCategory = SubCategory::find($id);
        return view('admin.subcategory.edit_subcategory',compact('editSubCategory','categories'));
    }
    public function updateSubCategory(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'subcategory_name_english'=>'required',
            'subcategory_name_bangla'=>'required',
        ],[
            'category_id.required'=>'Select Any Category',
            'subcategory_name_english.required'=>'SubCategory name in english is required',
            'subcategory_name_bangla.required'=>'SubCategory name in bangla is required',
        ]);
        $subCategoryId = $request->id;
        SubCategory::findOrFail($subCategoryId)->update([
            'category_id'=>$request->category_id,
            'subcategory_name_english'=>$request->subcategory_name_english,
            'subcategory_name_bangla'=>$request->subcategory_name_bangla,
            'subcategory_slug_english'=>strtolower(str_replace(' ','-',$request->subcategory_name_english)),
            'subcategory_slug_bangla'=>str_replace(' ','-',$request->subcategory_name_bangla),
        ]);
        $notification=array(
            'message'=>"SubCategory Info Updated!!",
            'alert-type'=>'info'
        );
        return redirect()->route('all-subcategory')->with($notification);
    }
    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        $notification=array(
            'message'=>"SubCategory Info Deleted!!",
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

    //Sub-Sub-Category route....
    public function allSubSubCategory()
    {
        $categories = Category::orderBy('category_name_english','asc')->get();
        $subSubCategories = SubSubCategory::latest()->get();
        return view('admin.subcategory.all_subsubcategory',compact('categories','subSubCategories'));
    }
    public function getSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_english','asc')->get();
        return json_encode($subcat);
    }
    public function getSubSubCategory($subcategory_id)
    {
        $subSubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_english','asc')->get();
        return json_encode($subSubcat);
    }

    public function saveSubSubCategory(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_english'=>'required',
            'subsubcategory_name_bangla'=>'required',
        ],[
            'category_id.required'=>'Select Any Category',
            'subcategory_id.required'=>'Select Any SubCategory',
            'subsubcategory_name_english.required'=>'Sub SubCategory name in english is required',
            'subsubcategory_name_bangla.required'=>'Sub SubCategory name in bangla is required',
        ]);
//            $image = $request->file('category_icon');
//            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
//            Image::make($image)->resize(300,200)->save('upload/category_images'.$name_gen);
//            $save_url = 'upload/category_images'.$name_gen;
        SubSubCategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_english'=>$request->subsubcategory_name_english,
            'subsubcategory_name_bangla'=>$request->subsubcategory_name_bangla,
            'subsubcategory_slug_english'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_english)),
            'subsubcategory_slug_bangla'=>str_replace(' ','-',$request->subsubcategory_name_bangla),
        ]);
        $notification=array(
            'message'=>"Sub SubCategory Info Saved!!",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSubSubCategory($id)
    {
        $categories = Category::orderBy('category_name_english','asc')->get();
        $subCategories = SubCategory::orderBy('subcategory_name_english','asc')->get();
        $editsubSubCategory = SubSubCategory::findOrFail($id);
        return view('admin.subcategory.edit_subsubcategory',compact('categories','editsubSubCategory','subCategories'));
    }
    public function updateSubSubCategory(Request $request, $id)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_english'=>'required',
            'subsubcategory_name_bangla'=>'required',
        ],[
            'category_id.required'=>'Select Any Category',
            'subcategory_id.required'=>'Select Any SubCategory',
            'subsubcategory_name_english.required'=>'Sub SubCategory name in english is required',
            'subsubcategory_name_bangla.required'=>'Sub SubCategory name in bangla is required',
        ]);
        SubSubCategory::findOrFail($id)->update([
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_name_english'=>$request->subsubcategory_name_english,
            'subsubcategory_name_bangla'=>$request->subsubcategory_name_bangla,
            'subsubcategory_slug_english'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_english)),
            'subsubcategory_slug_bangla'=>str_replace(' ','-',$request->subsubcategory_name_bangla),
        ]);
        $notification=array(
            'message'=>"Sub SubCategory Info Updated!!",
            'alert-type'=>'info'
        );
        return redirect()->route('all-subsubcategory')->with($notification);
    }
    public function deleteSubSubCategory($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>"Sub SubCategory Info Deleted!!",
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }

}
