<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Videos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            $videos = Videos::all();
            
            return view('gallery.index', compact('galleries', 'videos'));
        } catch (\Exception $e) {
            // Handle any database errors
            return view('gallery.index', [
                'galleries' => collect(),
                'videos' => collect()
            ]);
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
                ->header('Cache-Control', 'public, max-age=3600');
                
        } catch (\Exception $e) {
            abort(404);
        }
    }
}