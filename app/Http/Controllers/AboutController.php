<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class AboutController extends Controller
{
    private function setNoCacheHeaders($response)
    {
        // Add additional headers to prevent image caching
        return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0, private')
                       ->header('Pragma', 'no-cache')
                       ->header('Expires', 'Sun, 02 Jan 1990 00:00:00 GMT')
                       ->header('X-Accel-Expires', '0')
                       ->header('Last-Modified', gmdate('D, d M Y H:i:s') . ' GMT');
    }

    private function addImageNoCacheHeaders()
    {
        // Add headers to prevent caching of images in public/images/about
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
        header('Expires: Sun, 02 Jan 1990 00:00:00 GMT');
    }

    public function __construct()
    {
        // Add no-cache headers for images on every request
        $this->addImageNoCacheHeaders();
    }

    public function introduction()
    {
        $response = response()->view('about.introduction');
        return $this->setNoCacheHeaders($response);
    }

    public function legality()
    {
        $response = response()->view('about.legality');
        return $this->setNoCacheHeaders($response);
    }

    public function history()
    {
        $response = response()->view('about.history');
        return $this->setNoCacheHeaders($response);
    }

    public function visiMisi()
    {
        $response = response()->view('about.visimisi');
        return $this->setNoCacheHeaders($response);
    }

    public function productlogoPhilosophy()
    {
        $response = response()->view('about.productlogoPhilosophy');
        return $this->setNoCacheHeaders($response);
    }

    public function companylogoPhilosophy()
    {
        $response = response()->view('about.companylogoPhilosophy');
        return $this->setNoCacheHeaders($response);
    }

    public function logoTransition()
    {
        $response = response()->view('about.logoTransition');
        return $this->setNoCacheHeaders($response);
    }
}
