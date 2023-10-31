<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public  function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect('/admin/messages')->with('You have successfully deleted a user\'s message');
    }
}
