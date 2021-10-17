@extends('layouts/app')


@section('content')

<div class="contains">

    <div class="genres">
        <div class="section-title-container">
            <h2>Genres</h2>
            <div class="liner"></div>
        </div>
        <div class="row">
            @foreach($genres as $genre)
            <div class="col-md-3">
                <a href="{{ route('genre.get.single', ['id' => $genre['id']]) }}">
                    <div class="genre-container">
                        <h2>{{ $genre['genre'] }}</h2>
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