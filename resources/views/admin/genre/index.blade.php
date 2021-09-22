@extends('admin/layout/master')


@section('content')
<div class="audio-index" style="height: 100vh;">
    <div class="page-title-container">
        <h1>All Genre</h1>
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
                        <th scope="col">Genres</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($genres as $genre)
                    <tr>
                        <th>{{ $genre['id'] }}</th>
                        <td>{{ $genre['genre'] }}</td>
                        <td><a href="{{ route('admin.genre.destroy', ['id' => $genre['id']]) }}"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.genre.add') }}" method="post">
                @csrf
                <input type="text" name="genre" id="" placeholder="Enter The Genre" class="form-control">
                <button type="submit" class="form-control">Add Genre</button>
            </form>
        </div>
    </div>
</div>
@endsection