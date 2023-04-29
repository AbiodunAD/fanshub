<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Page;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Comment;
use App\Models\Postcard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('landing')->with('user', $user);
    }


    // public function landing(Request $request)
    // {
    //     $user = Auth::user();
    //     return view('landing')->with('user', $user);
    // }

     public function contact(Request $request)
    {
        
        $user = Auth::user();
        return view('contact')->with('user', $user);
    }

    public function sendmail(Request $request)
    {
     $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email',
      'phone' => 'required',
      'message' => 'required'
     ]);

        $data = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'message'   => $request->message
        );

     Mail::to('info@dientweb.net')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us! We will get back to you soon.');

    }


    public function singlepostcard(Postcard $postcard, $id){

        $postcard = Postcard::findOrFail($id);
        $comments = Comment::all();  
        $likes = Like::all();
        $users = User::all();
        $user = Auth::user();

        return view('singlepostcard')
            ->with('postcard', $postcard)
            ->with('comments', $comments)
            ->with('likes', $likes)
            ->with('users', $users)
            ->with('user', $user);
    }
    

    public function information()
    {
        $pages = Page::all();
        $user = Auth::user();
        return view('fans.information')
            ->with('pages', $pages)
            ->with('user', $user);
    }

    public function showpages()
    {
        $pages = Page::all();
        $user = Auth::user();
        return view('admin.pages')
            ->with('pages', $pages)
            ->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createpage');
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
             'title' => 'required',
             'body' => 'required'
        ]);

        // $slug = Str::slug($request->title); 
   
        $page = Page::create([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt
        ]);
   
        return redirect('admin-dashboard/pages')->with('success','Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        return view('page')
        ->with('page', $page)
        ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $page = Page::findOrFail($id);

        return view('admin.edit-page')
        ->with('page', $page)
        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request['title'];
        $slug = Str::slug($request['title']); 
        $page->body = $request['body'];
        $page->excerpt = $request['excerpt'];

        $page->update();
        return redirect('admin-dashboard/pages')->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect('/admin-dashboard/pages')->with('success', 'Page deleted successfully');
    }
}
