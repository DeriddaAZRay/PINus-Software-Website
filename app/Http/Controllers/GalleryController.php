<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery for users.
     */
    public function index()
    {
        try {
            // Get all gallery items ordered by input date (newest first)
            $galleries = Gallery::orderBy('dTgl_Input', 'desc')->get();
            $videos = Videos::where('cJenis', 'v')->get();
            $testimonialVideos = Videos::where('cJenis', 't')->get();
            
            return view('gallery.index', compact('galleries', 'videos', 'testimonialVideos'));
        } catch (\Exception $e) {
            // Handle any database errors
            return view('gallery.index', [
                'galleries' => collect(),
                'videos' => collect(),
                'testimonialVideos' => collect()
            ]);
        }
    }

    /**
     * Display a listing of galleries for admin
     */
    public function adminIndex()
    {
    $galleries = Gallery::orderBy('ID', 'asc')
                    ->paginate(15);

    return view('admin.gallery.index', ['galleries' => $galleries]);
    }

    /**
     * Show the form for creating a new gallery item
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created gallery item
     */
    public function store(Request $request)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cFoto' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
        ]);

        try {
            $gallery = new Gallery();
            $gallery->cJudul = $request->cJudul;
            $gallery->cUserID_Input = Auth::id(); // Assuming user authentication
            $gallery->dTgl_Input = now();

            // Handle image upload
            if ($request->hasFile('cFoto')) {
                $image = $request->file('cFoto');
                $imageData = file_get_contents($image->getRealPath());
                $gallery->cFoto = $imageData;
            }

            $gallery->save();

            return redirect()->route('admin.gallery.index')
                           ->with('success', 'Gallery item created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                           ->with('error', 'Error creating gallery item: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing a gallery item
     */
    public function edit($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('admin.gallery.edit', compact('gallery'));
        } catch (\Exception $e) {
            return redirect()->route('admin.gallery.index')
                           ->with('error', 'Gallery item not found.');
        }
    }

    /**
     * Update the specified gallery item
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cFoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        try {
            $gallery = Gallery::findOrFail($id);

            // Handle logo upload - keep existing image by default
            $imageData = $gallery->cFoto; // Keep existing image by default
            if ($request->hasFile('cFoto')) {
                $file = $request->file('cFoto');
                
                // Validate the file is actually an image
                if ($file->isValid()) {
                    // Read the file content as binary data
                    $imageData = file_get_contents($file->getRealPath());
                }
            }

            // Update using fill() method (same as ProductController)
            $gallery->cJudul = $request->cJudul;
            $gallery->cUserID_Edit = Auth::id();
            $gallery->dTgl_Edit = now();
            if ($request->hasFile('cFoto') && $request->file('cFoto')->isValid()) {
                $gallery->cFoto = file_get_contents($request->file('cFoto')->getRealPath());
            }
            $gallery->save();

            return redirect()->route('admin.gallery.index')
                        ->with('success', 'Gallery item updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                        ->with('error', 'Error updating gallery item: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified gallery item
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            $gallery->delete();

            return redirect()->route('admin.gallery.index')
                           ->with('success', 'Gallery item deleted successfully!');

        } catch (\Exception $e) {
            return redirect()->route('admin.gallery.index')
                           ->with('error', 'Error deleting gallery item: ' . $e->getMessage());
        }
    }

    /**
     * Serve image from database
     */
    public function getImage($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            if (!$gallery->cFoto) {
                abort(404);
            }

            // Get the image data - it's already binary from LONGBLOB
            $imageData = $gallery->cFoto;
            
            // Simple approach - assume JPEG if we can't detect
            $mimeType = 'image/jpeg';
            
            // Try to detect image type from the first few bytes
            $header = substr($imageData, 0, 10);
            if (strpos($header, "\xFF\xD8\xFF") === 0) {
                $mimeType = 'image/jpeg';
            } elseif (strpos($header, "\x89PNG") === 0) {
                $mimeType = 'image/png';
            } elseif (strpos($header, "GIF") === 0) {
                $mimeType = 'image/gif';
            }

            return response($imageData)
                ->header('Content-Type', $mimeType)
                ->header('Content-Length', strlen($imageData))
                ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
                ->header('Pragma', 'no-cache')
                ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT');
                
        } catch (\Exception $e) {
            abort(404);
        }
    }
}