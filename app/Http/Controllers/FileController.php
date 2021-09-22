<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index($name)
    {
        // return "Welcome";
        return Storage::download($name . '.mp3', $name . '.mp3 ', ['Accept-Ranges' => 'bytes']);
    }
}
