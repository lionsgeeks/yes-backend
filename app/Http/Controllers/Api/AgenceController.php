<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\shows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgenceController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo' => 'nullable|file|mimes:png,jpg,jpeg|max:5120',
            'site_web' => 'required|url',
            'bureaux_afrique' => 'required|string',
            'priorites_thematiques' => 'required|string',
            'opportunites_financement' => 'required|string',
            'domaines_expertise' => 'required|string',
            'type_organisation' => 'required|string',
            'mecanismes_collaboration' => 'required|string',
            'pays_representes' => 'required',
            'pays_representes.*' => 'string',
            'couverture_afrique' => 'required',
            'email_institutionnel' => 'required|email|max:255',
            'cadre_strategique' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'contact_jeunesse' => 'nullable|array',
            'contact_jeunesse.nom' => 'nullable|string|max:255',
            'contact_jeunesse.fonction' => 'nullable|string|max:255',
            'contact_jeunesse.email' => 'nullable|email|max:255',
            'budget' => 'nullable|numeric',
            'annee_debut' => 'nullable|integer|min:2000',
            'annee_fin' => 'nullable|integer|gte:annee_debut',
            'programmes_phares' => 'nullable|array',
            'outils_methodologiques' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'type_partenaires' => 'nullable',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ]);
        $data = $request->except(['logo']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('logos', 'public');
            $data['logo'] = $path;
        }

        $agence = Agence::create($data);


        if ($request->hasFile('cadre_strategique')) {
            $validated['cadre_strategique'] = $request->file('cadre_strategique')->store('agences/cadres', 'public');
        }
        if ($request->hasFile('outils_methodologiques')) {
            $validated['outils_methodologiques'] = $request->file('outils_methodologiques')->store('agences/cadres', 'public');
        }

        $data = $validated;
        $data['pays_representes'] = json_encode($validated['pays_representes']);
        $data['couverture_afrique'] = json_encode($validated['couverture_afrique']);
        $data['contact_jeunesse'] = json_encode($validated['contact_jeunesse']);
        $data['programmes_phares'] = json_encode($validated['programmes_phares']);
        // $agence = Agence::create($validated);
        $validated['user_id'] = auth()->id();

        return back();
    }
    public function destroy($id)
    {
        try {
            $item = Agence::findOrFail($id);

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
