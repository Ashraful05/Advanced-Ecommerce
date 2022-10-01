<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeBlogController extends Controller
{
    public function homeBlog()
    {
        $blogCategories = BlogPostCategory::latest()->get();
        $blogPosts = BlogPost::latest()->get();
        return view('frontend.blog.blog_list',compact('blogPosts','blogCategories'));
    }
    public function blogDetails($id)
    {
        $blogDetail = BlogPost::findOrFail($id);
        $blogCategories = BlogPostCategory::latest()->get();
        return view('frontend.blog.blog_details',compact('blogDetail','blogCategories'));
    }
    public function blogCategoryPost($id)
    {
        $blogCategories = BlogPostCategory::latest()->get();
        $blogPosts = BlogPost::where('blog_category_id',$id)->orderby('id','desc')->get();
        return view('frontend.blog.blog_category_list',compact('blogPosts','blogCategories'));
    }
}
