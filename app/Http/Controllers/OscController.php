<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Flasher\Prime\Storage\Storage;
use Illuminate\Http\Request;

class OscController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'creation_year' => 'required|integer|min:1900|max:' . date('Y'),
            'legal_status' => 'required|in:Association,Fondation,Coopérative,Autre',
            'other_legal_status' => 'required_if:legal_status,Autre|nullable|string|max:50',
            'country' => 'required|json',
            'regions' => 'required|json',
            'website' => 'nullable|url',
            'social_facebook' => 'sometimes|boolean',
            'social_twitter' => 'sometimes|boolean',
            'social_linkedin' => 'sometimes|boolean',
            'social_instagram' => 'sometimes|boolean',
            'facebook_url' => 'nullable|required_if:social_facebook,true|url|max:255',
            'twitter_url' => 'nullable|required_if:social_twitter,true|url|max:255',
            'linkedin_url' => 'nullable|required_if:social_linkedin,true|url|max:255',
            'instagram_url' => 'nullable|required_if:social_instagram,true|url|max:255',
            'main_email' => 'required|email|max:255',
            'phone' => 'required|string',
            'postal_address' => 'nullable',
            'contact_name' => 'required|string',
            'contact_function' => 'required|string',
            'contact_email' => 'required|email',
            'intervention_areas' => 'required|array',
            'intervention_areas.*' => 'in:Migration,Sport,Éducation,Santé,formation professionnelle,entrepreneuriat',
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
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $data['logo'] = Storage::url($path);
        }
        $data['country'] = json_decode($request->country, true);
        $data['regions'] = json_decode($request->regions, true);
        $data['intervention_areas'] = json_decode($request->intervention_areas, true);

        $socials = ['facebook', 'twitter', 'linkedin', 'instagram'];
        foreach ($socials as $social) {
            $data["social_$social"] = $request->has("social_$social");
            if ($data["social_$social"] && empty($data["{$social}_url"])) {
                return response()->json(["message" => "L'URL $social est requise"], 422);
            }
        }

        $data['user_id'] = auth()->id();

        $osc = Organization::create($data);

        return response()->json($osc, 201);
    }
}
