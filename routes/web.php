<?php

use App\Models\Message;
use App\Models\Service;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $services = Service::all();
    return view('index', compact('services'));
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    $services = Service::all();
    return view('service', compact('services'));
});
Route::post('/contact-save', function (Request $request) {
    message::create($request->all());
    return redirect()->back()->with('success', 'You have Successfully Registred');
});


Route::get('/admin/dashboard', function () {
    $countmessage = Message::count();
    $countservices = Service::count();
    return view('admin.dashboard', compact('countmessage', 'countservices'));
});

Route::get('/admin/service', function () {
    $countmessage = Message::count();
    $countservices = Service::count();
    $services = Service::all();
    return view('admin.service', compact('countservices', 'countmessage', 'services'));
});

Route::get('/admin/message', function () {
    $countmessage = Message::count();
    $countservices = Service::count();
    $services = Service::all();
    $messages = Message::all();
    return view('admin.message', compact('countservices', 'countmessage', 'messages'));
});
