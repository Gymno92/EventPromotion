<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::middleware([Authenticate::class])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/buyEvent', [EventController::class, 'buyEvent'])->name('buyEvent');
    Route::get('/myTickets', [EventController::class, 'myTickets'])->name('myTickets');
    Route::get('/allEvent', [EventController::class, 'allEvent'])->name('allEvent');
});
Route::middleware([RedirectIfAuthenticated::class])->group(function(){
    Route::get('/', function() {
        return view('auth.register');
    });
});
