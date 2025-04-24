<?php

namespace App\Http\Controllers;

use App\Exports\FormulairesExport;
use App\Models\Formulaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        $formIds = array_map('intval', explode(',', $request->form_ids[0]));
        $forms = Formulaire::whereIn('id', $formIds)->get(['email_representative', 'name_organization', 'id']);
        $formData = Http::post('https://management.youthempowermentsummit.africa/api/selected-ngo', [
            'forms' => $forms
        ]);

        Formulaire::whereIn('id', $formIds)->update(['is_invited' => true]);

        return back()->with('success', "Emails has been sent to the selected Ngos");

    }

    public function invite(Formulaire $form){

        //get email
        $response = Http::post('https://learning.youthempowermentsummit.africa/api/receive-data', [
            'email' => $form->email_representative,
            'name' => $form->name_organization
        ]);

        $form->update([
            'is_invited' => true
        ]);

        return back()->with('success', "Ngo has been invited to yes learning successfully!!!");
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
        $files = [
            $form->presentation,
            $form->legal_statutes,
            $form->internal_regulations,
            $form->project_description,
            $form->funding_requirements,
            $form->project_evaluation,
            $form->other_projects
        ];

        foreach ($files as $file) {
            if ($file) {
                Storage::disk('public')->delete($file);
            }
        }

        $form->delete();
        return back()->with('success', "The Form and it's Files were deleted Successfully!!");
    }




    public function export()
    {
        return Excel::download(new FormulairesExport, 'form.xlsx');
    }
}
