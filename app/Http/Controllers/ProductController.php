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