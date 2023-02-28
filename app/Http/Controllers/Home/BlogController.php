<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class BlogController extends Controller{
    //
    public function AllBlog(){

        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function AddBlog(){
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blog_add',compact('categories'));
    }

    public function StoreBlog(Request $request){
        $request->validate([
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_image' => 'required',
        ],[
            'blog_title.required' => 'blog Name is required',
            'blog_tags.required' => 'blog Title is required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = $image->getClientOriginalExtension();

        Image::make($image)->resize(636,852)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
 
    $notification = array(
        'message' => 'Insert blog Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id){

        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('admin.blogs.blog_edit', compact('blog', 'categories'));
    }

    public function UpdateBlog(Request $request){

        $blog_id = $request->id;

        if($request->file('blog_image')){
            $image = $request->file('blog_image');
            $name_gen = $image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Blog Updated with Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
        }else{
                Blog::findOrFail($blog_id)->update([
                    'blog_category_id' => $request->blog_category_id,
                    'blog_title' => $request->blog_title,
                    'blog_tags' => $request->blog_tags,
                    'blog_description' => $request->blog_description,
            ]);
            
        $notification = array(
            'message' => 'Blog Updated without Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
        }
    }

    public function DeleteBlog($id){

        $blog = Blog::findOrFail($id);

        $img = $blog->blog_image;
        unlink($img);
    
        Blog::findOrFail($id)->delete();
    
        $notification = array(
            'message' => 'Blog Deleted Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function BlogDetails($id){

        $blog = Blog::findOrFail($id);

        $allblogs = Blog::latest()->limit(5)->get();

       // $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogcategory = BlogCategory::latest()->get();

        return view('frontend.blog_details', compact('blog', 'allblogs', 'blogcategory'));
    }

    public function CategoryBlog($id){
        $blogpost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();

        $blog = Blog::findOrFail($id);

        $allblogs = Blog::latest()->limit(5)->get();

       $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogcategory = BlogCategory::latest()->get();

        $categoryname = BlogCategory::findOrFail($id);

        return view('frontend.cat_blog_details', compact('blog', 'blogpost', 'allblogs', 'categories', 'blogcategory', 'categoryname'));

    }

    public function HomeBlog(){

        $allblogs = Blog::latest()->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('frontend.blog', compact('allblogs', 'categories'));
    }
}
