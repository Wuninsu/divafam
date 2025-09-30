<?php

use App\Http\Controllers\Guest\ContactController;
use App\Http\Controllers\TrixController;
use App\Notifications\WelcomeTestNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('trix', [TrixController::class, 'index'])->name('trix.index');
Route::post('trix/upload', [TrixController::class, 'upload'])->name('trix.upload');
Route::post('trix/store', [TrixController::class, 'store'])->name('trix.store');

Route::get('trix/show/{id}', [TrixController::class, 'show'])->name('trix.show');

Route::get('trix/edit/{id}', [TrixController::class, 'edit'])->name('trix.edit');
Route::post('trix/update/{id}', [TrixController::class, 'update'])->name('trix.update');

Route::get('trix/delete/{id}', [TrixController::class, 'destroy'])->name('trix.delete');




// Route::middleware('guest')->group(function () {

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
    Route::get('/news/{slug?}', 'show')->name('guest.news.show');
});

// Project routes
Route::controller(App\Http\Controllers\Guest\ProjectsController::class)->group(function () {
    Route::get('/projects', 'index')->name('guest.projects.index');
    Route::get('/projects/create', 'create')->name('guest.projects.create');
    Route::post('/projects', 'store')->name('guest.projects.store');
    Route::get('/projects/{project?}', 'show')->name('guest.projects.show');
});

// });


use Illuminate\Support\Facades\Mail;




