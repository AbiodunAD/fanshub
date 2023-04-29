<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Postcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Postcard $postcard, Request $request){

        request()->validate([
            'postcard_id' => 'required'
        ]);
        
        $currentuserid = Auth::user()->id;
        $postcard_id = $request->input('postcard_id');
        $like = $request->input('like');

        $likecheck = Like::where(['user_id'=>Auth::id(),'postcard_id'=>$request->postcard_id])->first();
        
        if($likecheck){
            Like::where(['user_id'=>Auth::id(),'postcard_id'=>$request->postcard_id])->delete();
            return back();
        }
        else{
            Like::create([
                'user_id' => $currentuserid,
                'postcard_id' => $postcard_id,
                'like' => $like
            ]);
        }
        return back();
    }




}
