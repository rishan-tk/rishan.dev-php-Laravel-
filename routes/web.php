<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::view('/', 'pages.home')->name('home');
Route::view('/projects', 'pages.projects')->name('projects');
Route::view('/skills', 'pages.skills')->name('skills');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/aboutme', 'pages.aboutme')->name('aboutme');
Route::view('/contactme', 'pages.contactme')->name('contactme');
Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');


