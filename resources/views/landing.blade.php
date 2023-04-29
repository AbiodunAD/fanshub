@extends('layouts.landing')


@section('title')
	afribeats® - The Fanshub of AMFW NETWORK
@endsection

@section('content')

<div id="s-container2">
	@if(session('success'))
		<div id="noty-fic"> <div id="wrap">
			<p>{{ session('success') }}</p> <span id="noty-close"><a href="{{ route('welcome') }}">X</a></span>
		</div></div>
	@endif
	<div id="full-container">
        <video autoplay loop muted class="vidstyle">
            <source src="{{ asset('vid/intro.mp4') }}" type="video/mp4">
            <source src="{{ asset('vid/intro.ogg') }}" type="video/ogg">
          </video>
	</div>
</div>

<div id="s-container-m">
	<div id="wrap" style="text-align:center;">
        <div id="homepage-slider" class="st-slider">

			<input type="radio" class="cs_anchor radio" name="slider" id="slide1"/>
			<input type="radio" class="cs_anchor radio" name="slider" id="slide2"/>
			<input type="radio" class="cs_anchor radio" name="slider" id="slide3"/>
			<input type="radio" class="cs_anchor radio" name="slider" id="play1" checked=""/>
		
			<div class="images">
			   <div class="images-inner">
				<div class="image-slide">
				  <div class="image bg-yellow">
					  <h1>The FansHub of AMFW NETWORK...</h1>
					  <p>We're a Worldwide Fans community of African Music, making and celebrating Afribeats Artists, Dancers, DJs and Fans globally...!</p>
				  </div>
				</div>
		
				<div class="image-slide">
				  <div class="image bg-blue">
					  <h1>Broadcasting 24/365 on all Time Zones!</h1>
					  <p>We ride on afribeats Broadcasting Network like a STARS, beaming on Fans Wordlwide</p>
				  </div>
				</div>
		
				<div class="image-slide">
				  <div class="image bg-red">
						<h1>Piloting 'Talent Support Revolution'</h1>
					  <p>We step up to Stardom through afribeats "Talent Support Revolution". It's our Talent! Our birthright!</p>
				  </div>
				</div>
			  </div>
			</div>
		
			<div class="labels">      
				<div class="fake-radio">
				  <label for="slide1" class="radio-btn"></label>
				  <label for="slide2" class="radio-btn"></label>
				  <label for="slide3" class="radio-btn"></label>
				</div>
			</div>
		  
		
		</div>
		
    </div>
</div>

<div class="l-mme">
	<div id="wrap">
		<h2>MEMBERSHIP IS FREE</h2>
		<p class="free-mem">Supported only by Donations & Sponsorship</p>
		<p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>

		<p><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a> | <a href="{{ route('contact') }}">Inquire</a> | <a href=" {{ route('register') }} ">Signup</a></p>
	</div>
</div>


@endsection