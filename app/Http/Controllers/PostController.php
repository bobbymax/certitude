<?php

namespace App\Http\Controllers;

use App\Post;
use App\Stream;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Image;

class PostController extends Controller
{
    /**
     * Construct for authentication
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $streams = Stream::all();
        $categories = Category::all();
        return view('backend.posts.create', compact('streams', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:3',
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->label = Str::slug($request->title);
        $post->tagline = $request->tagline;
        $post->category_id = $request->category_id;
        $post->stream_id = $request->stream_id;
        $post->content = $request->content;
        $post->is_published = $request->is_published;

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/posts/' . $filename);
            Image::make($file)->fit(1280, 720)->save($location);

            $post->featured_image = $filename;
        }

        auth()->user()->posts()->save($post);

        return redirect()->route('posts.index')->with('status', 'Post has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('backend.posts.edit', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $streams = Stream::all();
        $categories = Category::all();
        return view('backend.posts.edit', compact('post', 'streams', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string|min:3',
        ]);

        $post->title = $request->title;
        $post->label = Str::slug($request->title);
        $post->tagline = $request->tagline;
        $post->category_id = $request->category_id;
        $post->stream_id = $request->stream_id;
        $post->content = $request->content;
        $post->is_published = $request->is_published;

        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/posts/' . $filename);
            Image::make($file)->fit(1280, 720)->save($location);

            $post->featured_image = $filename;
        }

        $post->save();

        return redirect()->route('posts.index')->with('status', 'Post has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('status', 'Post has been deleted successfully.');
    }
}
