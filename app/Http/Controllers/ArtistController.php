<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Audio;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_artists = Artist::all();
        return view('admin.artist.index', ['artists' => $all_artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->exists('id')) {
            $artist = Artist::find($request->id);

            if ($request->exists('artist')) {
                $artist->artist_name = $request->artist;
            }
            if ($request->exists('artistImg')) {
                if ($artist->artistImg) {
                    Storage::delete($artist->artistImg);
                }
                $fileName = time() . '_artist_' . '.' . $request->artistImg->extension();
                $request->artistImg->move(public_path('uploads'), $fileName);
                $artist->artistImg = $fileName;
            }
            $artist->save();
            return back();
        }
        $fileName = time() . '_artist_' . '.' . $request->artistImg->extension();
        $request->artistImg->move(public_path('uploads'), $fileName);

        $artist = new Artist();
        $artist->artist_name = $request->artist;
        $artist->artistImg = $fileName;
        $artist->save();
        return back();
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
        $artist = Artist::find($id);
        Storage::delete($artist['artistImg']);
        Artist::destroy($id);
        return back();
    }
    public function artist($id)
    {
        $audios = Audio::where('artist', $id)->get();
        $videos = Video::where('artist', $id)->get();
        $artistName = Artist::find($id);
        return view('artistSingle', ['audios' => $audios, 'artist_name' => $artistName->artist_name, 'vidoes' => $videos]);
    }
}
