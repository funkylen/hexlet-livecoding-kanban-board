<?php

use App\Http\Controllers\Api\CardController;
use Illuminate\Support\Facades\Route;

Route::resource('cards', CardController::class)
    ->only('store', 'update', 'destroy', 'show');
