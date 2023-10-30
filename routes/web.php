<?php

use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\Message;
use App\Models\Testimonial;
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
    $testimonials = Testimonial::all();
    return view('index', compact('services', 'testimonials'));
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});

Route::post('/save-contact', function (Request $request) {
    Message::create($request->all());
    return redirect()->back()->with('success', 'Your message has been received');
});

Route::post('/save-contact', function (Request $request) {
    Message::create($request->all());
    return redirect()->back()->with('success', 'Your message has been received');
});
// ------------------------ Dashboard Routes -------------------------------- //

Route::get('admin/dashboard', function () {
    $messageCount = Message::count();
    return view('admin.dashboard', compact('messageCount'));
});

Route::get('/admin/messages', function () {
    $messages = Message::all();
    return view('admin.messages', compact('messages'));
});
Route::get('/admin/messages/{id}/delete', function ($id) {
    $message = Message::find($id);
    $message->delete();
    return redirect('/admin/messages')->with('You have successfully deleted a user\'s message');
});

// ----------CRUD for Service---------- //
Route::get('admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
Route::get('admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
Route::post('admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
Route::get('admin/service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
Route::post('admin/service/{id}/update', [ServiceController::class, 'update'])->name('admin.service.update');
Route::get('admin/service/{id}/delete', [ServiceController::class, 'delete'])->name('admin.service.destroy');
// ----------CRUD for Service---------- //
