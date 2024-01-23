<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/home', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    
    
Route::get('/add_service', [AdminController::class, 'addView']);

Route::post('/upload_service', [AdminController::class, 'upload']);

Route::post('/appointments', [HomeController::class, 'contact']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancelAppointment/{id}', [HomeController::class, 'cancelAppointment']);

Route::get('/showAppointment', [AdminController::class, 'showAppointment']);

Route::get('/cancelAppointment/{id}', [AdminController::class, 'cancelAppointment']);

Route::get('/showService', [AdminController::class, 'showService']);

Route::get('/updateService/{id}', [AdminController::class, 'updateService']);

Route::post('/editService/{id}', [AdminController::class, 'editService']);
    