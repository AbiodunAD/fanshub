@extends('layouts.admin')

@section('title')
 Edit {{ $user->first_name }} - afribeats®
@endsection


@section('content')
 <h1>Edit {{ $user->first_name }}'s Profile</h1>

    <div id="dashbox">
        <div class="log-form">
    
            <form method="post" action="{{ route('fan.update', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
    
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
                    <label>Edit bio:</label>
                    <textarea id="bio" name="bio" placeholder="Your bio:" placeholder="Your bio:">{{ $user->bio }}</textarea>
                    @error('bio')
                        <p>{{ $user->bio }}</p>
                    @enderror
                </div>
    
                <div>
                    <label>Change email:</label>
                    <input id="email" name="email" type="email" value="{{ $user->email }}" required autocomplete="email" />
                    @error('email')
                        <p>{{ $user->email }}</p>
                    @enderror
                </div>

                <div>
                    <label>New password:</label>
                    <input name="new_password" type="password">
                    @error('email')
                        <p>{{ $user->email }}</p>
                    @enderror

                    <label>New password confirmation:</label>
                    <input name="new_password_confirmation" type="password">
                    @error('email')
                        <p>{{ $user->email }}</p>
                    @enderror    
                </div>
    
                <div class="flex items-center gap-4">
                    <button type="submit">Save Profile</button>
                </div>
                <button><a href="{{ route('fans.list') }}">Cancel</a></button>
            </form>
            
        </div>
    </div>    
@endsection