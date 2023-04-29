<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Postcard;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Builder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){
        $this->middleware('checkRole:fan');
        $this->middleware('verified');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        // $user->hasVerifiedEmail();
        $comments = Comment::all();
        $postcards = Postcard::latest()->filter(request(['search']))->get();
        // $userPostIds = Like::where('user_id', auth()->id())->pluck('postcard_id')->toArray();   
        $likes = Like::all();
        
        return view('fans.dashboard')
            ->with('user', $user)
            ->with('comments', $comments)
            ->with('postcards', $postcards)
            // ->with('userPostIds', $userPostIds)
            ->with('likes', $likes);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        $comments = Comment::all();
        $postcards = Postcard::latest()->filter(request(['search']))->get();  
        $likes = Like::all();

        return view('fans.fanprofile')
            ->with('user', $user)
            ->with('comments', $comments)
            ->with('postcards', $postcards)
            ->with('likes', $likes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();

        if(Auth::user() != $user) {
            return redirect()->back()->with('message', 'You are not allowed to edit other users profile');
        }

        return view('fans.profile-edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdate $request)
    {
        $user = Auth::user();


        if($request->file('profilephoto')){
            $filepath = $this->uploadImageToStorage($request->file('profilephoto'), $user->first_name);
            $user->profilephoto = $filepath;
        }

        if($request->file('profilebanner')){
            $filepath = $this->uploadImageToStorage($request->file('profilebanner'), $user->first_name);
            $user->profilebanner = $filepath;
        }

        if ($request->password != "") {
            if(!(Hash::check($request['password'], Auth::user()->password))){
                return redirect()->back()->with('error', "Your current password does not match with the password you provided");
            }

            if(strcmp($request['password'], $request['new_password']) == 0){
                return redirect()->back()->with('error', "New password cannot be the same as your current password.");
            }

            $validation = $request->validate([
                'password' => 'required',
                'new_password' => 'required|string|min:6|confirmed'
            ]);

            auth()->user()->update(['password' => Hash::make($request->new_password)]);
            return redirect('/myfanshub')->with('success', "Password changed successfully");
        }


        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'profession' => $request->profession,
            'bio' => $request->bio,
            // 'email' => $request->email,
        ]);

        if (auth()->user()->email != $request->email){
            auth()->user()->newEmail($request->email);
            return redirect('/myfanshub')->with('success', "There is a pending change of email for your account. Check your submitted new email account for a confirmation email.");
        }

        return redirect('/myfanshub')->with('success', 'Profile updated successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function postcard(Postcard $postcard){
        $user = Auth::user();
        $users = User::all();
        $comments = Comment::all();
        $postcards = Postcard::latest()
        ->with('userVotes')
        ->withCount(['votes as likesCount' => fn (Builder $query) => $query->where('vote', '>', 0)], 'vote')
        ->withCount(['votes as dislikesCount' => fn (Builder $query) => $query->where('vote', '<', 0)], 'vote')
        ->filter(request(['search']))->get(); 

        $likes = Like::all();
        
        return view('fans.postcard')
            ->with('user', $user)
            ->with('users', $users)
            ->with('comments', $comments)
            ->with('postcards', $postcards)
            ->with('likes', $likes);
    }


}

