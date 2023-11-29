<?php

use App\Http\Controllers\Transports\TransportController;
use App\Http\Controllers\Transports\TransportSubunitController;

Route::prefix('transport')->group(function () {
    Route::resource('transport_units', TransportSubunitController::class)
        ->only([
            'index',
            'create',
            'destroy',
            'edit',
            'load',
            'store',
            'update',
        ]);
});
Route::resource('transports', TransportController::class)
    ->only([
        'index',
        'create',
        'destroy',
        'edit',
        'load',
        'store',
        'update',
    ]);