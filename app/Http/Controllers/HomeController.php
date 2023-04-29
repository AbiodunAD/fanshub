<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Comment;
use App\Models\Postcard;
use App\Models\User;
use App\Models\Like;
// use App\PusherOps;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // use PusherOps;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->admin == '1' and Auth::user()->status == '1'){
            return redirect(route('adminDashboard'));
        }elseif(Auth::user()->fan == true and Auth::user()->status == '1'){
            return redirect(route('userDashboard'));
        }elseif(Auth::user()->fan == true and Auth::user()->status == '0'){
            return redirect('/login')->with('success', 'Your Account has been suspended. Contact mails@afribeats.com to learn more.');
        }else{
            return redirect(route('/login'));
        }
    }


}
