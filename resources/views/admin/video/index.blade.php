@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Video</h1>
    </div>

    <div class="add-new-btn"><a href="{{ route('admin.video.create') }}">Add new Video</a></div>
    <div class="music-container">
        @foreach($videos as $video)
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">{{ $video['title'] }}</p>
            </div>
            <div class="action-icons">
                <form action="{{ route('admin.video.destroy', ['id' => $video['id']]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection