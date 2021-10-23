@extends('layouts/app')


@section('content')

<body>
    <div class="contains" style="height: 100%;">
        <div class="music-cover">

            <video src="http://127.0.0.1:8000/file/{{ $video['video_file'] }}" id="audio-item" style="width: 100%; height: 100%;"></video>
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
        </div>
    </div>
    <script>
        function audioFunc() {
            const playBtn = document.getElementById('audio-btn');
            var audioItem = document.getElementById('audio-item');
            const progressContainer = document.querySelector('.music-progress-container');
            let progress = document.querySelector('.music-progress');
            let isPlaying = false;

            playBtn.addEventListener('click', () => {
                if (isPlaying) {
                    audioItem.pause();
                    playBtn.classList.remove('fa-pause');
                    playBtn.classList.add('fa-play');
                    isPlaying = false;
                } else {
                    audioItem.play();
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