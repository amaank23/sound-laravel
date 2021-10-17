<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Album;
use App\Models\Audio;
use App\Models\Language;
use App\Models\Review;
use App\Models\User;
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
        // $coverFileName = time() . '_cover_' . '.' . $request->coverFile->extension();

        $request->videoFile->move(public_path('uploads'), $fileName);
        // $request->coverFile->move(public_path('uploads'), $coverFileName);

        if ($request->exists('coverFile')) {
            $coverFileName = time() . '_cover_' . '.' . $request->coverFile->extension();
            $request->coverFile->move(public_path('uploads'), $coverFileName);
        }

        $video = new Video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->video_file = $fileName;
        if ($request->exists('coverFile')) $video->cover = $coverFileName;
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
        $video = Video::find($id);
        $data = [
            'artists' => Artist::all(),
            'genres' => Genre::all(),
            'albums' => Album::all(),
            'languages' => Language::all(),
            'video' => $video
        ];
        return view('admin.video.update', $data);
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
        $video = Video::find($id);

        if ($video->title !== $request->title) $video->title = $request->title;
        if ($video->description !== $request->description) $video->description = $request->description;
        if ($video->artist !== $request->artist) $video->artist = $request->artist;
        if ($video->genre !== $request->genre) $video->genre = $request->genre;
        if ($video->album !== $request->album) $video->album = $request->album;
        if ($video->language !== $request->language) $video->language = $request->language;
        if ($video->year !== $request->year) $video->year = $request->year;
        if ($request->exists('videoFile')) {
            Storage::delete($video['video_file']);
            $videoFileName = time() . '.' . $request->videoFile->extension();
            $request->videoFile->move(public_path('uploads'), $videoFileName);

            $video->video_file = $videoFileName;
        }
        if ($request->exists('coverFile')) {
            if ($video->cover !== null) {
                Storage::delete($video->cover);
            }
            $coverFileName = time() . '_cover_' . '.' . $request->coverFile->extension();
            $request->coverFile->move(public_path('uploads'), $coverFileName);

            $video->cover = $coverFileName;
        }

        $video->save();

        return redirect()->route('admin.video');
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
        Storage::delete($get_file_name['cover']);
        Video::destroy($id);
        return back();
    }
    public function play($id)
    {
        $video = Video::find($id);
        return view('videoPlayer', ['video' => $video]);
    }
    public function single($id)
    {
        $video = Video::find($id);
        $language = Language::find($video['language']);
        $genre = Genre::find($video['genre']);
        $artist = Artist::find($video['artist']);
        $album = Album::find($video['album']);
        $reviews = Review::where([
            'song_id' => $id,
            'song_type' => 'video'
        ])->get();
        foreach ($reviews as $review) {
            $review->user_id = User::find($review->user_id)->name;
        }
        $data = [
            'video' => $video,
            'language' => $language,
            'genre' => $genre,
            'artist' => $artist,
            'album' => $album,
            'reviews' => $reviews
        ];
        return view('videoSingle', $data);
    }
}
