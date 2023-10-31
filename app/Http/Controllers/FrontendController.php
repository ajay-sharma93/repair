<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class FrontendController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('index', compact('services'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public  function saveContact(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);



        Message::create($request->all());
        return redirect()->back()->with('success', 'Your Message has been recorded');
    }
}
