<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Academique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcademiqueController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'logo_path' => 'nullable|file|mimes:png,jpg,jpeg|max:5120',
            'type_institution' => 'required|string|max:255',
            'pays' => 'required|string|max:255',
            'site_web' => 'nullable|url',
            'departement' => 'nullable|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'contact_nom' => 'nullable|string|max:255',
            'contact_fonction' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email',
            'axes_recherche' => 'nullable|string',
            'methodologies' => 'nullable|string',
            'zones_geographiques' => 'nullable|array',
            'programmes_formation' => 'nullable|string',
            'public_cible' => 'nullable|array',
            'modalites' => 'nullable|array',
            'certifications' => 'nullable|string',
            'partenaires_recherche' => 'nullable|string',
            'ressources_disponibles' => 'nullable|array',
            'expertise' => 'nullable|string',
            'opportunites_collaboration' => 'nullable|string',
            'conferences' => 'nullable|string',
            'ateliers' => 'nullable|string',
            'publications'=>'nullable',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $data = $request->except(['logo', 'publications']);
        $file = $request->file('logo_path');
        if ($file) {
            $path = $file->store('logos', 'public');
            $data['logo_path'] = $path;
        }

        if ($request->hasFile('publications')) {
            $publicationsPaths = [];
            foreach ($request->file('publications') as $file) {
                $path = $file->store('public/institutions/publications');
                $publicationsPaths[] = Storage::url($path);
            }
            $data['publications'] = json_encode($publicationsPaths);
        }

        $arrayFields = ['zones_geographiques', 'public_cible', 'modalites', 'ressources_disponibles'];
        foreach ($arrayFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = json_encode($data[$field]);
            }
        }

        $academique = Academique::create($data);
        
        return response()->json($academique, 201);
    }
    public function destroy($id)
    {
        try {
            $item = Academique::findOrFail($id);
            
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
