<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OscController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'creation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'legal_status' => 'required|in:Association,Fondation,Coopérative,Autre',
            'other_legal_status' => 'required_if:legal_status,Autre|nullable|string|max:50',
            'country' => 'required|array',
            'regions' => 'required|array',
            'website' => 'nullable|url',
            'social_facebook' => 'sometimes|boolean',
            'social_twitter' => 'sometimes|boolean',
            'social_linkedin' => 'sometimes|boolean',
            'social_instagram' => 'sometimes|boolean',
            'facebook_url' => 'required_if:social_facebook,true|url|nullable',
            'twitter_url' => 'required_if:social_twitter,true|url|nullable',
            'linkedin_url' => 'required_if:social_linkedin,true|url|nullable',
            'instagram_url' => 'required_if:social_instagram,true|url|nullable',
            'main_email' => 'required|email|max:255',
            'phone' => 'required|string',
            'postal_address' => 'nullable|string',
            'contact_name' => 'required|string',
            'contact_function' => 'required|string',
            'contact_email' => 'required|email',
            'intervention_areas' => 'required|array',
            'intervention_areas.*' => 'string',
            'target_groups' => 'required|string',
            'annual_beneficiaries' => 'nullable|integer|min:0',
            'program_title' => 'nullable|string',
            'program_description' => 'nullable|string|max:500',
            'methodological_approach' => 'nullable|string|max:250',
            'result1' => 'nullable|string',
            'result2' => 'nullable|string',
            'result3' => 'nullable|string',
            'technical_partners' => 'nullable|string',
            'financial_partners' => 'nullable|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ]);
        $data = $validated;
        $data['country'] = json_encode($validated['country']);
        $data['regions'] = json_encode($validated['regions']);
        $data['intervention_areas'] = implode(',', $validated['intervention_areas']);
        $file = $request->file('logo');
        if ($file) {
            $path = $file->store('logos', 'public');
            $data['logo'] = $path;
        }

        $socials = ['facebook', 'twitter', 'linkedin', 'instagram'];
        foreach ($socials as $platform) {
            if ($request->input("social_$platform") && !$request->input("{$platform}_url")) {
                return response()->json(["message" => "L'URL $platform est requise"], 422);
            }
        }

        $data['user_id'] = auth()->id();

        $osc = Organization::create($data);

        return response()->json($osc, 201);
    }

    public function destroy($id)
    {
        try {
            $item = Organization::findOrFail($id);

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
