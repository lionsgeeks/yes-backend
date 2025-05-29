<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Register_Map;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterMapController extends Controller
{
    public function store(Request $request)
    {
        
        $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email|',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric'
        ]);

        Register_Map::create($request->only('name', 'email', 'lat', 'lng'));

        $code = str_pad(random_int(10000, 999999), 6, '0');
        VerificationCode::create([
            'email' => $request->email,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($request->email)->send(new \App\Mail\SendVerificationCode($code));

        return response()->json([
            "status"=>200
        ]);
    }
}
