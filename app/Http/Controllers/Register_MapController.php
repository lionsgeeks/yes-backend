<?php

namespace App\Http\Controllers;

use App\Models\Register_Map;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class Register_MapController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|',
            'role'  => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric'
        ]);

        Register_Map::create($request->only('name', 'email', 'role', 'lat', 'lng'));

        $code = str_pad(random_int(10000, 999999), 6, '0');
        VerificationCode::create([
            'email' => $request->email,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($request->email)->send(new \App\Mail\SendVerificationCode($code));

        return back();
    }



    //     public function verify(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'code' => 'required|string|min:6|max:6'
    //     ]);

    //     $verification = VerificationCode::where('email', $request->email)
    //         ->where('code', $request->code)
    //         ->where('expires_at', '>', now())
    //         ->first();

    //     if (!$verification) {
    //         return response()->json([
    //             'error' => 'Code invalide ou expiré',
    //             'debug' => [
    //                 'input_code' => $request->code,
    //                 'db_code' => VerificationCode::where('email', $request->email)->value('code'),
    //                 'expiry' => VerificationCode::where('email', $request->email)->value('expires_at'),
    //                 'current_time' => now()
    //             ]
    //         ], 422);
    //     }

    //     $verification->delete();
    //     return response()->json(['success' => true]);
    // }
}
