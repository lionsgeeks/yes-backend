<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationCodeController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string|size:6'
        ]);

        $code = VerificationCode::where('email', $request->email)
            ->where('code', trim($request->code))
            ->where('expires_at', '>', now())
            ->first();

        if (!$code) {
            return response()->json([
                'error' => 'Code invalide ou expiré',
                'debug' => [
                    'input' => $request->code,
                    'db_code' => VerificationCode::where('email', $request->email)->value('code')
                ]
            ], 422);
        }
        $code->delete();
        return response()->json(['success' => true]);
    }
}
