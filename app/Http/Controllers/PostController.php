<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\MediaType;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PostController extends Controller
{

    public function index(){
        return view('form', ['categories'=> BlogCategory::all()->pluck('name')]);
    }


    public function store( Request $request){

        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string|max:100',
            'author' => 'required|string|max:100',
            'category' => 'required|exists:blog_categories,name',
            'images' => 'required',
            'images.*' => 'file|image|max:5120',
        ]);

        $category = BlogCategory::where('name', $request->category)->first();

        $post = Post::create([
           
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $category->id,
            'author' => $request->input('author'),
        ]);

        $type = MediaType::where('name', 'image')->first();
        
    
        $path = $request->file('images')->storePublicly(Post::mediaDir(), $disk = Post::mediaDisk());
        $thumbnail = ['path' => $path, 'disk' => $disk, 'type_id' => $type->id];
        $post->media()->updateOrCreate(['description' => 'thumbnail'], $thumbnail);


        return back();
    }

  
}
