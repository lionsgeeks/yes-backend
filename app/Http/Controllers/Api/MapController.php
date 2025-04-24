<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Maps::query();
        
        if ($request->has('approved')) {
            $query->where('is_approved', true);
        }
    
        return response()->json([
            'data' => $query->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'url' => 'required|url',
             'people_working' => 'required|integer',
             'email' => 'required|email',
             'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
             'lat' => 'required|numeric',
             'lng' => 'required|numeric',
             'category' => 'nullable|string',
             'type' => 'nullable|string',
             'option' => 'nullable|string',
 
         ]);
     
         $path = $request->file('logo')->store('logos', 'public'); 
         $publicPath = Storage::url($path); 
         
         $map = Maps::create([
             'name' => $validated['name'],
             'description' => $validated['description'],
             'url' => $validated['url'],
             'people_working' => $validated['people_working'],
             'email' => $validated['email'],
             'logo' => $publicPath,
             'lat' => $validated['lat'],
             'lng' => $validated['lng'],
             'category' =>  $validated['category'],
             'type' =>  $validated['type'],
             'option' =>  $validated['option'],
 
 
         ]);
     
         return response()->json([
             'success' => true,
             'map' => $map
         ]);
     }

     public function approve(Maps $map)
     {
         $map->update(['is_approved' => true]);
         return back()->with('success', 'Map approved!');
     }
     
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maps $map)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url',
            'people_working' => 'required|integer',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'category' => 'nullable|string',
            'type' => 'nullable|string',
            'option' => 'nullable|string',

        ]);

        if ($request->hasFile('logo')) {
            if ($map->logo) {
                $oldLogoPath = str_replace('/storage/', '', $map->logo);
                Storage::disk('public')->delete($oldLogoPath);
            }
    
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = Storage::url($path);
        }
    
        $map->update($validated);
    
        return response()->json([
            'success' => true,
            'map' => $map
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
