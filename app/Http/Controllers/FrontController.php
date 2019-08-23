<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', '=', Post::PUBLISHED)->where('published_at', '<=', Carbon::today())->get();
        return view('front.post.index', compact('posts'));
    }
    
    public function show(Post $post)
    {
        return view('front.post.show', compact('post'));
    }
}
