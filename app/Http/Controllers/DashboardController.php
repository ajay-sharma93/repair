<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public  function index()
    {
        $messageCount = Message::count();
        return view('admin.dashboard', compact('messageCount'));
    }
}
