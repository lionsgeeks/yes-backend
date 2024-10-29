<?php

namespace App\Http\Controllers;

use App\Models\Formulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Formulaire::all();
        return view('formulaire.formulaire', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Formulaire $form)
    {
        return view('formulaire.partials.formulaire_show', compact('form'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulaire $formulaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulaire $formulaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulaire $form)
    {
        Storage::disk('public')->delete($form->presentation);
        Storage::disk('public')->delete($form->legal_statutes);
        Storage::disk('public')->delete($form->internal_regulations);
        Storage::disk('public')->delete($form->project_description);
        Storage::disk('public')->delete($form->funding_requirements);
        Storage::disk('public')->delete($form->project_evaluation);
        Storage::disk('public')->delete($form->other_projects);

        $form->delete();
        return back()->with('success', "The Form and it's Files were deleted Successfully!!");
    }
}
