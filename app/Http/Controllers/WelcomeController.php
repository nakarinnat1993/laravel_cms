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
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view("welcome",compact('posts','categories','tags'));
    }
}
