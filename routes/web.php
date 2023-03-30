<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');
Route::get('/show_room',[HotelController::class,'show_room'])->name('show_room');
Route::get('/room',[HotelController::class,'room'])->name('room');
Route::get('/dashboard',[HotelController::class,'dashboard'])->name('dashboard');
Route::post('/add_room',[HotelController::class,'add_room'])->name('add_room');