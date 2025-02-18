<?php

use App\Http\Controllers\OurController;
use App\Http\Controllers\YourController;
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
    return view('welcome');
});
Route::get('/login', [YourController::class, 'login']);  //get method web ka address create krne ky lye use hota
Route::post('/login-user', [YourController::class, 'loginUser'])->name('login-user');
Route::get('/signup', [YourController::class, 'signup']);
Route::post('/signup-data', [YourController::class, 'signupData'])->name('signup-data'); //post method data save krne ky lye use hota
Route::get('/chat', [YourController::class, 'chat'])->middleware('Your');
Route::get('/logout', [YourController::class, "logout"]);
Route::post('/Register', [OurController::class, "register"]);
