<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    //
    public function show(Post $post){
        return view('blog.show',compact('post'));
    }
    public function category(Category $category){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = $category->posts()->paginate(1);
        return view('blog.category',compact('categories','tags','category','posts'));
    }
    public function tag(Tag $tag){
        $categories = Category::all();
        $tags = Tag::all();
        $posts = $tag->posts()->paginate(1);
        return view('blog.tag',compact('categories','tags','tag','posts'));
    }
}
