<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ParticipantsController extends Controller
{
    public function store(Request $request)
    {

        request()->validate([
            "civility" => "required",
            "name" => "required",
            "organisation" => "required",
            "category" => "required",
            "position" => "required",
            "mail" => "required",
            "phone" => "required",
            "country" => "required",
            "logo" => "required",
        ]);

        // create and store the file in the uploads folder
        $logo = $request->file('logo')->store('uploads', 'public');

        Participant::create([
            "name" => $request->name,
            "civility" => $request->civility,
            "organisation" => $request->organisation,
            "category" => $request->category,
            "position" => $request->position,
            "mail" => $request->mail,
            "phone" => $request->phone,
            "country" => $request->country == "other" ? $request->otherCount : $request->country,
            "logo" => $logo
        ]);

        return response()->json("success");
    }

    public function inviteToApp(Participant $participant)
    {
        // TODO: change Url 
        $response = Http::post('https://app.youthempowermentsummit.africa/api/register/participant', [
            "name" => $participant->name,
            "company" => $participant->organisation,
            "email" => $participant->mail,
            "country" => $participant->country,
            'role' => 'visitor',
        ]);
        // dd($participant);
        if ($response->successful()) {
            $participant->update([
                'invitedToApp' => true
            ]);
            return back()->with("success", "Invitation sent successfully");
        } else {
            return back()->with("error", "Failed to send invitation");
        }
    }
}
