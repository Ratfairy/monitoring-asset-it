<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;

Route::redirect('/', '/assets');
Route::resource('assets', AssetController::class);
Route::get('/assets/{id}/print', [AssetController::class, 'printQr'])
    ->name('assets.print');
Route::get('/asset-info/{id}', [AssetController::class, 'publicShow'])
    ->name('assets.public');