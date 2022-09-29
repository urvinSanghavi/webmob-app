<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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
Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/blog', BlogController::class);
Route::post('blogfilter', [BlogController::class, 'blogfilter']);
Route::post('/adduser', [UserController::class, 'register']);
Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logoutuser']);
