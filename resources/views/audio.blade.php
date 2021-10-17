@extends('layouts/app')


@section('content')
<div class="contains">
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Latest Musics</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($audios as $music)
            <div class="col-3">
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