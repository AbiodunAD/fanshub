@extends('layouts.adminpostcard')

@section('title')
 {{ $user->first_name }} Profile - afribeats®
@endsection

@section('content')
<div id="user-profile-img">
    <div class="user-pi-large" style="background-image: url('{{ $user->profilebanner ? asset( 'storage/media/' . $user->profilebanner ) : asset('img/pban.png') }}'); background-size: cover;
      background-repeat: no-repeat;">
      &nbsp;
    </div>
    <div class="user-pi-plus">
        <div class="up-image" style="background-image:url('{{ $user->profilephoto ? asset( 'storage/media/' . $user->profilephoto ) : asset('img/iuser.png') }}');background-size: cover;
          background-repeat: no-repeat; ">
          &nbsp;
        </div>
        <div class="up-name">{{ $user->first_name }} {{ $user->last_name }}</div>
        <div class="up-pro">
          @if($user->profession)
              {{ $user->profession }}
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