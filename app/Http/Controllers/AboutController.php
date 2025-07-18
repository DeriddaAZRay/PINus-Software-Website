<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function introduction()
    {
        return view('about.introduction');
    }

    public function legality()
    {
        return view('about.legality');
    }

    public function history()
    {
        return view('about.history');
    }

    public function visiMisi()
    {
        return view('about.visimisi');
    }
}
