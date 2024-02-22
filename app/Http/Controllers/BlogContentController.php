<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    public function index(Post $post)
    {
     
        return view('blog_content', ['post' =>  $post->load(['media', 'category']) ]);

    }
}
