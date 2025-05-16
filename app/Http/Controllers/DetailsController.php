<?php

namespace App\Http\Controllers;

use App\Models\Academique;
use App\Models\Agence;
use App\Models\Bailleur;
use App\Models\Entreprise;
use App\Models\Organization;
use App\Models\Publique;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function show($type, $id)
    {
        $model = match(strtolower($type)) {
            'organization' => Organization::findOrFail($id),
            'bailleur' => Bailleur::findOrFail($id),
            'agence' => Agence::findOrFail($id),
            'entreprise' => Entreprise::findOrFail($id),
            'publique' => Publique::findOrFail($id),
            'academique' => Academique::findOrFail($id),
            default => abort(404),
        };

        return view('maps.details', [
            'item' => $model,
            'type' => $type
        ]);
    }
}
