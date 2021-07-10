<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request){
        $cant_covers=Cover::count();
        
        $pagination=$request->pagination;
        if (is_null($pagination)){
            $pagination=0;
        }
        $fin=$cant_covers<=$pagination+5; 
        

        $covers=Cover::orderBy('id','desc')->skip($pagination)->take(5)->get();
        return view('blog',compact('covers','fin'),compact('pagination'));
    }

    public function about(){
        return view('about');
    }

    public function post(Cover $cover){
        $posts=Post::where('cover_id',$cover->id)->orderBy('id','asc')->get();
        return view('post',compact('posts','cover'));
    }

}
