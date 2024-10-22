<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            "fullname" => "required",
            "email" => "required",
            "phone" => "required",
            "message" => "required"
        ]);
        // dd($request);
        Message::create([
            "fullname" => $request->fullname,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
        ]);
        return response()->json([
            "message" => "Message sent succefully"
        ]);
    }
}
