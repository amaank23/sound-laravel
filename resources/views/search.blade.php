@extends('layouts/app')


@section('content')
<div class="contains">

    <div class="section-title-container">
        <h2>Search Results</h2>
        <div class="liner"></div>
    </div>
    @if(count($audios) > 0)
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Musics</h2>
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
    @endif
    @if(count($videos) > 0)
    <section class="latest-music">
        <div class="section-title-container">
            <h2>Videos</h2>
            <div class="liner"></div>
        </div>

        <div class="row">
            @foreach($videos as $music)
            <div class="col-3">
                <a href="{{ route('video.single.get', ['id' => $music['id']]) }}">
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
    @endif

    @if(count($artists) > 0)
    <section class="artists">
        <div class="section-title-container">
            <h2>Artists</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($artists as $artist)
            <div class="col-md-3">
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
    </section>
    @endif
    @if(count($genres) > 0)
    <section class="genres">
        <div class="section-title-container">
            <h2>Genres</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($genres as $genre)
            <div class="col-md-3">
                <a href="{{ route('genre.get.single', ['id' => $genre['id']]) }}">
                    <div class="genre-container">
                        <h2>{{ $genre['genre'] }}</h2>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </section>
    @endif
    @if(count($languages) > 0)
    <section class="genres">
        <div class="section-title-container">
            <h2>Languages</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($languages as $language)
            <div class="col-md-3">
                <a href="{{ route('language.get.single', ['id' => $language['id']]) }}">
                    <div class="genre-container">
                        <h2>{{ $language['language'] }}</h2>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </section>
    @endif
    @if(count($albums) > 0)
    <section class="genres">
        <div class="section-title-container">
            <h2>Albums</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($albums as $album)
            <div class="col-md-3">
                <a href="{{ route('album.get.single', ['id' => $album['id']]) }}">
                    <div class="genre-container">
                        <h2>{{ $album['title'] }}</h2>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </section>
    @endif
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