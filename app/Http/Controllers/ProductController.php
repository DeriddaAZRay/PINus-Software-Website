<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFeature;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('nUrut')->get();
        return view('products.index', compact('products'));
    }

    public function adminIndex()
    {
        $products = Product::orderBy('nUrut')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cKeterangan' => 'required|string',
            'cLogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'array'
        ]);

        $product = new Product();
        $product->cJudul = $request->cJudul;
        $product->cKeterangan = $request->cKeterangan;
        
        // Handle file upload
        if ($request->hasFile('cLogo')) {
            $image = $request->file('cLogo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->cLogo = 'images/products/' . $imageName;
        }
        
        $product->save();

        // Save features if provided
        if ($request->has('features')) {
            foreach ($request->features as $featureText) {
                ProductFeature::create([
                    'nID_Product' => $product->ID,
                    'cFitur' => $featureText
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cJudul' => 'required|string|max:255',
            'cKeterangan' => 'required|string',
            'cLogo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'array'
        ]);

        $product = Product::findOrFail($id);
        $product->cJudul = $request->cJudul;
        $product->cKeterangan = $request->cKeterangan;
        
        // Handle file upload if new image is provided
        if ($request->hasFile('cLogo')) {
            // Delete old image
            if (file_exists(public_path($product->cLogo))) {
                unlink(public_path($product->cLogo));
            }
            
            $image = $request->file('cLogo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->cLogo = 'images/products/' . $imageName;
        }
        
        $product->save();

        // Update features
        if ($request->has('features')) {
            // Delete existing features
            ProductFeature::where('nID_Product', $id)->delete();
            
            // Add new features
            foreach ($request->features as $featureText) {
                ProductFeature::create([
                    'nID_Product' => $id,
                    'cFitur' => $featureText
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete associated image
        if (file_exists(public_path($product->cLogo))) {
            unlink(public_path($product->cLogo));
        }
        
        // Delete associated features
        ProductFeature::where('nID_Product', $id)->delete();
        
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function show($id)
    {
        $product = Product::with('features')->findOrFail($id);
        return response()->json([
            'product' => $product,
            'features' => $product->features
        ]);
    }

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
                    'cLogo' => $product->cLogo,
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
}