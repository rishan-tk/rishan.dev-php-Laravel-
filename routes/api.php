<?php

use App\Http\Controllers\TerminalController;
use Illuminate\Support\Facades\Route;

Route::get('/terminal/fs', [TerminalController::class, 'filesystem']);
Route::get('/terminal/file/{path}', [TerminalController::class, 'file'])
    ->where('path', '.*');
