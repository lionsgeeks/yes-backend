<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrepriseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'secteur' => 'required|string|max:255',
            'taille' => 'required|string|max:255',
            'pays_siege' => 'required|string|max:255',
            'regions_afrique' => 'nullable',
            'site_web' => 'nullable|url|max:255',
            'twitter' => 'boolean',
            'linkedin' => 'boolean',
            'twitter_url' => 'nullable|url|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'email_contact' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'contact_rse' => 'nullable|array',
            'contact_rse.nom' => 'nullable|string|max:255',
            'contact_rse.fonction' => 'nullable|string|max:255',
            'contact_rse.email' => 'nullable|email|max:255',
            'politique_inclusion' => 'nullable|string',
            'programmes_integration' => 'nullable|string',
            'postes_stages_annuels' => 'nullable|integer|min:0',
            'dispositifs_formation' => 'nullable|string',
            'partenariats_osc' => 'nullable|string',
            'initiatives_mecenat' => 'nullable|string',
            'competences_pro_bono' => 'nullable',
            'profils_recherches' => 'nullable|string',
            'regions_recrutement' => 'nullable',
            'processus_integration' => 'nullable|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ]);

        $data = $request->except(['logo']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('logos', 'public');
            $data['logo'] = $path;
        }
    

        $entreprise = Entreprise::create($data);
        $validated['user_id'] = auth()->id();


        return response()->json([
            'message' => 'Entreprise créée avec succès',
            'data' => $entreprise
        ], 201);
    }
    public function destroy($id)
    {
        try {
            $item = Entreprise::findOrFail($id);
            
            if ($item->logo) {
                Storage::delete('public/' . $item->logo);
            }
            
            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Élément supprimé avec succès'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la suppression: ' . $e->getMessage()
            ], 500);
        }
    }
}
