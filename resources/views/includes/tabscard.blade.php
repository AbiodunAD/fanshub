<div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'Portfolio')">Profile Information</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Posts')">Posts Shared</button>
    {{-- <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Followers')">Followers</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Following')">Following</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Chat')">Chat/Message</button> --}}
</div>
      
<div id="Portfolio" class="w3-container w3-border city">
    <h2>Bio</h2>
    <p>
        @if($user->bio)
            {{ $user->bio }}
        @else
            <span>No bio yet.</span>
        @endif  
    </p>

    <hr>

    <h2>Profession</h2>
    <p>@if($user->profession)
        {{ $user->profession }}
    @else
        <span>No profession specified.</span>
    @endif</p>
    <hr>

    @if (Auth::user() == $user)
        <h2>Email Address</h2>
        <p>@if(Auth::user()->email)
            {{ Auth::user()->email }}
        @else
            <span>No email address specified.</span>
        @endif</p>
        <hr>

        <div class="btn-edit"><a href="{{ route('profile.edit') }}">Edit profile</a></div>
    @endif

</div>

<div id="Posts" class="w3-container w3-border city" style="display:none">
    <p>&nbsp;</p>

    @if ($postcards->isNotEmpty())
        @foreach($postcards as $postcard)  
        <div id="postfeed">
            @if($user == $postcard->user)
                <div id="postprofile">
                    <div class="ppimg"><img src="{{ $postcard->user->profilephoto ? asset( 'storage/media/' . $postcard->user->profilephoto ) : asset( 'img/iuser.png' ) }}"></div>
                    <div class="ppdetail">
                        <p class="ppu-name">{{ $postcard->user->first_name }} {{ $postcard->user->last_name }}</p>
                        <p class="ppu-aliase">{{ $postcard->user->profession }}</p>
                    </div>
                </div>
                
                @include('includes.pscard')
        
                @include('includes.modalcard')
            @endif
        </div>

        @endforeach
        
    @else
    <p style="color:#ccc;font-size:12px;">{{ $user->first_name }} has no posts at the moment. Visit the <a href="{{ route('postcard') }}">Postcard</a> section to view posts from other fans.</p>
    @endif

</div>

{{-- <div id="Followers" class="w3-container w3-border city" style="display:none">
    <h2>&nbsp;</h2>
<p>Followers coming soon...</p> 
</div>

<div id="Following" class="w3-container w3-border city" style="display:none">
    <h2>&nbsp;</h2>
<p>Following coming soon...</p> 
</div>

<div id="Chat" class="w3-container w3-border city" style="display:none">
    <h2>&nbsp;</h2>
<p>Chats/messages coming soon...</p> 
</div> --}}
      
