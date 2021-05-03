<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('Category')->latest()->paginate(10);
        return view('posts.index',[
            'posts' => $posts,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->cannot('createPost',Post::class)) abort(403);
        $categories = Category::all();
        return view('posts.create',[
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'by_category_id' => 'required'
        ]);
        $request['by_user_id'] = "{$user_id}";

        Post::create($request->all());
        return redirect()->route('posts.index')->with('success','Post created successully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::user()->cannot('updatePost',$post)) abort(403);
        $categories = Category::all();
        return view('posts.edit',[
            'categories' => $categories,
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        if(Auth::user()->cannot('updatePost',$post)) abort(403);
        $user_id = Auth::id();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'by_category_id' => 'required'
        ]);
        $request['by_user_id'] = "{$user_id}";

        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','Post created successully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Post $post)
    {
        if(Auth::user()->cannot('deletePost',$post)) abort(403);
        $post->delete();
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
}
