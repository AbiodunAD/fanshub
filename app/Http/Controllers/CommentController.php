<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Postcard;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Postcard $postcard, Request $request){

        request()->validate([
            'body' => 'required'
        ]);
        
        $currentuserid = Auth::user()->id;
        $postcard_id = $request->input('postcard_id');
        $body = $request->input('body');

        Comment::create([
            'user_id' => $currentuserid,
            'postcard_id' => $postcard_id,
            'body' => $body
        ]);

        // return response()->json(['success'=>'Successfully']);
        return back();
    }
}

