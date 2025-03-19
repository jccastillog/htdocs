<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

//En las rutas los parametros dinámicos no lleva $ en el nombre

Route:: get('/service', [ServiceController::class,'index'])->name('service.index');
Route:: get('/service/create', [ServiceController::class,'create'])->name('service.create');
Route:: post('/service/store', [ServiceController::class,'store'])->name('service.store');
Route:: get('/service/edit/{service}', [ServiceController::class,'edit'])->name('service.edit');
Route:: put('/service/update/{service}', [ServiceController::class,'update'])->name('service.update');
Route:: get('/service/show/{service}', [ServiceController::class,'show'])->name('service.show');
Route:: delete('/service/destroy/{service}', [ServiceController::class,'destroy'])->name('service.destroy');

Route:: resource('/provider', ProviderController::class);
