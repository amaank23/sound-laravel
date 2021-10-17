@extends('layouts/app')


@section('content')
<div class="contains">
    <div class="artists">
        <div class="section-title-container">
            <h2>Artists</h2>
            <div class="liner"></div>
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
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($latestMusics as $music)
            <div class="col">
                <a href="{{ route('audio.single.get', ['id' => $music['id']]) }}">
                    <div class="latest-music-container">
                        <div class="music-img-container">
                            <img src="{{ asset('uploads/'.$music['cover']) }}" alt="">
                            <div class="playBtn-container">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="music-info">
                            <h4>{{ $music['title'] }}</h4>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Latest Videos</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($latestVideos as $video)
            <div class="col">
                <a href="{{ route('video.single.get', ['id' => $video['id']]) }}">
                    <div class="latest-music-container">
                        <div class="music-img-container">
                            <img src="{{ asset('uploads/'.$video['cover']) }}" alt="">
                            <div class="playBtn-container">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="music-info">
                            <h4>{{ $video['title'] }}</h4>
                        </div>
                    </div>
                </a>
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