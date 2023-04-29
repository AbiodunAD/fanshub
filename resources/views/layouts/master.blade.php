<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<meta name="viewport" content="width=device-width">
		<title>{{ config('app.name', 'afribeats') }}</title>
		<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('stylesheet.css') }}">

		<!-- Scripts -->
		<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
	</head>

    <body>
		<div id="header-section">
			<div id="wrap">
				
					<div class="header-logo">
						<a href="{{ route('welcome') }}"><img src="{{ asset('img/logo2.png') }}"></a>
					</div>
					<div class="header-menu header">
						<div class="header">
							<ul class="menu">
								{{-- <li><a href="{{ route('welcome') }}">Home</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Livechat</a></li>
								<li><a href="#">Contacts</a></li> --}}
								@guest
									@if (Route::has('login'))
										<li class="nav-item">
											<a class="nav-link" href="{{ route('login') }}">Signup/Login</a>
										</li>
									@endif

																	
									@else
										<li class="nav-item">
											<a class="nav-link" href="{{ route('home') }}">My Account</a>
										</li>
								@endguest    
                            </ul>
						</div>
					</div>


					@guest
					@if (Route::has('login'))
					<div class="show-on-small" id="small-log">
						<a href="{{ route('login') }}"><img src="{{ asset('img/iuser.png') }}"></a>
					</div>
					@endif

					@else
						
					<div class="show-on-small" id="small-log" style="background-image:url('{{Auth::user()->profilephoto ? asset( 'storage/media/' . $user->profilephoto ) : asset('img/iuser.png')}}');background-size: cover;
						background-repeat: no-repeat; ">
						<a href="{{ route('userDashboard') }}">&nbsp;</a>
					</div>					
					@endguest


				
			</div>
		</div>

		<div id="foo-bar">
			<div id="wrap">
			  	<ul class="menu">
					<li><a href="{{ route('welcome') }}">
						<span><img src="{{ asset('img/ihome.png') }}"></span>
						<span>Home</span>
					</a></li>
					{{-- <li><a href="#">
						<span><img src="{{ asset('img/isupport.png') }}"></span>
						<span>Support</span>
					</a></li>
					<li><a href="#">
						<span><img src="{{ asset('img/ichat.png') }}"></span>
						<span>Livechat</span>
					</a></li> --}}
					<li><a href="{{ route('contact') }}">
						<span><img src="{{ asset('img/icontact.png') }}"></span>
						<span>Contacts</span>
					</a></li>
				</ul>
			 </div>
		</div>

		<div id="s-container remove-on-mobile">&nbsp;</div>

		@yield('content')

		<div id="s-container">&nbsp;</div>

		<div id="s-container">
			<div id="wrap">
				<div class="footer">
					<h3>MEMBERSHIP IS FREE</h3>
                <p style="margin-bottom: 0;">Supported only by Donations & Sponsorship</p>
                <p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>
                <p class="btn-grey"><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a></p>
				</div>

				<div class="post-footer">
					<p>©{{ date('Y') }} afribeats®. All Rights Reserved. <a href="#">Careers</a>  |  <a href="/policy-policy">Privacy Policy</a>  |  <a href="/terms-of-service">Terms & Conditions</a>. Designed by <a href="https://www.dientweb.net" target="_blank">DientWeb</a></p>
				</div>
			</div>
		</div>


	</body>
</html>
