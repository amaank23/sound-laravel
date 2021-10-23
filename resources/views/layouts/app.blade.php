<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="dashboard-container front">
        <nav class="sidebar">
            <div class="logo">
                <h2><a href="{{ url('/') }}">Sound</a></h2>
            </div>
            <div class="user-info">
                <!-- <div class="user-pic"></div> -->
                <div class="user-status">
                    <h3>{{ session('user_name') }}</h3>
                    <p>{{ session('role') }}</p>
                </div>
            </div>
            <div class="side-links">
                <ul>
                    <li><a href="{{ route('audio.get') }}">Audio</a></li>
                    <li><a href="{{ route('video.get') }}">Video</a></li>
                    <li><a href="{{ route('artist.get') }}">Artist</a></li>
                    <li><a href="{{ route('genre.get') }}">Genre</a></li>
                    <li><a href="{{ route('album.get') }}">Album</a></li>
                    <li><a href="{{ route('language.get') }}">Language</a></li>
                    <li><a href="">Playlists</a></li>
                    <li><a id="create-playlist">Create Playlist</a></li>
                </ul>
            </div>
        </nav>
        <div class="mainbody">
            <nav class="navbar">

                <div class="searchbar-container">
                    <form action="{{ route('song.search') }}">
                        <input type="text" name="text" placeholder="Search The Music, Video, Artist, Album, Language, Genre">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="acc-container">
                    <div class="navbar-account">
                        <!-- <div class="user-pic"></div> -->
                        <h4>{{ session('user_name') }}</h4>
                        <i class="fas fa-chevron-down" id="drop-login"></i>
                    </div>
                    <div class="dropdown-acc">
                        <h4>Profile</h4>
                        <ul>
                            <li><a href="{{ route('logout') }}" id="logoutBtn">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
            <!-- <div class="playlist-modal" id="playlist-modal">
                <div class="modal-container" id="modal-container">
                    <h2>Create Playlist</h2>
                    <form>
                        <input id="playlist-name" type="text" name="" id="" class="form-control" placeholder="Enter Playlist Name" required>
                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                        <button id="playlist-form" class="form-control" type="submit">Create</button>
                    </form>
                </div>
            </div>
            <div id="playlist-container-modal">
                <div id="playlist-container">

                </div>
            </div> -->
        </div>
    </div>

</body>

</html>