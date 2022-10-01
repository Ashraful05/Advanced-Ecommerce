<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function blogCategory()
    {
        $blogPostCategory = BlogPostCategory::latest()->get();
        return view('admin.blog.category.category_view',compact('blogPostCategory'));
    }
    public function saveBlogPostCategory(Request $request)
    {
        $this->validate($request,[
           'blog_category_name_english'=>'required',
        ]);
        BlogPostCategory::insert([
           'blog_category_name_english'=>$request->blog_category_name_english,
           'blog_category_name_bangla'=>$request->blog_category_name_bangla,
            'blog_category_slug_english'=>strtolower(str_replace(' ','_',$request->blog_category_name_english)),
            'blog_category_slug_bangla'=>strtolower(str_replace(' ','_',$request->blog_category_name_bangla)),
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Blog Post Category Info Saved Successfully'
        ];
        return redirect()->route('blog.category')->with($notification);
    }
    public function editBlogPostCategory($id)
    {
        $blogPostCategory = BlogPostCategory::findOrFail($id);
        return view('admin.blog.category.edit_category_view',compact('blogPostCategory'));
    }
    public function updateBlogPostCategory(Request $request,$id)
    {
        BlogPostCategory::findOrFail($id)->update([
            'blog_category_name_english'=>$request->blog_category_name_english,
            'blog_category_name_bangla'=>$request->blog_category_name_bangla,
            'blog_category_slug_english'=>strtolower(str_replace(' ','_',$request->blog_category_name_english)),
            'blog_category_slug_bangla'=>strtolower(str_replace(' ','_',$request->blog_category_name_bangla)),
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Blog Post Category Info Updated Successfully'
        ];
        return redirect()->route('blog.category')->with($notification);
    }
    public function deleteBlogPostCategory($id)
    {
        BlogPostCategory::findOrFail($id)->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Blog Post Category Info Deleted Successfully'
        ];
        return redirect()->route('blog.category')->with($notification);
    }
    public function viewBlogPost()
    {
        $blogPostList = BlogPost::with('blogCategory')->latest()->get();
        return view('admin.blog.post.view_blog_post',compact('blogPostList'));
    }
    public function addBlogPost()
    {
        $blogPost = BlogPost::latest()->get();
        $blogPostCategory = BlogPostCategory::latest()->get();
        return view('admin.blog.post.add_blog_post',compact('blogPost','blogPostCategory'));
    }
    public function saveBlogPost(Request $request)
    {
        $this->validate($request,[
           'post_title_english'=> 'required',
        ]);
        $image = $request->file('post_image');
        $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
        Image::make($image)->resize(300,200)->save('upload/blog_post_images/'.$name_gen);
        $save_url = 'upload/blog_post_images/'.$name_gen;
        BlogPost::create([
            'blog_category_id'=>$request->blog_category_id,
           'post_title_english'=>$request->post_title_english,
           'post_title_bangla'=>$request->post_title_bangla,
            'post_slug_english'=>strtolower(str_replace(' ','_',$request->post_title_english)),
            'post_slug_bangla'=>strtolower(str_replace(' ','_',$request->post_title_bangla)),
            'post_details_english'=>$request->post_details_english,
            'post_details_bangla'=>$request->post_details_bangla,
            'post_image'=>$save_url
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Blog Info Saved!!!'
        ];
        return redirect()->route('view.blog.post')->with($notification);
    }
    public function editBlogPost($id)
    {
        $post = BlogPost::find($id);
        $blogPostCategory = BlogPostCategory::get();
        return view('admin.blog.post.edit_blog_post',compact('post','blogPostCategory'));
    }
    public function updateBlogPost(Request $request,$id)
    {
        $oldImage = $request->old_image;
        if($request->file('post_image'))
        {
            unlink($oldImage);
            $image = $request->file('post_image');
            $name_gen = date('Y_m_d_Hi_').$image->getClientOriginalName();
            Image::make($image)->resize(300,200)->save('upload/blog_post_images/'.$name_gen);
            $save_url = 'upload/blog_post_images/'.$name_gen;
            BlogPost::find($id)->update([
                'blog_category_id'=>$request->blog_category_id,
                'post_title_english'=>$request->post_title_english,
                'post_title_bangla'=>$request->post_title_bangla,
                'post_slug_english'=>strtolower(str_replace(' ','_',$request->post_title_english)),
                'post_slug_bangla'=>strtolower(str_replace(' ','_',$request->post_title_bangla)),
                'post_details_english'=>$request->post_details_english,
                'post_details_bangla'=>$request->post_details_bangla,
                'post_image'=>$save_url,
            ]);
            $notification = [
                'alert-type'=>'info',
                'message'=>'BlogPost Info Updated!!!'
            ];
            return redirect()->route('view.blog.post')->with($notification);
        }else{
            BlogPost::find($id)->update([
                'blog_category_id'=>$request->blog_category_id,
                'post_title_english'=>$request->post_title_english,
                'post_title_bangla'=>$request->post_title_bangla,
                'post_slug_english'=>strtolower(str_replace(' ','_',$request->post_title_english)),
                'post_slug_bangla'=>strtolower(str_replace(' ','_',$request->post_title_bangla)),
                'post_details_english'=>$request->post_details_english,
                'post_details_bangla'=>$request->post_details_bangla,
            ]);
            $notification = [
                'alert-type'=>'info',
                'message'=>'BlogPost Info Updated!!!'
            ];
            return redirect()->route('view.blog.post')->with($notification);
        }

    }
    public function deleteBlogPost($id)
    {
        $post = BlogPost::find($id);
        unlink($post->post_image);
        BlogPost::find($id)->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Blog Info Deleted!!!'
        ];
        return redirect()->route('view.blog.post')->with($notification);
    }

}
