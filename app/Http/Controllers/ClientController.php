<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('ID', 'asc')->paginate(20);
        return view('admin.clients.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cKeterangan' => 'required|string|max:100',
            'cLogo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            'nUrut' => 'required|integer',
        ]);

        try {
            $client = new Client();
            $client->cKeterangan = $request->cKeterangan;
            $client->nUrut = $request->nUrut;
            $client->cUserID_Input = Auth::id(); // Assuming user authentication
            $client->dTgl_Input = now();

            // Handle image upload
            if ($request->hasFile('cLogo')) {
                $image = $request->file('cLogo');
                $imageData = file_get_contents($image->getRealPath());
                $client->cLogo = $imageData;
            }

            $client->save();

            return redirect()->route('admin.clients.index')
                           ->with('success', 'Client created successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                           ->with('error', 'Error creating client: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cKeterangan' => 'required|string|max:255',
            'nUrut' => 'required|integer',
            'cLogo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle logo upload - keep existing image by default
        
        try{
            $client = Client::findOrFail($id);
            $imageData = $client->cLogo; // Keep existing image by default
            if ($request->hasFile('cLogo')) {
                $file = $request->file('cLogo');
                
                // Validate the file is actually an image
                if ($file->isValid()) {
                    // Read the file content as binary data
                    $imageData = file_get_contents($file->getRealPath());
                }
            }

            // Update using fill() method (same as ProductController)
            $client->cKeterangan = $request->cKeterangan;
            $client->nUrut = $request->nUrut;
            $client->cUserID_Edit = Auth::id();
            $client->dTgl_Edit = now();
            if ($request->hasFile('cLogo') && $request->file('cLogo')->isValid()) {
                $client->cLogo = file_get_contents($request->file('cLogo')->getRealPath());
            }
            $client->save();

            return redirect()->route('admin.clients.index')
                        ->with('success', 'Client updated successfully!');

        } catch (\Exception $e) {
                    return redirect()->back()->withInput()
                                ->with('error', 'Error updating client: ' . $e->getMessage());
                }
        }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index')
                    ->with('success', 'Client deleted successfully!');
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.show', ['client' => $client]);
    }
}
