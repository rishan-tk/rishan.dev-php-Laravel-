<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/projects', 'pages.projects')->name('projects');
Route::view('/skills', 'pages.skills')->name('skills');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/aboutme', 'pages.aboutme')->name('aboutme');
Route::view('/contactme', 'pages.contactme')->name('contactme');

Route::get('/projects/{slug}', [ProjectController::class, 'show'])
    ->where('slug', '[a-z0-9\-]+')
    ->name('projects.show');

Route::post('/contactme', [ContactController::class, 'submit'])
    ->middleware('throttle:contact')
    ->name('contact.submit');
