@extends('admin/layout/master')


@section('content')
<div class="audio-index">
    <div class="page-title-container">
        <h1>Add Audio</h1>
    </div>
    <form action="{{ route('admin.video.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" class="form-control" placeholder="Enter the Title">
        @error('title')
        <small>{{$message}}</small>
        @enderror
        <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Enter the Description"></textarea>
        @error('description')
        <small>{{$message}}</small>
        @enderror
        <label for="audio-upl">
            <div class="audio-uploader">
                <i class="fas fa-music"></i>
                <h2>Upload the Video</h2>
            </div>
        </label>
        <input type="file" name="videoFile" id="audio-upl" hidden>
        @error('videoFile')
        <small>{{$message}}</small>
        @enderror
        <div class="select-option">
            <select name="artist" id="" class="form-control">
                <option value="">Select Artist</option>
                @foreach($artists as $artist)
                <option value="{{ $artist['id'] }}">{{ $artist['artist_name'] }}</option>
                @endforeach
            </select>
            <select name="album" id="" class="form-control">
                <option value="">Select Album</option>
                @foreach($albums as $album)
                <option value="{{ $album['id'] }}">{{ $album['title'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="select-option">
            <select name="genre" id="" class="form-control">
                <option value="">Select Genre</option>
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}">{{ $genre['genre'] }}</option>
                @endforeach
            </select>
            <select name="year" id="" class="form-control">
                <option value="">Select Year Released</option>
                @for($i = 1960; $i <= 2021; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
        </div>
        <button type="submit" class="form-control">Add Video</button>



    </form>
</div>
@endsection