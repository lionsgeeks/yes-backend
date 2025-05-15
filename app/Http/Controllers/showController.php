<?php

// app/Http/Controllers/ShowController.php
namespace App\Http\Controllers;

use App\Models\shows;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index()
    {
        $shows = shows::with('showable')->get();
        return view('maps.maps', compact('shows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_type' => 'required|in:Organization,Entreprise,Bailleur,Agence,Publique,Academique',
            'model_id' => 'required|integer'
        ]);

        $modelClass = "App\\Models\\" . $request->model_type;
        $model = $modelClass::findOrFail($request->model_id);

        $model->shows()->create([
            'pending' => true
        ]);

        return back()->with('success', 'Soumission enregistrée.');
    }

    public function approve(Request $request)
    {
        $model =$request->model_type;
        $form = $model::where('id', $request->model_id)->first();
        $form->shows()->create(['approve' => true, 'pending' => false]);
        return back()->with('success', 'Soumission approuvée');
    }
    
    public function getApprovedGrouped()
    {
        $approvedShows = Shows::where('approve', true)->with('showable')->get();
        $grouped = $approvedShows->groupBy(function ($item) {
            return class_basename($item->showable_type); 
        });
    
        return response()->json($grouped);
    }
    public function reject(Shows $show)
    {
        $show->update(['approve' => false, 'pending' => false]);
        return back()->with('success', 'Soumission rejetée');
    }
    
}
