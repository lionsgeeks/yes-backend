<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Selects;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('type')) {
            return Selects::where('type', $request->type)->get();
        }
        return Selects::all();
        return view('maps.maps');

    }


    /**
     * Store a newly created resource in storage.
     */
 
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string',
             'type' => 'required|in:category,type,option'
         ]);
 
         Selects::create([
             'name' => $request->name,
             'type' => $request->type,
         ]);
 
         return back();
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
