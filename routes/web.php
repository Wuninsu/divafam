<?php

use App\Http\Controllers\Guest\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {

    // Static pages
    Route::get('/', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('guest.home');
    Route::get('/home', [App\Http\Controllers\Guest\HomeController::class, 'index'])->name('guest.home.redirect');
    Route::get('/about-us', [App\Http\Controllers\Guest\AboutController::class, 'index'])->name('guest.about');
    Route::get('/contact-us', [App\Http\Controllers\Guest\ContactController::class, 'index'])->name('guest.contact');
    Route::get('/gallery', [App\Http\Controllers\Guest\GalleryController::class, 'index'])->name('guest.gallery');
    Route::get('/testimonials', [App\Http\Controllers\Guest\TestimonialController::class, 'index'])->name('guest.testimonials');
    Route::post('/send-contact', [ContactController::class, 'sendContact'])->name('guest.send.contact');
    Route::get('/terms', [App\Http\Controllers\Guest\TermsController::class, 'index'])->name('guest.terms');
    Route::get('/privacy', [App\Http\Controllers\Guest\PrivacyController::class, 'index'])->name('guest.privacy');

    // Blog routes
    Route::controller(App\Http\Controllers\Guest\DonationController::class)->group(function () {
        Route::get('/donations/donate', 'donate')->name('guest.donations.donate');
        Route::get('/donations/donors', 'donors')->name('guest.donations.donors');
    });


    // Blog routes
    Route::controller(App\Http\Controllers\Guest\BlogsController::class)->group(function () {
        Route::get('/news', 'index')->name('guest.news.index');
        Route::get('/news/create', 'create')->name('guest.news.create');
        Route::post('/news', 'store')->name('guest.news.store');
        Route::get('/news/{id?}', 'show')->name('guest.news.show');
    });

    // Project routes
    Route::controller(App\Http\Controllers\Guest\ProjectsController::class)->group(function () {
        Route::get('/projects', 'index')->name('guest.projects.index');
        Route::get('/projects/create', 'create')->name('guest.projects.create');
        Route::post('/projects', 'store')->name('guest.projects.store');
        Route::get('/projects/{id?}', 'show')->name('guest.projects.show');
    });

});


use Illuminate\Support\Facades\Mail;



Route::get('/test-email', function () {
    $details = [
        'subject' => 'Test Email from Diva Farms',
        'body' => 'This is a test email to verify that email sending works with Hostinger.'
    ];

    Mail::raw($details['body'], function ($message) use ($details) {
        $message->to('fuseiniabdulhafiz29@gmail.com')
            ->subject($details['subject']);
    });

    return 'Test email sent!';
});

use App\Http\Controllers\Main\{
    DashboardController,
    PostController,
    TagController,
    PageController,
    MediaController,
    ProgramController,
    TrainingController,
    ParticipantController,
    CommunityController,
    EventController,
    UserController,
    RoleController,
    SettingController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts, Tags & Categories
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class);

    // Pages
    Route::resource('pages', PageController::class);

    // Media
    Route::resource('media', MediaController::class);

    // Projects & Trainings
    Route::resource('programs', ProgramController::class);
    Route::resource('trainings', TrainingController::class);
    Route::resource('participants', ParticipantController::class);

    // Communities
    Route::resource('communities', CommunityController::class);

    // Events
    Route::resource('events', EventController::class);

    // Users & Roles
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    // Settings
    Route::resource('settings', SettingController::class)->only(['index', 'update']);

});
Auth::routes();