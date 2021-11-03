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
function dropPlaylistFunc(){
    const drop = document.getElementsByClassName('dropmenu-btn');
    const addToPlaylistBtn = document.getElementsByClassName('add-to-playlist-btn');
    const playlistModelContainer = document.getElementById('playlist-container-modal');


    [...drop].forEach(item => {
        let clicked = false;
        item.addEventListener('click', () => {
            const target = item.parentElement.parentElement.childNodes[5];
            if(clicked)  {
                target.style.display = 'none'
                clicked = false;
                return;
            }
            target.style.display = 'block';
            clicked = true;
        });

        [...addToPlaylistBtn].forEach(item => {
            item.addEventListener('click', () => {
                playlistModelContainer.style.visibility = 'visible';   
                showPlaylists(item.id.split('-')[1], item.id.split('-')[0]);
            })
        })
    })
}

dropPlaylistFunc();


function createPlaylist(){
    const playlistBtn = document.getElementById('create-playlist');
    const playlistModal = document.getElementById('playlist-modal');
    const modalContainer = document.getElementById('modal-container');
    const playlistForm = document.getElementById('playlist-form');

    playlistBtn.addEventListener('click', () => {
        playlistModal.style.visibility = 'visible';
    });

    playlistModal.addEventListener('click', () => {
        
        playlistModal.style.visibility = 'hidden';
    });
    modalContainer.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        return false;
    });

    playlistForm.addEventListener('click', (e) => {
        const playlistName = document.getElementById('playlist-name');
        const token = document.getElementById('token');

        if(!playlistName.value){
            return;
        }
        SendPlaylistName(playlistName.value, token.value);
        
    })
    async function SendPlaylistName(name, token){
        const post_data = {
            name
        }
        var xhttp = new XMLHttpRequest();

        let urlEncodedData = "";
        urlEncodedDataPairs = [];
        name;

        for (name in post_data) {
            urlEncodedDataPairs.push(encodeURIComponent(name) + '=' + encodeURIComponent(post_data[name]));
        }

        urlEncodedData = urlEncodedDataPairs.join('&').replace(/%20/g, '+');

        xhttp.onload = () => {
            if(xhttp.status) {
                playlistModal.style.visibility = 'hidden';
                location.reload();
            }
        }
        xhttp.open("POST", "/playlist", true);

        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.setRequestHeader('X-CSRF-TOKEN', token);

        xhttp.send(urlEncodedData);
    }
}

createPlaylist();


function showPlaylists(songId, songType){
    const token = document.querySelector('meta[name="_token"]').getAttribute('content');
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // console.log(JSON.parse(this.responseText));
                // console.log(xhttp.response);
                let app = document.querySelector('#playlist-container');
                app.innerHTML = "<h2>Select the Playlist</h2>"
                myElements = JSON.parse(this.responseText).map(playlist => {
                    let tr = document.createElement('div');
                    tr.innerHTML = `
                    <div class="playlist-container">
                        <form action="/playlist/${playlist.id}" method="POST">
                            <input type="hidden" name="_token" value="${token}">
                            <input type="hidden" name="song_type" value="${songType}">
                            <input type="hidden" name="song_id" value="${songId}">
                            <button>${playlist.name}</button>
                        </form>
                    </div>
                    `;
                    return tr;
                });
                myElements.forEach(item => {
                    app.appendChild(item);
                })
            }
        };
        xhttp.open("GET", "/ajax/playlists", true);
        xhttp.send();
}
