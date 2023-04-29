@extends('layouts.master')

@section('content')

<div id="s-container">
	@if(session('success'))
		<div id="noty-fic"> <div id="wrap">
			<p>{{ session('success') }}</p> <span id="noty-close"><a href="{{ route('welcome') }}">X</a></span>
		</div></div>
	@endif
	<div id="wrap">
		<div class="sec-one">
			<div id="show-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/welcome-img.png') }}"></div>
			<div class="left-text-padded-right">
				<h1>Welcome to afribeats - the Fanshub of AMFW NETWORK</h1>
				<p>This is the Fanshub of African Music Fans Worldwide (AMFW). We love African Music, and call it afribeats®. We’re all Fans, drawn from walks of life across the planet. We dance when and wherever afribeats® is played to celebrate Africa and the people who create afribeats®. </p>
				
				<p>We’re creators too, but of varied works, contributing to ‘making the vibes’ in Africa. We profile the works of our hands on afribeats® to be celebrated globally. You and/or your works can also be celebrated, even if you are only a Fan.</p>
			</div>
			<div id="remove-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/welcome-img.png') }}"></div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="orange">
			<div class="left-image-unpadded"><img src="{{ asset('img/membership-img.png') }}"></div>
			<div class="right-text-padded">
				<h2>Membership is FREE</h2>
				<p>AMFW membership is, and will always be free! Our work is supported only by voluntary donations from members and admirers across the globe. Join us now to export Africa through creative music and get celebrated. It’s absolutely FREE</p>

				<p class="btn-grey"><a href="{{ route('register') }}">Join Us Now</a></p>

			</div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div id="show-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/global-img.png') }}"></div>
		<div class="left-text-padded-right globa">
			<h2>We’re a Global Family of Fans of African Music</h2>
			<p>One billion FANS and counting worldwide can’t be wrong! Your profile, your song or video, your creative work, collection, or activity, on afribeats® community hits MILLIONS of Fans in minutes. That’s how together, we export AFRICA through music.</p>
		</div>
		<div id="remove-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/global-img.png') }}"></div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="purple">
			<div id="remove-on-small" class="left-image-padded"><img src="{{ asset('img/broadcast-img.png') }}"></div>
			<div class="right-text-padded broad">
				<h2>With our Broadcasting Network scheduled for 24/365 on all TIME ZONES...</h2>
				<p>...you can ride on afribeats® Radio, TV, Podcast, and Magazine like a STAR in the sky, beaming on hundreds of millions of Fans across the world!</p>
			</div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="vibe">
			<div id="show-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/vibe-img.png') }}"></div>
			<div class="left-text-padded-right">
				<h2>Who makes the vibes in Africa?</h2>
				<p>afribeats® gives you a golden opportunity to peek at profiles of some of the earth-movers of African music – Afribeats Artistes, Creators, Promoters, Photographers, Video Makers, Dancers, Producers, Location Managers, Stylists, Artiste Managers, Studio Owners, Songwriters, Journalists, DJs, Masters of Ceremony, Entertainers, you just name us. We’re all on afribeats®</p>
			</div>
			<div id="remove-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/vibe-img.png') }}"></div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="ash">
			<div class="right-text-padded broad">
				<h2>“Feet Don’t Fail Me”</h2>
				<p class="big-text">…is our dance career path on afribeats®… If you’ve got the moves, we’ve got the grooves!</p>

				<p>With creative dance steps and incredible body movements, we celebrate African Music across the world. Join AMFW today and create a handle for your dance videos on afribeats® free, to celebrate African Music and be celebrated across the globe. It’s your career path, your birthright!</p>

				<p class="btn-grey"><a href="{{ route('register') }}">Join Us Now</a></p>
			</div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="vibe">
			<div id="show-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/chart-img.png') }}"></div>
			<div class="left-text-padded-right">
				<h2>You can grab ‘Top Spots’ on world’s ‘Top Charts’ with afribeats® interviews</h2>
				<p>From the word ‘go’, you can showcase your work on afribeats® and get interviews for millions to preview your work and start you high on the rungs to the golden stage of success. That’s why we’re here!... to give you a head start on the road to stardom; yes, for you to hit the ground running in your music career, even if you lack the charisma…</p>
			</div>
			<div id="remove-on-mobile" class="right-image-unpadded"><img src="{{ asset('img/chart-img.png') }}"></div>
		</div>
	</div>
</div>

<div id="s-container">
	<div id="wrap">
		<div class="green">
			<div id="remove-on-small" class="left-image-padded"><img src="{{ asset('img/media-img.png') }}"></div>
			<div class="right-text-padded broad">
				<h2>‘Burst Into Media’</h2>
				<p class="big-text">The apt tag of our prestigious career path…</p>

				<p>…enables you to grab a rare opportunity in creative media to explore the world, visiting exotic locations, covering high profile events, meeting interesting people, tasting varied cultures, foods, fruits, drinks… and working as though you’re on a never-ending summer holiday, even as you earn much more than you can spend alone…</p>

				<p class="btn-grey"><a href="{{ route('register') }}">Join Us Now</a></p>
			</div>
		</div>
	</div>
</div>
@endsection