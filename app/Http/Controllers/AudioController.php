<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Audio;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

class AudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $audios = Audio::all();
        return view('admin.audio.index', ['audios' => $audios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'artists' => Artist::all(),
            'genres' => Genre::all(),
            'albums' => Album::all(),
            'languages' => Language::all()
        ];
        return view('admin.audio.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:500',
            'audioFile' => 'required|mimes:mp3,wav,ogg',
        ], [
            'title.required' => 'Title is Required',
            'description.required' => 'Description must be of max 500 words',
            'audioFile' => 'File format not supported, format must be of mp3, ogg, wav'
        ]);
        $audioFileName = time() . '.' . $request->audioFile->extension();

        $request->audioFile->move(public_path('uploads'), $audioFileName);

        if ($request->exists('coverFile')) {
            $coverFileName = time() . '_cover_' . '.' . $request->coverFile->extension();
            $request->coverFile->move(public_path('uploads'), $coverFileName);
        }

        $audio = new Audio();
        $audio->title = $request->title;
        $audio->description = $request->description;
        $audio->audio_file = $audioFileName;
        if ($request->exists('coverFile')) $audio->cover = $coverFileName;
        $audio->artist = $request->artist;
        $audio->genre = $request->genre;
        $audio->album = $request->album;
        $audio->language = $request->language;
        $audio->year = $request->year;
        $audio->save();
        return redirect()->route('admin.audio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $audio = Audio::find($id);
        $data = [
            'artists' => Artist::all(),
            'genres' => Genre::all(),
            'albums' => Album::all(),
            'languages' => Language::all(),
            'audio' => $audio
        ];
        return view('admin.audio.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $audio = Audio::find($id);

        if ($audio->title !== $request->title) $audio->title = $request->title;
        if ($audio->description !== $request->description) $audio->description = $request->description;
        if ($audio->artist !== $request->artist) $audio->artist = $request->artist;
        if ($audio->genre !== $request->genre) $audio->genre = $request->genre;
        if ($audio->album !== $request->album) $audio->album = $request->album;
        if ($audio->language !== $request->language) $audio->language = $request->language;
        if ($audio->year !== $request->year) $audio->year = $request->year;
        if ($request->exists('audioFile')) {
            Storage::delete($audio['audio_file']);
            $audioFileName = time() . '.' . $request->audioFile->extension();
            $request->audioFile->move(public_path('uploads'), $audioFileName);

            $audio->audio_file = $audioFileName;
        }
        if ($request->exists('coverFile')) {
            if ($audio->cover !== null) {
                Storage::delete($audio->cover);
            }
            $coverFileName = time() . '_cover_' . '.' . $request->coverFile->extension();
            $request->coverFile->move(public_path('uploads'), $coverFileName);

            $audio->cover = $coverFileName;
        }

        $audio->save();

        return redirect()->route('admin.audio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get_file_name = Audio::where([
            'id' => $id
        ])->first();
        Storage::delete($get_file_name['audio_file']);
        Storage::delete($get_file_name['cover']);
        Audio::destroy($id);
        return back();
    }

    public function play($id)
    {
        $audio = Audio::find($id);
        return view('audioPlayer', ['audio' => $audio]);
    }
    public function single($id)
    {
        $audio = Audio::find($id);
        $language = Language::find($audio['language']);
        $genre = Genre::find($audio['genre']);
        $artist = Artist::find($audio['artist']);
        $album = Album::find($audio['album']);
        $reviews = Review::where([
            'song_id' => $id,
            'song_type' => 'audio'
        ])->get();
        foreach ($reviews as $review) {
            $review->user_id = User::find($review->user_id)->name;
        }
        $data = [
            'audio' => $audio,
            'language' => $language,
            'genre' => $genre,
            'artist' => $artist,
            'album' => $album,
            'reviews' => $reviews
        ];
        return view('audioSingle', $data);
    }
}
