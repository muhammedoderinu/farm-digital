<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
        $new_posts = Post::whereDateIsAfter('created_at', Carbon::now()->subDays(7)->endOfWeek())
        ->paginate( $perPage = 2, $columns = ['*'], $pageName = 'blog')->load(['media', 'category']);

        $old_posts = Post::whereDateIsBefore('created_at', Carbon::now()->subDays(7)->endOfWeek())
        -> paginate( $perPage = 2, $columns = ['*'], $pageName = 'blog')->load(['media', 'category']);

        $first_post = Post::orderBy('created_at', 'desc')->paginate(1)->load(['media', 'category']);

        
        return view('blog', ['new_posts' => $new_posts,
                            'old_posts' => $old_posts,
                            'first_post' => $first_post]);
    }
}
