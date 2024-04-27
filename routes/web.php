<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;

Route::get("/", [GeminiController::class, "create"])->name("gemini.create");
Route::post("/gemini", [GeminiController::class, "store"])->name("gemini.store");