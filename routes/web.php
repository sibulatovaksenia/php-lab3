<?php

use App\Http\Controllers\AbonentController;

Route::resource('abonents', AbonentController::class);

// Пошук абонентів
Route::get('abonents/search', [AbonentController::class, 'search'])->name('abonents.search');
