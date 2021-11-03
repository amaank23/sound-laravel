<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Models\Playlist;
use App\Models\PlaylistSong;
use App\Models\Video;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        return Playlist::where('user_id', session('user_id'))->get();
    }
    public function store(Request $request)
    {
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = session('user_id');
        $playlist->save();
        return $request;
    }
    public function storeSongToPlaylist(Request $request, $id)
    {
        $playlistSong = new PlaylistSong();

        $playlistSong->playlist_id = $id;
        $playlistSong->song_id = $request->song_id;
        $playlistSong->song_type = $request->song_type;
        $playlistSong->save();
        return back();
    }
    public function play($id)
    {
        $playlistSong = PlaylistSong::where('playlist_id', $id)->get();
        foreach ($playlistSong as $song) {
            if ($song['song_type'] == 'audio') {
                $song['song'] = Audio::find($song['song_id']);
            } else if ($song['song_type'] == 'video') {
                $song['song'] = Video::find($song['song_id']);
            }
        }
        return view('playlistSingle', ['playlists' => $playlistSong]);
    }
    public function delete($id)
    {
        PlaylistSong::where('playlist_id', $id)->delete();
        Playlist::destroy($id);
        return back();
    }
}
