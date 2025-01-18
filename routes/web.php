<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserContoller;

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
    return view('welcome');
});

Route::controller(UserContoller::class)->group(function () {
    Route::get('/register', 'loadRegister')->name('register'); // Show the registration form
    Route::post('/user-register', 'registered')->name('registered'); // Process registration form
});
