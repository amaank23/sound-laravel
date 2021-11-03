@extends('layouts/app')


@section('content')

<div class="contains">

    <div class="row">
        <div class="col-md-8">
            <div class="player-container" id="player-container">
                <div id="screen"></div>
                <div class="controls-container">
                    <div class="music-progress-container">
                        <div class="music-progress"></div>
                    </div>
                    <div class="controls">
                        <div>
                            <i class="fas fa-step-backward" id="prev-btn"></i>
                            <i class="fas fa-play" id="audio-btn"></i>
                            <i class="fas fa-step-forward" id="next-btn"></i>
                        </div>
                        <div>
                            <!-- <input type="range" max="100" min="0" id="volume-slider" value="100"> -->
                            <i class="fas fa-expand" id="full-screen"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="playlist-songs-container">
                @foreach($playlists as $playlist)
                <div class="song-container">
                    <img src="{{ asset('uploads/'.$playlist['song']['cover']) }}" alt="">
                    <span>{{ $playlist['song']['title'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
<script>
    let isPlaying = false;

    function pauseSong() {
        const playBtn = document.getElementById('audio-btn');
        var audioItem = document.getElementById('audio-item');

        audioItem.pause();
        playBtn.classList.remove('fa-pause');
        playBtn.classList.add('fa-play');
        isPlaying = false;
    }

    function playSong() {
        const playBtn = document.getElementById('audio-btn');
        var audioItem = document.getElementById('audio-item');

        audioItem.play();

        // playBtn.innerHTML = `<i class="fas fa-pause" id="audio-btn"></i>`
        playBtn.classList.remove('fa-play');
        playBtn.classList.add('fa-pause');
        isPlaying = true;
    }

    function updateMediaTime() {
        var audioItem = document.getElementById('audio-item');
        const progressContainer = document.querySelector('.music-progress-container');
        let progress = document.querySelector('.music-progress');

        audioItem.addEventListener('timeupdate', () => {
            progress.style.width = ((audioItem.currentTime / audioItem.duration) * 100) + '%';
        });
    }

    function changeProgressOnClick() {
        var audioItem = document.getElementById('audio-item');
        const progressContainer = document.querySelector('.music-progress-container');
        let progress = document.querySelector('.music-progress');
        progressContainer.addEventListener('click', (e) => {
            audioItem.currentTime = (audioItem.duration * (100 * e.offsetX)) / (100 * progressContainer.clientWidth);
        });
    }

    function play() {

        const playBtn = document.getElementById('audio-btn');

        playBtn.addEventListener('click', () => {
            if (isPlaying) {
                pauseSong();
            } else {
                playSong();
            }
        });
    }

    function audioFunc() {
        var audioItem = document.getElementById('audio-item');
        const progressContainer = document.querySelector('.music-progress-container');
        let progress = document.querySelector('.music-progress');
        let actions = document.querySelector('.controls');
        play();


        updateMediaTime();
        changeProgressOnClick();
    }

    // audioFunc();





    function playlistConfig() {
        prevBtn = document.getElementById('prev-btn');
        nextBtn = document.getElementById('next-btn');

        data = <?php echo json_encode($playlists) ?>;
        let screen = document.getElementById('screen');
        index = 0;
        if (data[index].song_type == 'audio') {
            screen.innerHTML = `
            <div id='cover'>
                <img src='{{ asset('uploads') }}/${data[index]['song']['cover']}' id="audio-cover" />
            </div>
            <audio src='http://127.0.0.1:8000/file/${data[index]['song']['audio_file']}' id='audio-item'></audio>
            `;
        }
        if (data[index].song_type == 'video') {
            screen.innerHTML = `
            <video src='http://127.0.0.1:8000/file/${data[index]['song']['video_file']}' id='audio-item'></video>
            `;
        }

        if (screen.innerHTML) {
            audioFunc();

            var audioItem = document.getElementById('audio-item');
            var audioCover = document.getElementById('audio-cover');
            const playBtn = document.getElementById('audio-btn');
            const fullScreen = document.getElementById('full-screen');
            const playerContainer = document.getElementById('player-container');


            // const volumeSlider = document.getElementById('volume-slider');

            // volumeSlider.addEventListener('input', (e) => {
            //     audioItem.volume = e.target.value / 100;
            // })

            nextBtn.addEventListener('click', () => {
                index += 1;

                if (index > data.length - 1) {
                    index = 0;
                }

                if (data[index].song_type == 'audio') {
                    screen.innerHTML = `
                    <div id='cover'>
                        <img src='{{ asset('uploads') }}/${data[index]['song']['cover']}' id="audio-cover" />
                    </div>
                    <audio src='http://127.0.0.1:8000/file/${data[index]['song']['audio_file']}' id='audio-item'></audio>
                    `;
                } else if (data[index].song_type == 'video') {
                    screen.innerHTML = `
                    <video src='http://127.0.0.1:8000/file/${data[index]['song']['video_file']}' id='audio-item'></video>
                    `;
                }

                playSong();
                updateMediaTime();
                changeProgressOnClick();
            });


            prevBtn.addEventListener('click', () => {
                index -= 1;

                if (index < 0) {
                    index = data.length - 1;
                }

                if (data[index].song_type == 'audio') {
                    screen.innerHTML = `
                    <div id='cover'>
                        <img src='{{ asset('uploads') }}/${data[index]['song']['cover']}' id="audio-cover" />
                    </div>
                    <audio src='http://127.0.0.1:8000/file/${data[index]['song']['audio_file']}' id='audio-item'></audio>
                    `;
                } else if (data[index].song_type == 'video') {
                    screen.innerHTML = `
                    <video src='http://127.0.0.1:8000/file/${data[index]['song']['video_file']}' id='audio-item'></video>
                    `;
                }

                playSong();
                updateMediaTime();
                changeProgressOnClick();
            });



            fullScreen.addEventListener('click', () => {
                playerContainer.requestFullscreen();
            });
        }
    }
    playlistConfig();
</script>

@endsection