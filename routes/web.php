<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::resource('assets', AssetController::class);
Route::get('/assets/{id}/print', [AssetController::class, 'printQr'])
    ->name('assets.print');