<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

    Route::get('/',function() {return view('auth.login');});

    Route::get('/create', [App\Http\Controllers\FormController::class, 'create'])->name('create');
    Route::get('/kemaskini/{reservationId}', [App\Http\Controllers\FormController::class, 'edit'])->name('edit');
    Route::post('/update/{reservationId}', [App\Http\Controllers\FormController::class, 'update'])->name('update');
    Route::post('/submit', [FormController::class,'submit']);
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\FormController::class, 'index'])->name('home');
    Route::delete('/padam/{reservationId}', [App\Http\Controllers\FormController::class, 'destroy'])->name('destroy');


    Route::prefix('Tempahan')
    ->as('reservations.')
    ->group(function() {

    });
