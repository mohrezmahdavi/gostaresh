<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Auth\PhoneNumber\LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login');

Route::get('/login/phone', [App\Http\Controllers\Auth\PhoneNumber\LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login.phone');

Route::post('/login/phone', [App\Http\Controllers\Auth\PhoneNumber\DoLoginController::class, 'doLogin'])
    ->middleware('guest')
    ->name('do.login.phone');

Route::get('/login/phone/show', [App\Http\Controllers\Auth\PhoneNumber\DoLoginController::class, 'showDoLoginPage'])
    ->middleware('guest')
    ->name('show.do.login.phone');

Route::post('/login/phone/verify', [App\Http\Controllers\Auth\PhoneNumber\DoLoginVerifyController::class, 'doLoginVerify'])
    ->middleware('guest')
    ->name('do.login.phone.verify');

if (config('recommendation.project_name') == 'samt') {
    Route::get('register/form/data', [App\Http\Controllers\Auth\PhoneNumber\DoLoginVerifyController::class, 'registerFormData'])
        ->middleware('guest')
        ->name('register.form.data');

    Route::post('register/form/data', [App\Http\Controllers\Auth\PhoneNumber\DoLoginVerifyController::class, 'doRegisterFormData'])
        ->middleware('guest')
        ->name('do.register.form.data');
}


Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');



Route::get('/login/username', [App\Http\Controllers\Auth\Username\LoginController::class, 'login'])
    ->middleware('guest')
    ->name('login.username');

Route::post('/login/username', [App\Http\Controllers\Auth\Username\DoLoginController::class, 'doLogin'])
    ->middleware('guest')
    ->name('do.login.username');
