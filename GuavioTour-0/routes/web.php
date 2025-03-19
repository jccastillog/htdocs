<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\MailInfoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route:: get('/service', [ServiceController::class,'index'])->name('service.index');
Route:: get('/service/create', [ServiceController::class,'create'])->name('service.create');
Route:: post('/service/store', [ServiceController::class,'store'])->name('service.store');
Route:: get('/service/edit/{service}', [ServiceController::class,'edit'])->name('service.edit');
Route:: put('/service/update/{service}', [ServiceController::class,'update'])->name('service.update');
Route:: get('/service/show/{service}', [ServiceController::class,'show'])->name('service.show');
Route:: delete('/service/destroy/{service}', [ServiceController::class,'destroy'])->name('service.destroy');

Route:: resource('/provider', ProviderController::class);

Route::post('/mail-me', [MailInfoController::class, 'mailMe'])->name('mailMe');