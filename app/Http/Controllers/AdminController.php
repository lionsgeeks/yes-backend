<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view("admins.admin", compact("admins"));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        ]);
        $randomPassword = Str::random(10);;

        Mail::to($request->email)->send(new PasswordMail($randomPassword));
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
        ]);
        return back();
    }
}
