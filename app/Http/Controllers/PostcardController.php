<?php

namespace App\Http\Controllers;
use cloudinary;

use App\Models\Like;
use App\Models\User;
use App\Models\Postcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostcardController extends Controller
{

     // Store Postcard Data
     public function storePostcard(Request $request) {
        $postcard = new Postcard;

        $request->validate([
            'post' => 'required|max:1000',
        ]);


        $data = $request->all();


        if($request->file('postimage')){
            $filepath = $this->uploadImageToStorage($request->file('postimage'), $data['post']);
            $data['postimage'] = $filepath;
        }

        if($request->file('postvideo')){
            $filepath = $this->uploadImageToStorage($request->file('postvideo'), $data['post']);
            $data['postvideo'] = $filepath;
        }

       $data['user_id'] = auth()->id();

        Postcard::create($data);

        return back()->with('success', 'Post created successfully');
    }



    public function updatePostcard(Request $request, $id){
        $postcard = Postcard::find($id);

        $postcard->post = $request->input('post');
        
        if($request->file('postimage')){
            $filepath = $this->uploadImageToStorage($request->file('postimage'), $postcard->post);
            $postcard->postimage = $filepath;
        }

        if($request->file('postvideo')){
            $filepath = $this->uploadImageToStorage($request->file('postvideo'), $postcard->post);
            $postcard->postvideo = $filepath;
        }  
        
        if(Auth::user() != $postcard->user) {
            return redirect()->back()->with('success', 'You are not allowed to edit posts by other users');
        }

        $postcard->update();
        
        return back()->with('success', 'Post updated successfully');
    }


    public function deletePostcard($postcard_id){
        $postcard = Postcard::where('id', $postcard_id)->first();
        if(Auth::user() != $postcard->user) {
            return redirect()->back()->with('message', 'You are not allowed to delete posts by other users');
        }
        $postcard->delete();
        return back()->with('success', 'Post deleted successfully');
    }


}


