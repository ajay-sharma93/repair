<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;
use App\Models\Message;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/about', [FrontendController::class, 'about']);
Route::post('/save-contact', [FrontendController::class, 'saveContact']);


// ------------------------ Dashboard Routes ---    ----------------------------- //

Route::get('admin/dashboard', [DashboardController::class, 'index']);
Route::get('/admin/messages', [MessageController::class, 'index']);

Route::get('/admin/messages/{id}/delete', [MessageController::class, 'destroy']);

// ----------CRUD for Service---------- //
Route::get('admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
Route::get('admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
Route::post('admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
Route::get('admin/service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
Route::post('admin/service/{id}/update', [ServiceController::class, 'update'])->name('admin.service.update');
Route::get('admin/service/{id}/delete', [ServiceController::class, 'delete'])->name('admin.service.destroy');
// ----------CRUD for Service---------- //
