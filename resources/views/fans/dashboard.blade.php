@extends('layouts.fans')

@section('title')
 MyFansHub - afribeats®
@endsection

@section('content')
@include('includes.message-block')
<div id="user-profile-img">
    <div class="user-pi-large" style="background-image: url('{{Auth::user()->profilebanner ? asset( 'storage/media/' . $user->profilebanner ) : asset('img/pban.png')}}'); background-size: cover;
      background-repeat: no-repeat;">
      &nbsp;
    </div>
    <div class="user-pi-plus">
        <div class="up-image" style="background-image:url('{{Auth::user()->profilephoto ? asset( 'storage/media/' . $user->profilephoto ) : asset('img/iuser.png')}}');background-size: cover;
          background-repeat: no-repeat; ">
          &nbsp;
        </div>
        <div class="up-name">{{ $user->first_name }} {{ $user->last_name }}</div>
        <div class="up-pro">
          @if(Auth::user()->profession)
              {{ Auth::user()->profession }}
          @else
              <span>-</span>
          @endif  
        </div>
    </div>
</div>

<div id="tab-area">
    <div class="w3-container">
      
      @include('includes.tabscard')
      
    </div>
</div>    
@endsection