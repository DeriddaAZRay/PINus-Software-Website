<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Videos;
use App\Models\Article;
use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $videos = Videos::all(); 
        $articles = Article::published()->withActiveCategory()->latest()->take(3)->get();
        $galleries = Gallery::all();
        return view('home', compact('clients', 'videos', 'articles', 'galleries'));
    }
}

