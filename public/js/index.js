function dropDownFunc(){
    const drop = document.getElementById('drop-login');
    const targetDrop = document.getElementsByClassName('dropdown-acc')[0];
    let clicked = false;
    drop.addEventListener('click', () => {
        if(clicked)  {
            targetDrop.style.display = 'none'
            clicked = false;
            return;
        }
        targetDrop.style.display = 'block';
        clicked = true;
    })
}

dropDownFunc();

function audioFunc(){
    const playBtn = document.getElementById('audio-btn');
    var audioItem = document.getElementById('audio-item');
    const progressContainer = document.querySelector('.music-progress-container');
    let progress = document.querySelector('.music-progress');
    let isPlaying = false;

    playBtn.addEventListener('click', () => {
        if(isPlaying){
            audioItem.pause();
            isPlaying = false;
        } else {
            audioItem.play();
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

// audioFunc();