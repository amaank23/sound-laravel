<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class PlaylistController extends Controller
{
    public function index()
    {
        return Playlist::all();
    }
    public function store(Request $request)
    {
        $playlist = new Playlist();
        $playlist->name = $request->name;
        $playlist->user_id = session('user_id');;
        $playlist->save();
        return $request;
    }
}
