<?php

namespace App\Http\Controllers;

use App\Models\Maps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MapsController extends Controller
{
    public function index()
    {
        $maps = Maps::all();
        return view('maps.maps', ['property' => $maps]);
    }

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

    public function update(Request $request, Maps $map)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'url' => 'nullable|url',
            'people_working' => 'nullable|integer',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
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

        return back();
    }


    public function destroy(Maps $map)
    {
        $map->delete();
        return back();
    }
}
