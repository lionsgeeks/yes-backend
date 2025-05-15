<?php

// app/Http/Controllers/PublicInstitutionController.php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Publique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PubliqueController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_type' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'website' => 'nullable|url',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email',
            'phone_code' => 'required|string|max:10',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
            'youth_contact_name' => 'nullable|string|max:255',
            'youth_contact_position' => 'nullable|string|max:255',
            'youth_contact_email' => 'nullable|email',
            'policy_framework' => 'nullable|string',
            'strategic_priorities' => 'nullable|string',
            'annual_budget' => 'nullable|numeric',
            'flagship_program' => 'nullable|string',
            'target_audience' => 'nullable|string',
            'support_mechanisms' => 'nullable|string',
            'expected_result_1' => 'nullable|string',
            'expected_result_2' => 'nullable|string',
            'expected_result_3' => 'nullable|string',
            'execution_partners' => 'nullable|string',
            'coordination_mechanism' => 'nullable|string',
            'involved_actors' => 'nullable|string',
            'monitoring_approach' => 'nullable|string',
            'technical_assistance' => 'nullable|string',
            'best_practices' => 'nullable|string',
            'cooperation_opportunities' => 'nullable|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',

        ]);

        $data = $request->except(['logo']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $path = $file->store('logos', 'public');
            $data['logo'] = $path;
        }
    
        $institution = Publique::create($data);

        return response()->json([
            'message' => 'Institution created successfully',
            'data' => $institution
        ], 201);
    }
    public function destroy($id)
    {
        try {
            $item = Publique::findOrFail($id);
            
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