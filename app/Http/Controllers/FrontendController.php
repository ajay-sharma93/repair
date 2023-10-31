<?php

namespace App\Http\Controllers;

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
}
