<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    
    {{-- Favicon & Stylesheet --}}
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('boostrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/22d44955ad.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>

<body class="dashboard userboard">
    <div id="header-section">
        <div id="wrap">
            
            <div class="header-logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo2.png') }}"></a>
            </div>
            <div class="header-components">
                {{-- <form action="/myfanshub">
                    <div class="header-search" id="mob-search">
                        <button type="submit" class=""><img src="{{ asset('img/si.png') }}"></button>
                        <input type="text" name="search" class="" placeholder="Search..." />
                    </div>
                </form> --}}

                <div class="burger show-on-eight">
                    <a href="#" onclick="hamBurger()">
                        <img src="{{ asset('img/hamburger.png') }}">
                    </a>

                    <div id="sub-men">
                        <li><a href="{{ route('userDashboard') }}" class="nav-link {{ Route::currentRouteName() == 'userDashboard' ? 'activ' : '' }}">MyFansHub</a></li>
                        <li><a href="{{ route('postcard') }}" class="nav-link {{ Route::currentRouteName() == 'postcard' ? 'activ' : '' }}">Postcard</a></li>
                        <li><a href="{{ route('information') }}" class="nav-link {{ Route::currentRouteName() == 'information' ? 'activ' : '' }}">Information</a></li>
                        {{-- <li><a href="#">Media</a></li>
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Ticketing</a></li>
                        <li><a href="#">Careers</a></li> --}}
                    </div>
                </div>

                <div class="search-small show-on-eight">
                    <a href="#" onclick="moSearch()">
                        <img src="{{ asset('img/isearch.png') }}">
                    </a>
                </div>

                <div class="user-welcome">
                    <a href="#" onclick="myFunction()">
                        <div class="uw-name">Hi {{ Auth::user()->first_name }}</div>
                        <div class="uw-image" style="background-image:url('{{ Auth::user()->profilephoto ? asset( 'storage/media/' . Auth::user()->profilephoto ) : asset('img/iuser.png') }}');background-size: cover;
                            background-repeat: no-repeat; ">
                            &nbsp;
                        </div>
                    </a>

                    <div id="uw-sub">
                        <li>
                            <a href="{{ route('userDashboard') }}" class="nav-link {{ Route::currentRouteName() == 'userDashboard' ? 'activ' : '' }}">
                            MyFansHub
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.edit') }}" class="nav-link {{ Route::currentRouteName() == 'profile.edit' ? 'activ' : '' }}">
                            Edit Your Profile
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="s-container remove-on-mobile">

        <div id="dash-sidebar">
            <ul>
                <li><a href="{{ route('userDashboard') }}" class="nav-link {{ Route::currentRouteName() == 'userDashboard' ? 'active-dash' : '' }}"><span class="sb-ic"><img src="{{ asset('img/mf.png') }}"></span><span class="sb-tx">MyFansHub</span></a></li>
                <li><a href="{{ route('postcard') }}" class="nav-link {{ Route::currentRouteName() == 'postcard' ? 'active-dash' : '' }}"><span class="sb-ic2"><img src="{{ asset('img/pc.png') }}"></span><span class="sb-tx">Postcard</span></a></li>
                <li><a href="{{ route('information') }}" class="nav-link {{ Route::currentRouteName() == 'information' ? 'active-dash' : '' }}"><span class="sb-ic"><img src="{{ asset('img/ev.png') }}"></span><span class="sb-tx">Informtion</span></a></li>
                {{-- <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/me.png') }}"></span><span class="sb-tx">Media</span></a></li>
                <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/ev.png') }}"></span><span class="sb-tx">Events</span></a></li>
                <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/tk.png') }}"></span><span class="sb-tx">Ticketing</span></a></li>
                <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/cs.png') }}"></span><span class="sb-tx">Careers</span></a></li> --}}
            </ul>

            <div class="dash-copy">
                <p><a href="/privacy-policy" target="_blank">Privacy Policy</a> | <a href="/terms-of-service" target="_blank">Terms & Conditions</a>.  ©{{ now()->year }} afribeats®. All Rights Reserved. Designed by <a href="https://www.dientweb.net" target="_blank">DientWeb</a></p>
            </div>
        </div>

        <div id="dash-main">
            @yield('content')

            <div id="dash-foot">					
                <h3>MEMBERSHIP IS FREE</h3>
                <p style="margin-bottom: 0;">Supported only by Donations & Sponsorship</p>
                <p>Donate to, or sponsor afribeats "Talent Support Revolution" today and get a STAR up on the success podium</p>
                <p class="btn-grey"><a href="https://www.paypal.com/donate/?hosted_button_id=42UQ84BW4GWVG" target="_blank">Donate</a></p>

                <ul>
                    <li><a href="{{ route('welcome') }}">Home</a></li> <span class="link-sep">|</span>
                    <li><a href="/about" target="_blank">About Us</a></li> <span class="link-sep">|</span>
                    {{-- <li><a href="#">Support</a></li>
                    <li><a href="#">Livechat</a></li> --}}
                    <li><a href="{{ route('contact') }}" target="_blank">Contacts</a></li>
                </ul>
            </div>

            <div class="post-footer show-on-eight foot-credit">
                <p>©{{ date('Y') }} afribeats®. All Rights Reserved. <a href="#">Careers</a>  |  <a href="/policy-policy">Privacy Policy</a>  |  <a href="/terms-of-service">Terms & Conditions</a>. Designed by <a href="https://www.dientweb.net" target="_blank">DientWeb</a></p>
            </div>
        </div>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>