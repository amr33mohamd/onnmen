<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Patient\IndexController;
use App\Http\Controllers\Patient\ReserveController;
use App\Http\Controllers\Patient\AppointmentsController;
use App\Http\Controllers\Doctor\AppointmentsController as DoctorAppointmentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [IndexController::class, 'show'])->middleware(['auth', 'checkRole:patient'])->name('dashboard');
Route::get('/reserve/{id}', [ReserveController::class, 'show'])->middleware(['auth', 'checkRole:patient'])->name('reserve');
Route::post('/reserve', [ReserveController::class, 'store'])->middleware(['auth', 'checkRole:patient'])->name('store');
Route::get('/appointments', [AppointmentsController::class, 'show'])->middleware(['auth', 'checkRole:patient'])->name('appointments');


Route::get('/doctor/appointments',[DoctorAppointmentsController::class, 'show'])->middleware(['auth','checkRole:doctor'])->name('doctor.dashboard');


Route::get('/test', function () {
    return Inertia::render('Test');

})->middleware(['auth', 'verified'])->name('test');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
