<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class VideoController extends Controller
{
    /**
     * Display a listing of the videos.
     */
    public function index()
    {
        $videos = Videos::orderBy('id', 'asc')->paginate(10);
        
        return view('admin.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new video.
     */
    public function create()
    {
        return view('admin.videos.create');
    }

    /**
     * Store a newly created video in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cJudul' => 'required|string|max:255',
            'cLink' => 'required|string|max:255',
            'cDeskripsi' => 'nullable|string',
            'cJenis' => 'required|in:v,t',
        ], [
            'cJudul.required' => 'Video title is required.',
            'cJudul.max' => 'Video title must not exceed 255 characters.',
            'cLink.required' => 'YouTube Video ID is required.',
            'cLink.max' => 'YouTube Video ID must not exceed 255 characters.',
            'cJenis.required' => 'Video type is required.',
            'cJenis.in' => 'Video type must be either video (v) or testimonial (t).',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $video = new videos();
            $video->cJudul = $request->cJudul;
            $video->cLink = $request->cLink;
            $video->cDeskripsi = $request->cDeskripsi;
            $video->cJenis = $request->cJenis;
            $video->dTgl_Input = now();
            $video->cUserID_Input = Auth::id(); // Assuming user authentication
            $video->save();

            return redirect()->route('admin.videos.index')
                ->with('success', 'Video has been added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to add video. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified video.
     */
    public function show($id)
    {
        $video = videos::findOrFail($id);
        
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified video.
     */
    public function edit($id)
    {
        $video = videos::findOrFail($id);
        
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified video in storage.
     */
    public function update(Request $request, $id)
    {
        $video = videos::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'cJudul' => 'required|string|max:255',
            'cLink' => 'required|string|max:255',
            'cDeskripsi' => 'nullable|string',
            'cJenis' => 'required|in:v,t',
        ], [
            'cJudul.required' => 'Video title is required.',
            'cJudul.max' => 'Video title must not exceed 255 characters.',
            'cLink.required' => 'YouTube Video ID is required.',
            'cLink.max' => 'YouTube Video ID must not exceed 255 characters.',
            'cJenis.required' => 'Video type is required.',
            'cJenis.in' => 'Video type must be either video (v) or testimonial (t).',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $video->cJudul = $request->cJudul;
            $video->cLink = $request->cLink;
            $video->cDeskripsi = $request->cDeskripsi;
            $video->cJenis = $request->cJenis;
            $video->dTgl_Edit = now();
            $video->cUserID_Edit = Auth::id(); // Assuming user authentication
            $video->save();

            return redirect()->route('admin.videos.index')
                ->with('success', 'Video has been updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update video. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified video from storage.
     */
    public function destroy($id)
    {
        try {
            $video = videos::findOrFail($id);
            $videoTitle = $video->cJudul;
            $video->delete();

            return redirect()->route('admin.videos.index')
                ->with('success', "Video '{$videoTitle}' has been deleted successfully!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete video. Please try again.');
        }
    }

    /**
     * Get videos by type for API or AJAX calls
     */
    public function getVideosByType($type = 'v')
    {
        $videos = videos::where('cJenis', $type)
            ->orderBy('dTgl_Input', 'desc')
            ->get();

        return response()->json($videos);
    }

    /**
     * Toggle video type between video and testimonial
     */
    public function toggleType($id)
    {
        try {
            $video = videos::findOrFail($id);
            $video->cJenis = $video->cJenis === 'v' ? 't' : 'v';
            $video->dTgl_Edit = now();
            $video->cUserID_Edit = Auth::id(); // Assuming user authentication
            $video->save();

            $newType = $video->cJenis === 'v' ? 'Video' : 'Testimonial';
            
            return redirect()->back()
                ->with('success', "Video type changed to {$newType} successfully!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to change video type. Please try again.');
        }
    }

    /**
     * Bulk delete videos
     */
    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_ids' => 'required|array',
            'video_ids.*' => 'exists:tb_videos,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Invalid video selection.');
        }

        try {
            $deletedCount = videos::whereIn('id', $request->video_ids)->delete();
            
            return redirect()->route('admin.videos.index')
                ->with('success', "{$deletedCount} video(s) have been deleted successfully!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete videos. Please try again.');
        }
    }
}