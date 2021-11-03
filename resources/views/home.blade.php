@extends('layouts/app')


@section('content')
<div class="contains">
    <section class="hero-section">
        <div class="banner-text-container">
            <div class="banner-img">
                <img src="{{ asset('img/banner.png') }}" alt="">
            </div>
            <div class="banner-text">
                <h1>This Month’s<br> <span style="color: #3BC8E7;">Record Breaking Albums !</span></h1>
                <p>Dream your moments, Until I Met You, Gimme Some Courage, Dark Alley, One More Of A Stranger, Endless
                    Things, The Heartbeat Stops, Walking Promises, Desired Games and many more...</p>
                <div class="banner-btn-container">
                    <a href="#">Listen Now</a>
                </div>
            </div>
        </div>
    </section>
    <div class="artists">
        <div class="section-title-container">
            <h2>Featured Artists</h2>
            <a href="#">View More</a>
        </div>
        <div class="row">
            @foreach($artists as $artist)
            <div class="col-md-2">
                <a href="{{ route('artist.get.single', ['id' => $artist['id']]) }}">
                    <div class="artist-container">
                        <div class="artist-img-container">
                            <img src="{{ asset('uploads/'.$artist['artistImg']) }}" alt="">
                        </div>
                        <div class="artist-info">
                            <h4>{{$artist['artist_name']}}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Latest Musics</h2>
            <a href="#">View More</a>
        </div>
        <div class="row">
            @foreach($latestMusics as $music)
            <div class="col-md-3">
                <div class="latest-music-container">
                    <a href="{{ route('audio.single.get', ['id' => $music['id']]) }}">
                        <div class="music-img-container">
                            <img src="{{ asset('uploads/'.$music['cover']) }}" alt="">
                            <div class="playBtn-container">
                                <!-- <i class="fas fa-play"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px">
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M39.320,25.169 C37.937,30.329 34.628,34.641 30.001,37.312 C26.919,39.091 23.498,39.999 20.032,39.999 C18.295,39.999 16.546,39.771 14.823,39.309 C9.662,37.927 5.349,34.618 2.678,29.992 C0.007,25.367 -0.703,19.978 0.680,14.819 C2.062,9.659 5.372,5.347 9.999,2.676 C14.626,0.005 20.016,-0.704 25.177,0.679 C30.337,2.061 34.651,5.370 37.322,9.996 C39.993,14.621 40.703,20.010 39.320,25.169 ZM35.518,11.037 C33.125,6.893 29.261,3.928 24.637,2.690 C23.094,2.277 21.527,2.072 19.971,2.072 C16.866,2.072 13.801,2.886 11.040,4.480 C6.895,6.872 3.930,10.735 2.691,15.357 C1.453,19.980 2.088,24.807 4.481,28.951 C6.875,33.095 10.739,36.059 15.362,37.298 C19.985,38.536 24.814,37.901 28.959,35.508 C33.104,33.116 36.069,29.253 37.308,24.630 C38.547,20.009 37.911,15.181 35.518,11.037 ZM31.473,12.173 C31.161,12.173 30.854,12.035 30.648,11.770 C28.503,8.998 25.277,7.136 21.797,6.661 C21.228,6.583 20.829,6.058 20.906,5.489 C20.984,4.918 21.510,4.520 22.079,4.598 C26.095,5.146 29.818,7.295 32.295,10.495 C32.648,10.949 32.564,11.603 32.109,11.955 C31.920,12.102 31.695,12.173 31.473,12.173 ZM30.687,19.994 C30.687,20.782 30.279,21.487 29.597,21.881 L16.736,29.304 C16.395,29.501 16.021,29.599 15.646,29.599 C15.272,29.599 14.898,29.501 14.557,29.304 C13.874,28.910 13.467,28.205 13.467,27.417 L13.467,12.571 C13.467,11.783 13.874,11.078 14.557,10.684 C15.239,10.290 16.054,10.290 16.737,10.684 L29.597,18.107 C30.279,18.500 30.687,19.206 30.687,19.994 ZM28.555,19.911 L15.695,12.487 C15.685,12.482 15.669,12.473 15.648,12.473 C15.634,12.473 15.617,12.477 15.598,12.487 C15.550,12.516 15.550,12.553 15.550,12.571 L15.550,27.417 C15.550,27.436 15.550,27.473 15.598,27.501 C15.646,27.529 15.679,27.510 15.695,27.501 L28.555,20.078 C28.571,20.069 28.604,20.050 28.604,19.994 C28.604,19.938 28.571,19.920 28.555,19.911 Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="music-info">
                        <h4>{{ $music['title'] }}</h4>
                        @if(Auth::check())
                        <div>
                            <i class="fas fa-chevron-down dropmenu-btn"></i>
                        </div>
                        <div class="dropmenu">
                            <button class="add-to-playlist-btn" id="audio-{{ $music['id'] }}">Add to Playlist</button>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </section>
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Latest Videos</h2>
            <a href="#">View More</a>
        </div>
        <div class="row">
            @foreach($latestVideos as $video)
            <div class="col-md-3">
                <div class="latest-music-container">
                    <a href="{{ route('video.single.get', ['id' => $video['id']]) }}">
                        <div class="music-img-container">
                            <img src="{{ asset('uploads/'.$video['cover']) }}" alt="">
                            <div class="playBtn-container">
                                <!-- <i class="fas fa-play"></i> -->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40px" height="40px">
                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M39.320,25.169 C37.937,30.329 34.628,34.641 30.001,37.312 C26.919,39.091 23.498,39.999 20.032,39.999 C18.295,39.999 16.546,39.771 14.823,39.309 C9.662,37.927 5.349,34.618 2.678,29.992 C0.007,25.367 -0.703,19.978 0.680,14.819 C2.062,9.659 5.372,5.347 9.999,2.676 C14.626,0.005 20.016,-0.704 25.177,0.679 C30.337,2.061 34.651,5.370 37.322,9.996 C39.993,14.621 40.703,20.010 39.320,25.169 ZM35.518,11.037 C33.125,6.893 29.261,3.928 24.637,2.690 C23.094,2.277 21.527,2.072 19.971,2.072 C16.866,2.072 13.801,2.886 11.040,4.480 C6.895,6.872 3.930,10.735 2.691,15.357 C1.453,19.980 2.088,24.807 4.481,28.951 C6.875,33.095 10.739,36.059 15.362,37.298 C19.985,38.536 24.814,37.901 28.959,35.508 C33.104,33.116 36.069,29.253 37.308,24.630 C38.547,20.009 37.911,15.181 35.518,11.037 ZM31.473,12.173 C31.161,12.173 30.854,12.035 30.648,11.770 C28.503,8.998 25.277,7.136 21.797,6.661 C21.228,6.583 20.829,6.058 20.906,5.489 C20.984,4.918 21.510,4.520 22.079,4.598 C26.095,5.146 29.818,7.295 32.295,10.495 C32.648,10.949 32.564,11.603 32.109,11.955 C31.920,12.102 31.695,12.173 31.473,12.173 ZM30.687,19.994 C30.687,20.782 30.279,21.487 29.597,21.881 L16.736,29.304 C16.395,29.501 16.021,29.599 15.646,29.599 C15.272,29.599 14.898,29.501 14.557,29.304 C13.874,28.910 13.467,28.205 13.467,27.417 L13.467,12.571 C13.467,11.783 13.874,11.078 14.557,10.684 C15.239,10.290 16.054,10.290 16.737,10.684 L29.597,18.107 C30.279,18.500 30.687,19.206 30.687,19.994 ZM28.555,19.911 L15.695,12.487 C15.685,12.482 15.669,12.473 15.648,12.473 C15.634,12.473 15.617,12.477 15.598,12.487 C15.550,12.516 15.550,12.553 15.550,12.571 L15.550,27.417 C15.550,27.436 15.550,27.473 15.598,27.501 C15.646,27.529 15.679,27.510 15.695,27.501 L28.555,20.078 C28.571,20.069 28.604,20.050 28.604,19.994 C28.604,19.938 28.571,19.920 28.555,19.911 Z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="music-info">
                        <h4>{{ $video['title'] }}</h4>
                        @if(Auth::check())
                        <div>
                            <i class="fas fa-chevron-down dropmenu-btn"></i>
                        </div>
                        <div class="dropmenu">
                            <button class="add-to-playlist-btn" id="video-{{ $video['id'] }}">Add to Playlist</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>

<script>
    var musicImgContainer = document.getElementsByClassName('music-img-container');
    // musicImgContainer.foreach(item => {
    //     let height = item.clientWidth;
    //     console.log(height);
    // })
    // for (let item of musicImgContainer) {
    //     item.style.height = item.clientWidth;
    //     console.log(item.clientWidth);
    // }
    // console.log(musicImgContainer);
    [...musicImgContainer].forEach(item => {
        item.style.height = item.clientWidth + 'px';
    })
    // console.log(musicImgContainer);
</script>
@endsection