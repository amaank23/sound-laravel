<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Audio;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Playlist;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $artists = Artist::limit(6)->get();
        $latestMusics = Audio::limit(5)->get();
        $latestVideos = Video::limit(5)->get();
        return view('home', [
            'artists' => $artists,
            'latestMusics' => $latestMusics,
            'latestVideos' => $latestVideos
        ]);
    }
    public function audio()
    {
        $audios = Audio::all();
        return view('audio', ['audios' => $audios]);
    }
    public function video()
    {
        $videos = Video::all();
        return view('video', ['videos' => $videos]);
    }
    public function artist()
    {
        $artists = Artist::all();
        return view('artist', ['artists' => $artists]);
    }
    public function genre()
    {
        $genres = Genre::all();
        return view('genre', ['genres' => $genres]);
    }
    public function album()
    {
        $albums = Album::all();
        return view('album', ['albums' => $albums]);
    }
    public function language()
    {
        $languages = Language::all();
        return view('language', ['languages' => $languages]);
    }
    public function playlists()
    {
        $playlists = Playlist::all();
        return view('playlists', ['playlists' => $playlists]);
    }
    public function search(Request $request)
    {
        $audio = Audio::where('title', $request->text)->orWhere('title', 'LIKE', $request->text . '%')->get();
        $videos = Video::where('title', $request->text)->orWhere('title', 'LIKE', $request->text . '%')->get();
        $artist = Artist::where('artist_name', $request->text)->orWhere('artist_name', 'LIKE', $request->text . '%')->get();
        $language = Language::where('language', $request->text)->orWhere('language', 'LIKE', $request->text . '%')->get();
        $genre = Genre::where('genre', $request->text)->orWhere('genre', 'LIKE', $request->text . '%')->get();
        $album = Album::where('title', $request->text)->orWhere('title', 'LIKE', $request->text . '%')->get();
        $data = [
            'audios' => $audio,
            'videos' => $videos,
            'artists' => $artist,
            'genres' => $genre,
            'languages' => $language,
            'albums' => $album
        ];
        return view('search', $data);
    }
}
