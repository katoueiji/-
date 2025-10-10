<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/top', [DisplayController::class, 'index']);
Route::get('/event/{id}/detail', [DisplayController::class, 'eventDetail'])->name('event.detail');

Route::get('/event/{id}/join', [RegistrationController::class, 'eventJoinform'])->name('event.join');
Route::post('/event/{id}/join', [RegistrationController::class, 'eventJoin']);

Route::get('/user/{id}/profile', [DisplayController::class, 'userProfile'])->name('user.profile');

Route::get('/user/{id}/profile/edit', [RegistrationController::class, 'profileEditform'])->name('profile.edit');
Route::post('/user/{id}/profile/edit', [RegistrationController::class, 'profileEdit']);
