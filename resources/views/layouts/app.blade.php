<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link href="{{ asset('assets/css2/bootstrap-creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css2/app-creative.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css2/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @livewireStyles

    <style>
        mark {
            background-color: #ffeb3b;
            color: black;
            padding: 0 2px;
            border-radius: 2px;
        }
    </style>
</head>

<body data-layout-mode="detached"
      data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <div id="wrapper">
        <div class="navbar-custom">
            <div class="container-fluid">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false" aria-expanded="false">
                            @if(Auth::check())
                                @php $user = Auth::user(); @endphp
                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('assets/images/users/Guest-user.png') }}" alt="{{ $user->name }}'s Image" class="rounded-circle" />
                                <span class="pro-user-name ml-1">
                                    {{ $user->name }} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            @else
                                <img src="{{ asset('assets/images/users/Guest-user.png') }}" alt="Guest Image" class="rounded-circle" />
                                <span class="pro-user-name ml-1">
                                    Guest <i class="mdi mdi-chevron-down"></i>
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome!</h6>
                            </div>
                            @if(Auth::check())
                                <a href="{{ route('user-profile.edit', $user->id) }}" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</ span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a type="button" class="dropdown-item notify-item">
                                    <i class="fe-log-in"></i>
                                    <span data-bs-toggle="modal" data-bs-target="#loginModal" onclick="$('#loginModal').modal('show')">Login</span>
                                </a>
                                <a type="button" class="dropdown-item notify-item">
                                    <i class="fe-user-plus"></i>
                                    <span data-bs-toggle="modal" data-bs-target="#registerModal" onclick="$('#registerModal').modal('show')">Register New Account</span>
                                </a>
                            @endif
                        </div>
                    </li>
                </ul>

                <div class="logo-box">
                    <a href="index.html" class="logo logo-dark text-center">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22" />
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="20" />
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>

        @include('include/sidebar')

        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    @include('include/login-popup')
    @include('include/register-popup')

    <script src="{{ asset('assets/js2/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js2/app.min.js') }}"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

    @livewireScripts
</body>
</html> 