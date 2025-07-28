<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Videos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $videos = Videos::all(); 
        $articles = \App\Models\Article::published()->withActiveCategory()->latest()->take(3)->get();
        return view('home', compact('clients', 'videos', 'articles'));
    }
}

