<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {

    // Static pages
    Route::get('/', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('home.redirect');
    Route::get('/about-us', [App\Http\Controllers\Guest\AboutController::class, 'index'])->name('about');
    Route::get('/contact-us', [App\Http\Controllers\Guest\ContactController::class, 'index'])->name('contact');
    Route::get('/gallery', [App\Http\Controllers\Guest\GalleryController::class, 'index'])->name('gallery');
    Route::get('/testimonials', [App\Http\Controllers\Guest\TestimonialController::class, 'index'])->name('testimonials');

    // Blog routes
    Route::controller(App\Http\Controllers\Guest\BlogsController::class)->group(function () {
        Route::get('/news', 'index')->name('news.index');
        Route::get('/news/create', 'create')->name('news.create');
        Route::post('/news', 'store')->name('news.store');
        Route::get('/news/{id}', 'show')->name('news.show');
    });

    // Project routes
    Route::controller(App\Http\Controllers\Guest\ProjectsController::class)->group(function () {
        Route::get('/projects', 'index')->name('projects.index');
        Route::get('/projects/create', 'create')->name('projects.create');
        Route::post('/projects', 'store')->name('projects.store');
        Route::get('/projects/{id}', 'show')->name('projects.show');
    });

});
Auth::routes();