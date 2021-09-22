@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Artist</h1>
    </div>

    <!-- <div class="music-container">
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">Clean Bandit - Rockabye (feat. Sean Paul & Anne-Marie) [Official Video]</p>
            </div>
            <div class="action-icons"><i class="fas fa-trash-alt"></i></div>
        </div>
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">Clean Bandit - Rockabye (feat. Sean Paul & Anne-Marie) [Official Video]</p>
            </div>
            <div class="action-icons"><i class="fas fa-trash-alt"></i></div>
        </div>
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">Clean Bandit - Rockabye (feat. Sean Paul & Anne-Marie) [Official Video]</p>
            </div>
            <div class="action-icons"><i class="fas fa-trash-alt"></i></div>
        </div>
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">Clean Bandit - Rockabye (feat. Sean Paul & Anne-Marie) [Official Video]</p>
            </div>
            <div class="action-icons"><i class="fas fa-trash-alt"></i></div>
        </div>
        <div class="music-single">
            <div class="single-music-container">
                <div class="music-img"><i class="fas fa-play"></i></div>
                <p class="music-title">Clean Bandit - Rockabye (feat. Sean Paul & Anne-Marie) [Official Video]</p>
            </div>
            <div class="action-icons"><i class="fas fa-trash-alt"></i></div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-6">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Artists</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artists as $artist)
                    <tr>
                        <th>{{ $artist['id'] }}</th>
                        <td>{{ $artist['artist_name'] }}</td>
                        <td><a href="{{ route('admin.artist.destroy', ['id' => $artist['id']]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.artist.add') }}" method="post">
                @csrf
                <input type="text" name="artist" id="" placeholder="Enter The Artist" class="form-control">
                <button type="submit" class="form-control">Add Artist</button>
            </form>
        </div>
    </div>
</div>
@endsection