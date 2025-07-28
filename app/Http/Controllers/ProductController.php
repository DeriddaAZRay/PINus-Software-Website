<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::with('features')->orderBy('nUrut', 'asc')->get();
        return view('products.index', compact('products')); // Changed view path to products.index for public view
    }
    
    public function adminIndex()
    {
        $products = Product::with('features')->orderBy('nUrut', 'asc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'nUrut' => 'required|integer|min:1',
            'cKeterangan' => 'nullable|string',
            'cLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
        ]);

        // Handle logo upload - store as LONGBLOB
        $logoData = null;
        if ($request->hasFile('cLogo')) {
            $file = $request->file('cLogo');
            
            // Validate the file is actually an image
            if ($file->isValid()) {
                // Read the file content as binary data
                $logoData = file_get_contents($file->getRealPath());
                
                // Optional: You can also store additional metadata
                // $mimeType = $file->getMimeType();
                // $originalName = $file->getClientOriginalName();
            }
        }

        // Create the product
        $product = Product::create([
            'cJudul' => $request->cJudul,
            'nUrut' => $request->nUrut,
            'cKeterangan' => $request->cKeterangan,
            'cLogo' => $logoData, // Store binary data directly
            'cUserID_Input' => Auth::id(),
            'dTgl_Input' => Carbon::now(),
        ]);

        // Handle features
        if ($request->has('features')) {
            foreach (array_filter($request->features) as $feature) {
                if (!empty(trim($feature))) {
                    ProductFeature::create([
                        'nID_Product' => $product->ID,
                        'cFitur' => trim($feature),
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load('features');
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $product = Product::with('features')->findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'cJudul' => 'required|string|max:255',
            'nUrut' => 'required|integer|min:1',
            'cKeterangan' => 'nullable|string',
            'cLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
        ]);

        // Handle logo upload
        $logoData = $product->cLogo; // Keep existing logo by default
        if ($request->hasFile('cLogo')) {
            $file = $request->file('cLogo');
            
            // Validate the file is actually an image
            if ($file->isValid()) {
                // Read the file content as binary data
                $logoData = file_get_contents($file->getRealPath());
            }
        }

        // Update the product
        $product->fill([
            'cJudul' => $request->cJudul,
            'nUrut' => $request->nUrut,
            'cKeterangan' => $request->cKeterangan,
            'cLogo' => $logoData, // Store binary data directly
            'cUserID_Edit' => Auth::id(),
            'dTgl_Edit' => Carbon::now()
        ])->save();

        // Update features - delete existing ones and create new ones
        ProductFeature::where('nID_Product', $product->ID)->delete();
        
        if ($request->has('features')) {
            foreach (array_filter($request->features) as $feature) {
                if (!empty(trim($feature))) {
                    ProductFeature::create([
                        'nID_Product' => $product->ID,
                        'cFitur' => trim($feature),
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete related features
        ProductFeature::where('nID_Product', $product->ID)->delete();

        // Delete the product (logo data will be deleted automatically)
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    /**
     * Get product features via AJAX
     */
    public function getFeatures($id)
    {
        try {
            $product = Product::findOrFail($id);
            $features = ProductFeature::where('nID_Product', $id)->get();
            
            return response()->json([
                'success' => true,
                'product' => [
                    'ID' => $product->ID,
                    'cJudul' => $product->cJudul,
                    'cKeterangan' => $product->cKeterangan,
                    'cLogo' => $product->cLogo ? 'data:image/jpeg;base64,' . base64_encode($product->cLogo) : null,
                    'nUrut' => $product->nUrut,
                ],
                'features' => $features->map(function($feature) {
                    return [
                        'ID' => $feature->ID,
                        'cFitur' => $feature->cFitur,
                        'nID_Product' => $feature->nID_Product
                    ];
                })
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'product' => null,
                'features' => []
            ], 500);
        }
    }

    /**
     * Serve the product logo image
     */
    public function getLogo($id)
    {
        try {
            $product = Product::findOrFail($id);
            
            if (!$product->cLogo) {
                abort(404, 'Logo not found');
            }

            // You might want to store MIME type in database for better handling
            // For now, we'll detect it or default to jpeg
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($product->cLogo);
            
            // Fallback to jpeg if detection fails
            if (!$mimeType || !str_starts_with($mimeType, 'image/')) {
                $mimeType = 'image/jpeg';
            }

            return response($product->cLogo)
                ->header('Content-Type', $mimeType)
                ->header('Cache-Control', 'public, max-age=3600'); // Cache for 1 hour
        } catch (\Exception $e) {
            abort(404, 'Logo not found');
        }
    }
}