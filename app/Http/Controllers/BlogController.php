<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(){
        $new_posts = Post::whereDateIsAfter('created_at', Carbon::now()->subDays(7)->startOfWeek())
        ->paginate(1)->load(['media', 'category']);

        dd($new_posts);


        $old_posts = Post::whereDateIsBefore('created_at', Carbon::now()->subDays(7)->startOfWeek())
        -> paginate(1)->load(['media', 'category']);

        $first_post = Post::orderBy('created_at', 'desc')->paginate(1)->load(['media', 'category']);

        
        return view('blog', ['new_posts' => $new_posts,
                            'old_posts' => $old_posts,
                            'first_post' => $first_post]);
    }
}
