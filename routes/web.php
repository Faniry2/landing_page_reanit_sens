<?php

use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');


// ── Inscription ─────────────────────────────────────────────────
Route::post('/inscription', [InscriptionController::class, 'store'])
    ->name('inscription.store');
    //->middleware(['throttle:6,1']);  // sécurité supplémentaire Laravel built-in

Route::get('/merci', [InscriptionController::class, 'merci'])
    ->name('inscription.merci');