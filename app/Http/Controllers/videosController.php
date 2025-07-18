<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Videos::all();
        return view('home', compact('videos'));
    }
}

