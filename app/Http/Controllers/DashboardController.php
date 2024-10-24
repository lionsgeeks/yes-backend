<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $messages = Message::all()->sortByDesc("created_at");
        $latestmessages = Message::latest()->take(3)->get();
        $articles = Article::all()->sortByDesc("created_at");
        $latestarticles = Article::latest("created_at")->take(3)->get();
        return view("dashboard", compact(["messages","latestmessages","articles","latestarticles"]));
    }
}
