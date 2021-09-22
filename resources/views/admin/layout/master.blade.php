<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="logo">
                <h2>Sound</h2>
            </div>
            <div class="user-info">
                <div class="user-pic"></div>
                <div class="user-status">
                    <h3>Aman khan</h3>
                    <p>Admin</p>
                </div>
            </div>
            <div class="side-links">
                <ul>
                    <li><a href="{{ route('admin.audio') }}">Audio</a></li>
                    <li><a href="{{ route('admin.video') }}">Video</a></li>
                    <li><a href="{{ route('admin.artist') }}">Artist</a></li>
                    <li><a href="{{ route('admin.genre') }}">Genre</a></li>
                    <li><a href="{{ route('admin.album') }}">Album</a></li>
                </ul>
            </div>
        </nav>
        <div class="mainbody">
            <nav class="navbar">
                <div class="acc-container">
                    <div class="navbar-account">
                        <div class="user-pic"></div>
                        <h4>Aman khan</h4>
                        <i class="fas fa-chevron-down" id="drop-login"></i>
                    </div>
                    <div class="dropdown-acc">
                        <h4>Profile</h4>
                        <ul>
                            <li><a href="{{ route('admin.logout') }}" id="logoutBtn">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>