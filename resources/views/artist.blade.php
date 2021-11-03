@extends('layouts/app')


@section('content')
<div class="contains">
    <div class="artists">
        <div class="section-title-container">
            <h2>Artists</h2>
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
    </div>
</div>


@endsection