<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// or
Route::post('/2fa', function () {
    return redirect(URL()->previous());
})->name('2fa')->middleware('2fa');
Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', '2fa']);

// routes/web.php
// Route::get('/2fa','PasswordSecurityController@show2faForm');
// Route::post('/generate2faSecret','PasswordSecurityController@generate2faSecret')->name('generate2faSecret');
// Route::post('/2fa','PasswordSecurityController@enable2fa')->name('enable2fa');
// Route::post('/disable2fa','PasswordSecurityController@disable2fa')->name('disable2fa');





Route::get('/complete-registration', [App\Http\Controllers\Auth\RegisterController::class, 'completeRegistration'])->name('completeRegistration');

