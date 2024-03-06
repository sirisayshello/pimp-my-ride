<?php

use App\Http\Controllers\CompleteFeatureController;
use App\Http\Controllers\CreateFeatureController;
use App\Http\Controllers\CreateCarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteCarController;
use App\Http\Controllers\DeleteFeatureController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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


// Route::get('/', function () {
//     return view('index');
// });


Route::view('/', 'index')->name('login')->middleware('guest');

Route::post('login', LoginController::class);

Route::get('dashboard', DashboardController::class)->middleware('auth');

Route::get('logout', LogoutController::class);

Route::post('/cars', CreateCarController::class)->middleware(('auth'));

Route::post('/features', CreateFeatureController::class)->middleware(('auth'));

Route::patch('features/{feature}/complete', CompleteFeatureController::class)->middleware('auth');
Route::patch('features/{feature}/delete', DeleteFeatureController::class)->middleware('auth');
Route::patch('cars/{car}/delete', DeleteCarController::class)->middleware('auth');
