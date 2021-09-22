<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Audio;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'albums' => Album::all()
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
        $fileName = time() . '.' . $request->audioFile->extension();

        $request->audioFile->move(public_path('uploads'), $fileName);
        $audio = new Audio();
        $audio->title = $request->title;
        $audio->description = $request->description;
        $audio->audio_file = $fileName;
        $audio->artist = $request->artist;
        $audio->genre = $request->genre;
        $audio->album = $request->album;
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
        //
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
        //
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
        Audio::destroy($id);
        return back();
    }
}
