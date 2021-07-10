<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cover $cover)
    {
        $posts=Post::where('cover_id',$cover->id)->get();
        return view('admin.post.index',compact('cover','posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cover $cover)
    {
        return view('admin.post.create',compact('cover'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cover $cover,Request $request)
    {

        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
            'cover_id'=>$cover->id,
            'image_url'=>''
        ];

        if ($request->has('image')) {
            $data['image_url'] = $request->image->store('posts','public');
        }

        $post=Post::create($data);

        return redirect(route('admin.post.index',$cover->id));
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
        return view('admin.post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data=[
            'title'=>$request->title,
            'content'=>$request->content,
        ];

        if ($request->has('image')) {
            Storage::disk('public')->delete($post->image_url);
            $data['image_url'] = $request->image->store('posts','public');
        }

        $post->update($data);

        return redirect(route('admin.post.index',$post->cover_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image_url);
        $cover_id=$post->cover_id;
        $post->delete();
        return redirect(route('admin.post.index',$cover_id));
    }
}
