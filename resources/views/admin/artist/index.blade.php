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
                        <td><i onclick='editData({{  $artist->id }}, "{{  $artist->artist_name }}")' class="fas fa-edit"></i></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <form action="{{ route('admin.artist.add') }}" method="post" enctype="multipart/form-data" id="artistForm">
                @csrf
                <input type="text" name="artist" id="artistName" placeholder="Enter The Artist" class="form-control">
                <input type="file" name="artistImg" id="" class="form-control">
                <button type="submit" class="form-control" id="artistBtn">Add Artist</button>
            </form>
        </div>
    </div>
</div>
<script>
    function editData(id, name) {
        let form = document.getElementById('artistForm');
        let artistInput = document.getElementById('artistName');
        let artistBtn = document.getElementById('artistBtn');
        let hiddenInput1 = document.createElement('input');
        let hiddenInput1Exist = document.getElementById('id');

        if (hiddenInput1Exist) {
            hiddenInput1Exist.remove();
        }

        hiddenInput1.type = 'hidden';
        hiddenInput1.name = "id"
        hiddenInput1.value = id;
        hiddenInput1.id = "id"

        form.appendChild(hiddenInput1);
        artistInput.value = name;
        artistBtn.innerText = "Update Artist";
    }
</script>
@endsection