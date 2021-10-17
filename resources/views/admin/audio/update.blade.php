@extends('admin/layout/master')


@section('content')
<div class="audio-index">
    <div class="page-title-container">
        <h1>Update Audio</h1>
    </div>
    <form action="{{ route('admin.audio.update', ['id' => $audio['id']]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $audio['title'] ? $audio['title'] : '' }}" class="form-control" placeholder="Enter the Title">
        @error('title')
        <small>{{$message}}</small>
        @enderror
        <textarea name="description" value="{{ $audio['description'] ? $audio['description'] : '' }}" id="" cols="30" rows="10" class="form-control" placeholder="Enter the Description"></textarea>
        @error('description')
        <small>{{$message}}</small>
        @enderror
        <label for="audio-upl">
            <div class="audio-uploader">
                <i class="fas fa-music"></i>
                <h2>Upload the Audio</h2>
            </div>
        </label>
        <input type="file" name="audioFile" id="audio-upl" hidden>
        @error('audioFile')
        <small>{{$message}}</small>
        @enderror
        <input type="file" name="coverFile" class="form-control" id="">
        <div class="select-option">
            <select name="artist" id="" class="form-control">
                <option value="">Select Artist</option>
                @foreach($artists as $artist)
                <option value="{{ $artist['id'] }}" {{ $artist['id'] == $audio['artist'] ? 'selected' : '' }}>{{ $artist['artist_name'] }}</option>
                @endforeach
            </select>
            <select name="album" id="" class="form-control">
                <option value="">Select Album</option>
                @foreach($albums as $album)
                <option value="{{ $album['id'] }}" {{ $album['id'] == $audio['album'] ? 'selected' : '' }}>{{ $album['title'] }}</option>
                @endforeach
            </select>
            <select name="language" id="" class="form-control">
                <option value="">Select Language</option>
                @foreach($languages as $language)
                <option value="{{ $language['id'] }}" {{ $language['id'] == $audio['language'] ? 'selected' : '' }}>{{ $language['language'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="select-option">
            <select name="genre" id="" class="form-control">
                <option value="">Select Genre</option>
                @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}" {{ $genre['id'] == $audio['genre'] ? 'selected' : '' }}>{{ $genre['genre'] }}</option>
                @endforeach
            </select>
            <select name="year" id="" class="form-control">
                <option value="">Select Year Released</option>
                @for($i = 1960; $i <= 2021; $i++) <option value="{{ $i }}" {{ $i == $audio['year'] ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
            </select>
        </div>
        <button type="submit" class="form-control">Update Audio</button>



    </form>
</div>
@endsection