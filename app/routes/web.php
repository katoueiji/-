<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Event_user;

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
Route::resource('/upload', 'UploadController');

Route::get('/top', [DisplayController::class, 'index']);
Route::get('/event/{id}/detail', [DisplayController::class, 'eventDetail'])->name('event.detail');
Route::get('/event/{id}/main', [DisplayController::class, 'eventMainform'])->name('event.main');
Route::get('/user/{id}/join', [DisplayController::class, 'userJoinform'])->name('user.join');

Route::get('/event/{id}/join', [RegistrationController::class, 'eventJoinform'])->name('event.join');
Route::post('/event/{id}/join', [RegistrationController::class, 'eventJoin']);

Route::get('/event/{id}/edit', [RegistrationController::class, 'eventEditform'])->name('event.Edit');
Route::post('/event/{id}/edit', [RegistrationController::class, 'eventEdit']);

Route::get('/event/{id}/edit/destroy', [RegistrationController::class, 'eventDestroyform'])->name('event.Destroy');
Route::post('/event/{id}/edit/destroy', [RegistrationController::class, 'eventDestroy']);

Route::get('/event/{id}/create', [RegistrationController::class, 'eventCreateform'])->name('event.Create');
Route::post('/event/{id}/create', [RegistrationController::class, 'eventCreate']);

Route::get('/user/{id}/profile', [DisplayController::class, 'userProfile'])->name('user.profile');

Route::get('/user/{id}/profile/edit', [RegistrationController::class, 'profileEditform'])->name('profile.edit');
Route::post('/user/{id}/profile/edit', [RegistrationController::class, 'profileEdit']);

Route::get('/user/{id}/user/edit', [RegistrationController::class, 'userEdit'])->name('user.edit');
Route::post('/user/{id}/user/edit', [RegistrationController::class, 'delete']);

Route::get('/user/{id}/join/cancel', [RegistrationController::class, 'userCancelform'])->name('user.cancel');
Route::post('/user/{id}/join/cancel', [RegistrationController::class, 'userCancel']);



Route::get('/debug-user-events', function () {
    $userId = Auth::id(); // ログイン中のユーザーID
    $records = Event_user::where('user_id', $userId)->get();
    dd($records);
});