<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Client;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('lVoid', 1)->get();
        $clients = Client::all();
        return view('testimonials.index', compact('testimonials', 'clients'));
    }

    public function create()
    {
        $clients = \App\Models\Client::all();
        return view('testimonials.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cNmLengkap' => 'required|string|max:255',
            'cEmail' => 'required|email|max:255',
            'cNmPerusahaan' => 'required|string|max:255',
            'cPosisi' => 'nullable|string|max:255',
            'cHeadline' => 'nullable|string|max:255',
            'cTestimonial' => 'required|string',
            'nID_Client' => 'nullable|integer', // <-- add this line
        ]);
        $validated['lVoid'] = 0;
        $validated['dTgl_Input'] = now();
        Testimonial::create($validated);
        return redirect()->route('testimonials.store')->with('success', 'Testimonial submitted!');
    }
}
