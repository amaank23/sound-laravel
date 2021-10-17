@extends('layouts/app')


@section('content')

<div class="contains">

    <div class="genres">
        <div class="section-title-container">
            <h2>Albums</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($albums as $album)
            <div class="col-md-3">
                <a href="{{ route('album.get.single', ['id' => $album['id']]) }}">
                    <div class="genre-container">
                        <h2>{{ $album['title'] }}</h2>
                    </div>
                </a>
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