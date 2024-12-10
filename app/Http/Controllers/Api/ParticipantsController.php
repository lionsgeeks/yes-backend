<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    public function store(Request $request) {

        request()->validate([
            "civility" => "required",
            "name" => "required",
            "organisation" => "required",
            "category" => "required",
            "position" => "required",
            "mail" => "required",
            "phone" => "required",
            "country" => "required"
        ]);

        Participant::create([
            "name" => $request->name,
            "civility" => $request->civility,
            "organisation" => $request->organisation,
            "category" => $request->category,
            "position" => $request->position,
            "mail" => $request->mail,
            "phone" => $request->phone,
            "country" => $request->country == "other" ? $request->otherCount : $request->country,
        ]);

        return response()->json("success");
    }
}
