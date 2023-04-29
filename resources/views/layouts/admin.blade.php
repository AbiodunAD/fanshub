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
    <link rel="stylesheet" type="text/css" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('stylesheet.css') }}">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />


    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</head>

<body class="dashboard adminboard">
    <div id="header-section">
        <div id="wrap">
            
            <div class="header-logo">
                <a href="{{ route('welcome') }}"><img src="{{ asset('img/logo2.png') }}"></a>
            </div>
            <div class="header-components">

                <div class="burger show-on-eight">
                    <a href="#" onclick="hamBurger()">
                        <img src="{{ asset('img/hamburger.png') }}">
                    </a>

                    <div id="sub-men">
                        <li><a href="{{ route('adminDashboard') }}" class="{{ Route::currentRouteName() == 'adminDashboard' ? 'activ' : '' }}">Dashboard</a></li>
                        <li><a href="{{ route('fans.list') }}" class="{{ Route::currentRouteName() == 'fans.list' ? 'activ' : '' }}">Fans Directory</a></li>
                        <li><a href="{{ route('postcards') }}" class="{{ Route::currentRouteName() == 'postcards' ? 'activ' : '' }}">Postcards</a></li>
                        <li><a href="{{ route('pages.all') }}" class="{{ Route::currentRouteName() == 'pages.all' ? 'activ' : '' }}">Pages</a></li>
                        {{-- <li><a href="#">Manage Events</a></li>
                        <li><a href="#">Manage Careers</a></li>
                        <li><a href="#">Manage Tickets</a></li> --}}
                    </div>
                </div>

                <div class="user-welcome">
                    <a href="#" onclick="myFunction()">
                        <div class="uw-name">Hi Admin {{ Auth::user()->first_name }}</div>
                        <div class="uw-image" style="background-image:url('{{ Auth::user()->profilephoto ? asset( 'storage/media/' . Auth::user()->profilephoto ) : asset('img/iuser.png') }}');background-size: cover;
                            background-repeat: no-repeat; ">
                            &nbsp;
                        </div>
                    </a>

                    <div id="uw-sub">
                        <li>
                            <a href="{{ route('adminDashboard') }}" class="{{ Route::currentRouteName() == 'adminDashboard' ? 'activ' : '' }}">
                            Admin Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('adminprofile.edit') }}" class="{{ Route::currentRouteName() == 'adminprofile.edit' ? 'activ' : '' }}">
                            Edit Your Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                               Logout
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
                <li><a href="{{ route('adminDashboard') }}" class="{{ Route::currentRouteName() == 'adminDashboard' ? 'active-dash' : '' }}"><span class="sb-ic"><img src="{{ asset('img/mf.png') }}"></span><span class="sb-tx">Dashboard</span></a></li>
                <li><a href="{{ route('fans.list') }}" class="{{ Route::currentRouteName() == 'fans.list' ? 'active-dash' : '' }}"><span class="sb-ic"><img src="{{ asset('img/fs.png') }}"></span><span class="sb-tx">Fans Directory</span></a></li>
                <li><a href="{{ route('postcards') }}" class="nav-link {{ Route::currentRouteName() == 'postcards' ? 'active-dash' : '' }}"><span class="sb-ic2"><img src="{{ asset('img/pc.png') }}"></span><span class="sb-tx">Postcards</span></a></li>
                <li><a href="{{ route('pages.all') }}" class="nav-link {{ Route::currentRouteName() == 'pages.all' ? 'active-dash' : '' }}"><span class="sb-ic"><img src="{{ asset('img/ev.png') }}"></span><span class="sb-tx">Manage Pages</span></a></li>


                {{-- <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/ev.png') }}"></span><span class="sb-tx">Manage Events</span></a></li>
                <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/cs.png') }}"></span><span class="sb-tx">Manage Careers</span></a></li>
                <li><a href="#"><span class="sb-ic"><img src="{{ asset('img/tk.png') }}"></span><span class="sb-tx">Manage Tickets</span></a></li> --}}
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
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    {{-- <li><a href="#">Support</a></li>
                    <li><a href="#">Livechat</a></li> --}}
                    <li><a href="{{ route('contact') }}">Contacts</a></li>
                </ul>
            </div>

            <div class="post-footer show-on-eight foot-credit">
                <p>©{{ date('Y') }} afribeats®. All Rights Reserved. <a href="#">Careers</a>  |  <a href="/policy-policy">Privacy Policy</a>  |  <a href="/terms-of-service">Terms & Conditions</a>. Designed by <a href="https://www.dientweb.net" target="_blank">DientWeb</a></p>
            </div>
        </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 300,
            });
        });
    </script>

</body>
</html>