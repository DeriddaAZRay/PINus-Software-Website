<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\Videos;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('lVoid', 1)->get();
        $clients = Client::all();
        $testimonialVideos = Videos::where('cJenis', 't')->get();
        return view('testimonials.index', compact('testimonials', 'clients', 'testimonialVideos'));
    }

    public function adminIndex()
    {
        $testimonials = Testimonial::orderBy('lVoid', 'asc')->paginate(10);
        return view('admin.testimonials.index', ['testimonials' => $testimonials]);
    }

    public function show($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.show', ['testimonial' => $testimonial]);
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

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update([
            'lVoid' => $request->lVoid
        ]);
        return back()->with('success', 'Testimonial status updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted.');
    }

    public function toggleStatus(Request $request, $id)
{
    try {
        $testimonial = Testimonial::findOrFail($id);
        
        $validated = $request->validate([
            'lVoid' => 'required|in:0,1'
        ]);
        
        $testimonial->update([
            'lVoid' => $validated['lVoid']
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Testimonial status updated successfully.',
            'new_status' => $validated['lVoid']
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to update testimonial status.'
        ], 500);
    }
}
}