Route::get('/test-email', function () {
    $notifiable = new class {
        use Notifiable;
        public function routeNotificationForMail()
        {
            return 'fuseiniabdulhafiz29@gmail.com';
        }
    };

    $notifiable->notify(new WelcomeTestNotification(
        subject: 'Welcome to Diva Farms!',
        message: 'We’re excited to have you on board. Stay tuned for exciting updates!',
        actionText: 'Visit Our Site',
        actionUrl: 'https://your-website.com'
    ));

    return 'Welcome test email sent!';
});
use App\Http\Controllers\Main\{
    DashboardController,
    PostController,
    TagController,
    PageController,
    MediaController,
    ProgramController,
    TrainingController,
    BeneficiaryController,
    CommunityController,
    EventController,
    UserController,
    RoleController,
    SettingController,
    CategoryController,
    FundingController,
};
use App\Http\Controllers\SocialAuthController;

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Posts, Tags & Categories
    Route::controller(PostController::class)->group(function () {
        Route::get('/posts', 'index')->middleware('can:view post')->name('posts.index');
        Route::get('/posts/create', 'create')->middleware('can:create post')->name('posts.create');
        Route::post('/posts', 'store')->middleware('can:create post')->name('posts.store');
        Route::get('/posts/{post?}/show', 'show')->middleware('can:view post')->name('posts.show');
        Route::get('/posts/edit/{post?}', 'edit')->middleware('can:update post')->name('posts.edit');
        Route::put('/posts/{post?}', 'update')->middleware('can:update post')->name('posts.update');
    });

    Route::resource('tags', TagController::class)->middleware([
        'index' => 'can:view tag',
    ]);

    Route::resource('category', CategoryController::class); // No permissions defined in seeder for category

    // Pages
    Route::controller(PageController::class)->group(function () {
        Route::get('/pages', 'index')->middleware('can:view page')->name('pages.index');
        Route::get('/pages/create', 'create')->middleware('can:create page')->name('pages.create');
        Route::post('/pages', 'store')->middleware('can:create page')->name('pages.store');
        Route::get('/pages/{page}/edit', 'edit')->middleware('can:update page')->name('pages.edit');
        Route::post('/pages/update/{page}', 'update')->middleware('can:update page')->name('pages.update');

        // Public-facing content; permissions optional
        Route::get('/pages/faq', 'faq')->name('pages.faq');
        Route::get('/pages/inquires', 'inquiry')->name('pages.inquiry');
        Route::get('/pages/home', 'home')->name('pages.home');
    });

    // Media
    Route::controller(MediaController::class)->group(function () {
        Route::get('/media', 'index')->middleware('can:view media')->name('media.index');
        Route::get('/media/{id?}/show', 'show')->middleware('can:view media')->name('media.show');
        Route::get('/media/{id?}', 'edit')->middleware('can:update media')->name('media.edit');
        Route::post('/media/{id?}', 'update')->middleware('can:update media')->name('media.update');
    });

    // Programs = Projects
    Route::controller(ProgramController::class)->group(function () {
        Route::get('/programs', 'index')->middleware('can:view project')->name('programs.index');
        Route::get('/programs/create', 'create')->middleware('can:create project')->name('programs.create');
        Route::post('/programs', 'store')->middleware('can:create project')->name('programs.store');
        Route::get('/programs/{project?}/show', 'show')->middleware('can:view project')->name('programs.show');
        Route::get('/programs/{project?}', 'edit')->middleware('can:update project')->name('programs.edit');
        Route::post('/programs/{project?}', 'update')->middleware('can:update project')->name('programs.update');
    });

    Route::resource('trainings', TrainingController::class)->middleware([
        'index' => 'can:view training',
    ]);

    Route::resource('beneficiaries', BeneficiaryController::class)->middleware([
        'index' => 'can:view beneficiary',
    ]);

    Route::resource('communities', CommunityController::class)->middleware([
        'index' => 'can:view community',
    ]);

    Route::resource('events', EventController::class)->middleware([
        'index' => 'can:view event'
    ]);

    // Users & Permissions
    Route::controller(App\Http\Controllers\Main\UserController::class)->group(function () {
        Route::get('/users', 'index')->middleware('can:manage users')->name('users.index');
        Route::get('/users/create', 'create')->middleware('can:manage users')->name('users.create');
        Route::post('/users', 'store')->middleware('can:manage users')->name('users.store');
        Route::get('/users/{user}/show', 'show')->middleware('can:manage users')->name('users.show');
        Route::get('/users/{user}/edit', 'edit')->middleware('can:manage users')->name('users.edit');

        Route::get('/users/team-members', 'teamMembers')->middleware('can:manage users')->name('users.team');

        Route::get('/users/manage-user-permissions/{user?}', 'managePermission')->middleware('can:assign permission')->name('users.manage-user-permission');
    });

    Route::controller(App\Http\Controllers\Main\RoleController::class)->group(function () {
        Route::get('/roles', 'roles')->middleware('can:manage roles')->name('roles.index');
        Route::get('/permissions', 'permissions')->middleware('can:manage permissions')->name('permissions.index');
    });

    // Settings
    Route::controller(App\Http\Controllers\Main\SettingController::class)->group(function () {
        Route::get('/settings', 'index')->middleware('can:manage site options')->name('settings.index');
        Route::get('/restore', 'restore')->middleware('can:manage recycle bin')->name('restore.index');
        Route::get('/user/profile', 'profile')->name('profile.index'); // accessible by all users
    });

    // Profile
    Route::controller(App\Http\Controllers\Main\ProfileController::class)->group(function () {
        Route::get('/user/profile', 'index')->name('profile.index'); // accessible by all
        Route::get('/user/{user}/profile', 'show')->middleware('can:view user')->name('profile.show');
    });

    // Funding (Donors, Donations, Sponsorships)
    Route::prefix('funding')->group(function () {
        Route::get('/donors', [FundingController::class, 'donorsIndex'])->middleware('can:view donor')->name('donors.index');
        Route::get('/donations', [FundingController::class, 'donationsIndex'])->middleware('can:view donation')->name('donations.index');
        Route::get('/sponsorships', [FundingController::class, 'sponsorshipsIndex'])->middleware('can:view sponsorship')->name('sponsorships.index');
    });
});


Route::get('login/{provider}', [SocialAuthController::class, 'redirect'])->name('social.login');
Route::get('login/{provider}/callback', [SocialAuthController::class, 'callback']);

Auth::routes();