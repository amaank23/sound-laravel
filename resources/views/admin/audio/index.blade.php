@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Audio</h1>
    </div>

    <div class="add-new-btn"><a href="{{ route('admin.audio.create') }}">Add new Audio</a></div>
    <div class="music-container">
        @foreach($audios as $audio)
        <div class="music-single">
            <div class="music-single-item">
                <div class="single-music-container">
                    <div class="music-img"><i id="audio-btn" class="fas fa-play"></i></div>
                    <p class="music-title">{{ $audio['title'] }}</p>
                </div>
                <div class="action-icons">
                    <form action="{{ route('admin.audio.destroy', ['id' => $audio['id']]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- <div class="music-handle">
                <div class="music-progress-container">
                    <div class="music-progress">

                    </div>
                </div>
            </div>
            <audio id="audio-item" src="http://127.0.0.1:8000/file/1632221602"></audio> -->
        </div>
        @endforeach
    </div>
</div>
@endsection