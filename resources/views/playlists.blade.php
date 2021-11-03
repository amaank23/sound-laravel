@extends('layouts/app')


@section('content')

<div class="contains">

    <div class="genres playlist">
        <div class="section-title-container">
            <h2>Playlists</h2>
        </div>
        <div class="row">
            @if(count($playlists) == 0)
            <p>No Playlist Found</p>
            @endif
            @foreach($playlists as $playlist)
            <div class="col-md-2">
                <a href="{{ route('playlist.get', ['id' => $playlist['id']]) }}">
                    <div class="genre-container">
                        <i class="fas fa-headphones-alt"></i>
                    </div>
                </a>
                <div class="playlist-div">
                    <div class="names-container">

                        <h2>{{ $playlist['name'] }}</h2>
                        <p>{{ $playlist['songs'] }} Songs</p>
                    </div>
                    <div>
                        <i class="fas fa-chevron-down dropmenu-btn"></i>
                    </div>
                    <div class="dropmenu">
                        <form action="{{ route('playlist.delete', ['id' => $playlist['id']]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</div>

<script>
    var Container = document.getElementsByClassName('genre-container');
    // Container.foreach(item => {
    //     let height = item.clientWidth;
    //     console.log(height);
    // })
    // for (let item of Container) {
    //     item.style.height = item.clientWidth;
    //     console.log(item.clientWidth);
    // }
    // console.log(Container);
    [...Container].forEach(item => {
        item.style.height = item.clientWidth + 'px';
    })
    // console.log(Container);
</script>
@endsection