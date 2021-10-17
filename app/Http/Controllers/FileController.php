<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('fileHeader');
    // }
    public function index($name)
    {
        // return "Welcome";
        // return Storage::download($name, $name, ['Accept-Ranges' => 'bytes']);
        // $path = public_path('uploads/');
        // return response()->file($path . $name);
        // return Storage::get($name);
        // return Storage::response($path . $name, $name, []);
        // return Response
        $data = Storage::get($name);
        return response($data)
            ->header('Accept-Ranges', 'bytes')
            ->header('Content-Length', strlen($data))
            ->header('Content-Range', 'bytes')
            ->header('Content-Type', mime_content_type(public_path('uploads/' . $name)));
    }
}
