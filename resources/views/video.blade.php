@extends('layouts/app')


@section('content')
<div class="contains">
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Latest Musics</h2>
        </div>
        <div class="row">
            @foreach($videos as $music)
            <div class="col-md-2">
                <div class="latest-music-container">
                    <a href="{{ route('video.single.get', ['id' => $music['id']]) }}">
                        <div class="music-img-container">
                            <img src="{{ asset('uploads/'.$music['cover']) }}" alt="">
                            <div class="playBtn-container">
                                <i class="fas fa-play"></i>
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
                            <button class="add-to-playlist-btn" id="video-{{ $music['id'] }}">Add to Playlist</button>
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