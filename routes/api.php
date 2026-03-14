<?php

use App\Http\Controllers\TerminalController;
use Illuminate\Support\Facades\Route;

Route::middleware('throttle:60,1')->group(function () {
    Route::get('/terminal/fs', [TerminalController::class, 'filesystem']);
    Route::get('/terminal/file/{path}', [TerminalController::class, 'file'])
        ->where('path', '.*');
});
