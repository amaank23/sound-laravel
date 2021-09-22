<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Album;
use App\Models\Audio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index', ['videos' => $videos]);
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
        return view('admin.video.create', $data);
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
            'videoFile' => 'required|mimes:mp4',
        ], [
            'title.required' => 'Title is Required',
            'description.required' => 'Description must be of max 500 words',
            'videoFile' => 'File format not supported, format must be of mp4'
        ]);
        $fileName = time() . '.' . $request->videoFile->extension();

        $request->videoFile->move(public_path('uploads'), $fileName);
        $video = new Video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->video_file = $fileName;
        $video->artist = $request->artist;
        $video->genre = $request->genre;
        $video->album = $request->album;
        $video->year = $request->year;
        $video->save();
        return redirect()->route('admin.video');
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
        $get_file_name = Video::where([
            'id' => $id
        ])->first();
        Storage::delete($get_file_name['video_file']);
        Video::destroy($id);
        return back();
    }
}
