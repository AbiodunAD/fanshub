@extends('layouts.landing')

@section('title')
    afribeats® - The Fanshub of AMFW NETWORK
@endsection

@section('content')
<div id="s-container" class="remove-on-mobile">&nbsp;</div>
<div id="s-container">&nbsp;</div>
{{-- <div class="c-pageheader">
	<h1>Contact Us</h1>
</div> --}}

<div id="wrap">
    <div class="placeholder">
        <div class="spos-box">
			<div id="postprofile">
                <div class="ppimg">
                    <img src="{{ $postcard->user->profilephoto ? asset( 'storage/media/' . $postcard->user->profilephoto ) : asset( 'img/iuser.png' ) }}">
                </div>
                <div class="ppdetail">
                    <p class="ppu-name">{{ $postcard->user->first_name }} {{ $postcard->user->last_name }}</p>
                    <p class="ppu-aliase">{{ $postcard->user->profession }}</p>
                </div>
            </div>
            @include('includes.pscard')

            <div class="btn-white"><a href="{{ route('login') }}">Login or Register to see more posts</a></div>
		</div>
	</div>
</div>

<div id="s-container" class="remove-on-mobile">&nbsp;</div>


<div id="s-container">
    <div id="wrap">
       
        <div class="log-form">
            <h3>MEMBERSHIP IS FREE</h3>
            <p style="margin-bottom: 0;">Supported only by Donations & Sponsorship</p>
            <p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>
            <div class="footer"><p class="btn-grey"><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a></p></div>
        </div>

    </div>
</div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.mp-icons', function(e){
                e.preventDefault();
                alert('You must login to interact with this post');
            });
        });
    </script>
@endsection