@extends('layouts.admin')

@section('title')
 Creat New Fan - afribeats®
@endsection

@section('content')
<h1>Creat a New Fan's Account</h1>
<div id="dashbox">
    <div class="log-form">

        <form method="post" action="{{ route('fan.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <label>Enter Fan's First name:</label>
                <input id="first_name" name="first_name" type="text" placeholder="First Name:" required autofocus />
            </div>

            <div>
                <label>Enter Fan's Last Name:</label>
                <input id="last_name" name="last_name" type="text" placeholder="Last Name:" required autofocus />
            </div>

            <div>
                <label>Slect Fan's Profession:</label>
                <select name="profession" placeholder="Select Profession:">
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
            </div>

            {{-- <div>
                <label>Upload Fan's Profile Image:</label>
                <input name="profilephoto" type="file" placeholder="Profile Photo" />
            </div>

            <div>
                <label>Upload Fan's Profile Banner:</label>
                <input name="profilebanner" type="file" placeholder="Profile Banner" />
            </div>

            <div>
                <label>Enter Fan's Bio:</label>
                <textarea id="bio" name="bio" placeholder="Fan's bio:"></textarea>
            </div> --}}

            <div>
                <label>Enter Fan's Email:</label>
                <input id="email" name="email" type="email" placeholder="Email Address:" />
            </div>

            <div>
                <label>Enter Fan's Password:</label>
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <p>&nbsp;</p>
            <div class="flex items-center gap-4">
                <button type="submit">Save Profile</button>
            </div>
            <button><a href="{{ route('fans.list') }}">Cancel</a></button>
        </form>
        
    </div>
</div> 
@endsection