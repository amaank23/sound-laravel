@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Album</h1>
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
                        <th scope="col">Albums</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                    <tr>
                        <th>{{ $album['id'] }}</th>
                        <td>{{ $album['title'] }}</td>
                        <td><a href="{{ route('admin.album.destroy', ['id' => $album['id']]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.album.add') }}" method="post">
                @csrf
                <input type="text" name="album" id="" placeholder="Enter The Album" class="form-control">
                <button type="submit" class="form-control">Add Album</button>
            </form>
        </div>
    </div>
</div>
@endsection