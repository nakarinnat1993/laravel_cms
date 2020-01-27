<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $search=request()->query('search');
        if($search){
            $posts=Post::Where('title',"like","%$search%")->paginate(1);
        }else{
            $posts = Post::orderBy('id', 'desc')->paginate(2);
        }
        $categories = Category::all();
        $tags = Tag::all();
        return view("welcome",compact('posts','categories','tags'));
    }
}
