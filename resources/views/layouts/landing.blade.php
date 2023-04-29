<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<meta name="viewport" content="width=device-width">
		<title>@yield('title')</title>
		<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('stylesheet.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('slider.css') }}">
		<!-- Scripts -->
		<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
		{{-- Font awesome --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<!-- Scripts -->
		<script src="https://kit.fontawesome.com/22d44955ad.js" crossorigin="anonymous"></script>
		
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
								<li><a href="{{ route('contact') }}">Contacts</a></li> --}}
								@guest

									@if (Route::has('login'))
										<li class="nav-item">
											<a class="nav-link" href="{{ route('login') }}">Signup/Login</a>
										</li>
									@endif

																	
									@else
										@if(Auth::user())
										<li class="nav-item">
											<a class="nav-link" href="{{ route('home') }}">My Account</a>
										</li>
										@endif
								@endguest    
                            </ul>
						</div>
					</div>


					@guest
						@if (Route::has('login'))
						<a href="{{ route('login') }}">
						<div class="show-on-small" id="small-log">
							<img src="{{ asset('img/iuser.png') }}">
						</div>
						</a>
						@endif

						@else
							@if(Auth::user())
								<a href="{{ route('home') }}">	
								<div class="show-on-small" id="small-log" style="background-image:url('{{Auth::user()->profilephoto ? asset( 'storage/media/' . $user->profilephoto ) : asset('img/iuser.png')}}');background-size: cover;
									background-repeat: no-repeat; ">
									&nbsp;
								</div>	
								</a>
							@endif
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

	

		@yield('content')

		

		<div id="s-container2">
			<div id="wrap">
				<div class="post-footer">
					<p>©{{ date('Y') }} afribeats®. All Rights Reserved. <a href="#">Careers</a>  |  <a href="/policy-policy">Privacy Policy</a>  |  <a href="/terms-of-service">Terms & Conditions</a>. Designed by <a href="https://www.dientweb.net" target="_blank">DientWeb</a></p>
				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		@yield('scripts')
	
	</body>
</html>
