<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with(['User','Category'])->orderby('created_at','DESC')->paginate(10);
        return view('include.home',[
            'posts' => $posts
        ]);
    }

    public function view(Post $post)
    {
        return view('include.view',[
            'post' => $post,
        ]);
    }
}
