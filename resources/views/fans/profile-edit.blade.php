@extends('layouts.fans')

@section('title')
 Edit Profile - afribeats®
@endsection

@section('content')



<form method="post" action="{{ route('profile.update'), $user->id }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

            <h1>Edit Your Profile</h1>
            <div id="dashbox">
                <div class="log-form">
                    <div>
                        <label>Edit first name:</label>
                        <input id="first_name" name="first_name" type="text" value="{{ $user->first_name }}" required autofocus autocomplete="first_name" />
                        @error('first_name')
                            <p>{{ $user->first_name }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Edit last name:</label>
                        <input id="last_name" name="last_name" type="text" value="{{ $user->last_name }}" required autofocus autocomplete="first_name" />
                        @error('last_name')
                            <p>{{ $user->last_name }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Slect your profession:</label>
                        <select name="profession" value="{{ $user->profession }}" placeholder="Select Profession:">
                            <option>Select</option>
                            <option>Artist</option>
                            <option>Musician</option>
                            <option>Creator</option>
                            <option>Promoter</option>
                            <option>Photographer</option>
                            <option>Video Maker</option>
                            <option>Dancer</option>
                            <option>Producer</option>
                            <option>Location Manager</option>
                            <option>Dress Stylist</option>
                            <option>Nail Artiste</option>
                            <option>Hair Stylist</option>
                            <option>Artiste Manager</option>
                            <option>Studio Owner</option>
                            <option>Songwriter</option>
                            <option>Journalist</option>
                            <option>Radio DJ</option>
                            <option>Event DJ</option>
                            <option>TV Programmer</option>
                            <option>Master of Ceremony</option>
                            <option>Entertainer</option>
                            <option>Influencer</option>
                            <option>Others</option>
                        </select>
                        @error('profession')
                            <p>{{ $user->profession }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Change profile image:</label>
                        <input name="profilephoto" type="file" value="{{ $user->profilephoto }}">
                        @error('profilephoto')
                            <p>{{ $user->profilephoto }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Change profile banner:</label>
                        <input name="profilebanner" type="file" value="{{ $user->profilebanner }}">
                        @error('profilebanner')
                            <p>{{ $user->profilebanner }}</p>
                        @enderror
                    </div>

                    <div>
                        <label>Edit your bio:</label>
                        <textarea id="bio" name="bio" placeholder="Your bio:" placeholder="Your bio:">{{ $user->bio }}</textarea>
                        @error('bio')
                            <p>{{ $user->bio }}</p>
                        @enderror
                    </div>
                    <button type="submit">Save Profile</button>           
                    <button><a href="{{ route('userDashboard') }}">Cancel</a></button>
                </div>
            </div>

            <h1>&nbsp;</h1>
            <h3>Edit Your Email</h3>
            <div id="dashbox">
                <div class="log-form">
                    <div>
                        <label>Change your email:</label>
                        <input id="email" name="email" type="email" value="{{ $user->email }}" required autocomplete="email" />
                        @error('email')
                            <p>{{ $user->email }}</p>
                        @enderror
                    </div>
                    <p class="tiny-note">The above email (your current emaial address) is used for login purpose. If you change it, we will send you a confirmation email at your new address. The new email address will not become active untill it is confirmed through the link sent to it.</p>
                    <button type="submit">Change Email</button>           
                    <button><a href="{{ route('userDashboard') }}">Cancel</a></button>
                </div>
            </div>

            <h1>&nbsp;</h1>
            <h3>Edit Your Password</h3>
            <div id="dashbox">
                <div class="log-form">
                    <div>
                        <label class="form-control-label">Current Password</label>
                        <input name="password" type="password" class="form-control">
                    
                        <label class="form-control-label">New Password</label>
                        <input name="new_password" type="password" class="form-control">
                    
                        <label class="form-control-label">New Password Confirmation</label>
                        <input name="new_password_confirmation" type="password" class="form-control">
                    </div>
                    <button type="submit">Change Password</button>           
                    <button><a href="{{ route('userDashboard') }}">Cancel</a></button>
                </div>
            </div>
         
            
</form>

@endsection