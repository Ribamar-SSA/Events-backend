<?php

use Illuminate\Support\Facades\Route;




use App\Http\Controllers\EventController;

Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('api/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/ver/{id}', [EventController::class, 'ver'])->name('events.ver');






Route::get('/', [EventController::class, 'index'])->name('welcome');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

