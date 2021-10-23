@extends('layouts/app')


@section('content')
<div class="contains" style="height: 100%;">
    <div class="music-cover">
        <img src="{{ asset('uploads/'.$audio['cover']) }}" alt="">
    </div>
    <div class="music-controls">
        <div class="music-progress-container">
            <div class="music-progress">
                <div class="hand"></div>
            </div>
        </div>
        <div class="music-actions">
            <i class="fas fa-play" id="audio-btn"></i>
        </div>
        <audio src="http://127.0.0.1:8000/file/{{ $audio['audio_file'] }}" id="audio-item"></audio>
    </div>
</div>

<script>
    function audioFunc() {
        const playBtn = document.getElementById('audio-btn');
        var audioItem = document.getElementById('audio-item');
        const progressContainer = document.querySelector('.music-progress-container');
        let progress = document.querySelector('.music-progress');
        let actions = document.querySelector('.music-actions');
        let isPlaying = false;

        playBtn.addEventListener('click', () => {
            if (isPlaying) {
                audioItem.pause();
                playBtn.classList.remove('fa-pause');
                playBtn.classList.add('fa-play');
                isPlaying = false;
            } else {
                audioItem.play();

                // playBtn.innerHTML = `<i class="fas fa-pause" id="audio-btn"></i>`
                playBtn.classList.remove('fa-play');
                playBtn.classList.add('fa-pause');
                isPlaying = true;
            }
        });

        audioItem.addEventListener('timeupdate', () => {
            progress.style.width = ((audioItem.currentTime / audioItem.duration) * 100) + '%';
        });

        progressContainer.addEventListener('click', (e) => {
            audioItem.currentTime = (audioItem.duration * (100 * e.offsetX)) / (100 * progressContainer.clientWidth);
        })
    }

    audioFunc();
</script>
@endsection