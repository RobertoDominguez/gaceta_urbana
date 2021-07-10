<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covers=Cover::orderBy('id','desc')->get();
        return view('admin.cover.index',compact('covers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cover.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title'=>'required|string',
            'author'=>'required|string',
            'content'=>'required|string',
        ]);

        $data=[
            'title'=>$request->title,
            'author'=>$request->author,
            'content'=>$request->content,
            'image_url'=>''
        ];

        if ($request->has('image')) {
            $data['image_url'] = $request->image->store('covers','public');
        }

        $cover=Cover::create($data);

        return redirect(route('admin.cover.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function show(Cover $cover)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function edit(Cover $cover)
    {
        return view('admin.cover.edit',compact('cover'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cover $cover)
    {
        $this->validate(request(),[
            'title'=>'required|string',
            'author'=>'required|string',
            'content'=>'required|string',
        ]);

        $data=[
            'title'=>$request->title,
            'author'=>$request->author,
            'content'=>$request->content,
        ];

        if ($request->has('image')) {
            Storage::disk('public')->delete($cover->image_url);
            $data['image_url'] = $request->image->store('covers','public');
        }

        $cover->update($data);

        return redirect(route('admin.cover.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cover  $cover
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cover $cover)
    {
        Storage::disk('public')->delete($cover->image_url);
        $cover->delete();
        return redirect(route('admin.cover.index'));
    }
}
