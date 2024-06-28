<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!

*/

//AUTHENTICATION ROUTES
Route::get('/registration', [
    App\Http\Controllers\AuthenController::class,
    'registration',
])->middleware('guest');

Route::post('/registration-user', [
    App\Http\Controllers\AuthenController::class,
    'registerUser',
])
    ->name('user.registration')
    ->middleware('guest');

Route::get('/login', [App\Http\Controllers\AuthenController::class, 'login'])
    ->name('login')
    ->middleware('guest');

Route::post('/login-user', [
    App\Http\Controllers\AuthenController::class,
    'loginUser',
])
    ->name('user.store')
    ->middleware('guest');

Route::get('/logout', [App\Http\Controllers\AuthenController::class, 'logout'])
    ->name('logout')
    ->middleware('authCheck');

// Route::get('/foo', function () {
//     Artisan::call('storage:link');
// });

////ROUTES BACK OFFICE

Route::get('/back', [App\Http\Controllers\BiometrieController::class, 'back'])
    ->name('back')
    ->middleware('authCheck');

Route::get('/back/details/{id}', [
    App\Http\Controllers\BiometrieController::class,
    'backDetails',
])
    ->name('back.details')
    ->middleware('authCheck');

////// BIOMETRIE ROUTES ////////
Route::get('/', [
    App\Http\Controllers\BiometrieController::class,
    'BiometrieIndex',
])->name('biometrie.index');

Route::get('/employeur/info/ajax', [
    App\Http\Controllers\BiometrieController::class,
    'EmployeurInfoAjax',
])->name('employeur.info.ajax');

Route::get('/send/otp/ajax', [
    App\Http\Controllers\BiometrieController::class,
    'SendOtpAjax',
])->name('send.otp.ajax');

Route::get('/verif/otp/ajax', [
    App\Http\Controllers\BiometrieController::class,
    'VerifOtpAjax',
])->name('verif.otp.ajax');
