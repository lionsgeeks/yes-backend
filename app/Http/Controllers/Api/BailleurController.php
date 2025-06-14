<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\shows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BailleurController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo_path' => 'nullable|file|mimes:jpeg,png,jpg|max:5120',
            'type_institution' => 'required|string|in:Fondation privée,Agence de développement,Fonds d\'investissement,Autre',
            'pays_origine' => 'required',
            'site_web' => 'nullable|url',
            'twitter' => 'sometimes|boolean',
            'linkedin' => 'sometimes|boolean',
            'twitter_url2' => 'required_if:social_twitter,true|url|nullable',
            'linkedin_url2' => 'required_if:social_linkedin,true|url|nullable',
            'pays_origine.*' => 'string|max:255',
            'couverture_geographique' => 'required',
            'couverture_geographique.*' => 'string|max:255',
            'email_contact' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'priorites_thematiques' => 'required|string|max:500',

            // 'projets_phares' => 'required|array|min:1',
            // 'projets_phares.*' => 'string|max:500',
            // 'approche_impact' => 'required|string|max:1000',
            // 'partenaires_actuels' => 'required|string|max: // 'modalites_soutien' => 'required|array',
            // 'modalites_soutien.*' => 'string',
            // 'financement_min' => 'nullable|numeric',
            // 'financement_max' => 'nullable|numeric',
            // 'budget_annuel' => 'required|numeric|min:0',
            // 'criteres_eligibilite' => 'required|string|max:1000',1000',
            // 'procedure_soumission' => 'required|string|max:1000',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ]);
        $data = $request->except(['logo_path']);

        if ($request->hasFile('logo_path')) {
            $file = $request->file('logo_path');
            $path = $file->store('logos', 'public');
            $data['logo_path'] = $path;
        }

        $validated['contact_responsable'] = $request->contact_responsable;
        // $validated['representation_afrique'] = $request->representation_afrique;
        $socials = [
            'linkedin' => $request->linkedin_url2 ?? null,
            'twitter' => $request->twitter_url2 ?? null
        ];

        $data['reseaux_sociaux'] = json_encode($socials);
        $validated['user_id'] = auth()->id();


        $bailleur = Bailleur::create($data);

        return response()->json($bailleur, 201);
    }
    public function destroy($id)
    {
        try {
            $item = Bailleur::findOrFail($id);

            if ($item->logo) {
                Storage::delete('public/' . $item->logo);
            }

            $item->delete();
            shows::where('showable_id', $id)->first()->delete();


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
