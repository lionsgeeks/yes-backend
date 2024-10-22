<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MesageController extends Controller
{
    public function index()
    {
        $messages = Message::all()->sortByDesc("created_at");
        return view("messages.messages", compact("messages"));
    }
    public function update(Request $request, Message $message)
    {
        $message->update(['mark_as_read' => !$message->mark_as_read]);
        return back();
    }
    public function destroy(Message $message)
    {
        $message->delete();
        return back();
    }
}
