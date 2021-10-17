@extends('layouts/app')


@section('content')
<div class="contains">
    <div class="music-single music-single-page">

        <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="music-cover">

                        <img src="{{ asset('uploads/'.$audio['cover']) }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="music-details">
                        <h2>{{ $audio['title'] }}</h2>
                        <p>{{ $audio['description'] }}</p>
                        <p>Artist: {{ isset($artist['artist_name']) ? $artist['artist_name'] : 'Not Available' }}</p>
                        <p>Language: {{ isset($language['language']) ? $language['language'] : 'Not Available' }}</p>
                        <p>Genre: {{ isset($genre['genre']) ? $genre['genre'] : 'Not Available' }}</p>
                        <p>Album: {{ isset($album['title']) ? $album['title'] : 'Not Available' }}</p>
                        <p>Year Released: {{ isset($audio['year']) ?  $audio['year'] : 'Not Available'}}</p>
                        <a href="{{ route('audio.play', ['id' => $audio['id']]) }}">Play</a>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <div class="reviews">
                        <div class="section-title-container">
                            <h2>Reviews & Ratings</h2>
                            <div class="liner"></div>
                        </div>
                        <form action="{{ route('audio.review.store', ['id' => $audio['id']]) }}" method="POST">
                            @csrf
                            <textarea rows="4" class="form-control" name="review" id="" cols="30" rows="10"></textarea>
                            @error('review')
                            <small>{{ $message }}</small>
                            @enderror
                            <div class="stars" id="stars">
                                <i class="fas fa-star star" id="1"></i>
                                <i class="fas fa-star star" id="2"></i>
                                <i class="fas fa-star star" id="3"></i>
                                <i class="fas fa-star star" id="4"></i>
                                <i class="fas fa-star star" id="5"></i>
                            </div>
                            @error('rating')
                            <small>{{ $message }}</small>
                            @enderror
                            <input type="hidden" name="rating" id="rating">
                            <input type="hidden" name="song_type" value="audio">
                            <button class="form-control" type="submit">Review</button>
                        </form>
                        <div class="reviews-colection">
                            @foreach($reviews as $review)
                            <div class="review-container">
                                <div class="first">
                                    <p class="date">{{$review['user_id'] }} - {{ $review['published_date'] }}</p>
                                    <p style="font-size: 20px">{{ $review['review'] }}</p>
                                </div>
                                <div class="second">
                                    @for($i = 1; $i <= $review['rating']; $i++) <i class="fas fa-star filled"></i>
                                        @endfor
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    let stars = document.getElementsByClassName('star');
    let inputRating = document.getElementById('rating');
    [...stars].forEach(star => {
        // star.addEventListener('mouseover', () => {
        //     for (let i = 0; i < star.id; i++) {
        //         // stars[i].style.color = 'yellow';
        //         stars[i].classList.add('filled');
        //     }
        // });
        // star.addEventListener('mouseleave', () => {
        //     if (star.classList.contains('filled')) return;
        //     for (let i = 0; i < star.id; i++) {
        //         // stars[i].style.color = 'white';

        //         stars[i].classList.remove('filled');
        //     }
        // });
        star.addEventListener('click', () => {
            for (let i = 0; i < stars.length; i++) {
                stars[i].classList.remove('filled');
            }
            rating.value = star.id;
            for (let i = 0; i < star.id; i++) {
                stars[i].classList.add('filled');
            }
        });
    });
</script>
@endsection