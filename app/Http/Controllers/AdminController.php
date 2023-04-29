<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Postcard;
use Illuminate\Http\Request;

use App\Http\Requests\UserUpdate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('checkRole:admin');
    }
    
    public function status(Request $request, $id){
        $data = User::find($id);

        if($data->status == 0){
            $data->status=1;
        }else{
            $data->status=0;
        }
        $data->save();

        return redirect()->back()->with('message', $data->name. 'status has been updated successfully.');
    }

    public function index(Request $request)
    {
        $users = User::count();
        $user = Auth::user();
        $postcards = Postcard::count();
        
        return view('admin.dashboard')
            ->with('users', $users)
            ->with('postcards', $postcards)
            ->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-fan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;

        $request->validate([
            'email' => 'required|unique:users',
            'first_name' => 'required'
        ]);
        
        $data = $request->all();

        if($request->file('profilephoto')){
            $filepath = $this->uploadImageToStorage($request->file('profilephoto'), $data['first_name']);
            $data['profilephoto'] = $filepath;
        }

        if($request->file('profilebanner')){
            $filepath = $this->uploadImageToStorage($request->file('profilebanner'), $data['first_name']);
            $data['profilebanner'] = $filepath;
        }

        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'profession' => $data['profession'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect('admin-dashboard/fans')->with('success', 'New Fan created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showfans()
    {
        $user = Auth::user();
        $users = User::orderBy('id', 'DESC')->get();
        
        return view('admin.fans')
            ->with('user', $user)
            ->with('users', $users);

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fanedit($id)
    {
        $user = Auth::user();
        $user = User::findOrFail($id);
        return view('admin.edit-fan')
            ->with('user', $user);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fanupdate(UserUpdate $request, $id)
    {
        $user = User::findOrFail($id);

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->profession = $request['profession'];
        $user->bio = $request['bio'];
        $user->email = $request['email'];

        if($request->file('profilephoto')){
            $filepath = $this->uploadImageToStorage($request->file('profilephoto'), $user->first_name);
            $user->profilephoto = $filepath;
        }

        if($request->file('profilebanner')){
            $filepath = $this->uploadImageToStorage($request->file('profilebanner'), $user->first_name);
            $user->profilebanner = $filepath;
        }
 
        
        if($request['password'] != ""){
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

            $user->password = bcrypt($request['new_password']);

        }

        $user->update();
        return redirect('admin-dashboard/fans')->with('success', 'Fan details updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/admin-dashboard/fans')->with('success', 'Fan account deleted successfully');
    }



     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileedit(Request $request)
    {
        $user = Auth::user();
        return view('admin.profile-edit')->with('user', $user);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileupdate(UserUpdate $request)
    {
        $user = Auth::user();

        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->profession = $request['profession'];
        $user->bio = $request['bio'];
        $user->email = $request['email'];

        if($request->file('profilephoto')){
            $filepath = $this->uploadImageToStorage($request->file('profilephoto'), $user->first_name);
            $user->profilephoto = $filepath;
        }

        if($request->file('profilebanner')){
            $filepath = $this->uploadImageToStorage($request->file('profilebanner'), $user->first_name);
            $user->profilebanner = $filepath;
        }

        $user->update();

        return redirect('/admin-dashboard')->with('success', 'Profile updated successfully');
    }


    public function postcards()
    {
        $user = Auth::user();
        $users = User::all();
        $comments = Comment::all();
        $postcards = Postcard::latest()->filter(request(['search']))->get();

        $userPostIds = Like::where('user_id', auth()->id())->pluck('postcard_id')->toArray();   

        $likes = Like::all() ;
        
        return view('admin.postcards')
        ->with('user', $user)
        ->with('users', $users)
        ->with('comments', $comments)
        ->with('postcards', $postcards)
        ->with('userPostIds', $userPostIds)
        ->with('likes', $likes);
    }

    public function showfanpage(User $user)
    {
        // $user = User::findOrFail($id);
        $comments = Comment::all();
        $postcards = Postcard::whereUserId($user->id)->orderBy('created_at', 'DESC')->get();  
        $likes = Like::all();

        return view('admin.fanprofile')
            ->with('user', $user)
            ->with('comments', $comments)
            ->with('postcards', $postcards)
            ->with('likes', $likes);
    }


}

