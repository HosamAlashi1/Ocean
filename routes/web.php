<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactMessageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ProcessController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SubscribeController;
use App\Http\Controllers\Dashboard\TagController;
use App\Http\Controllers\Dashboard\WorkController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Redirect the root URL to /admin/login
Route::prefix(LaravelLocalization::setLocale())->get('/', function () {
    return redirect(LaravelLocalization::setLocale() . '/admin/login');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/admin/',
        'middleware' => ['web','guest']
    ], function(){

    if (!Auth::guard('web')->check()) {
        // Login Routes
        Route::get('login',  [AuthController::class, 'showLoginForm'])->name('show.login');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    }

});


//==============Dashboard================
Route::group(
    [
        'prefix' =>LaravelLocalization::setLocale().'/admin/',
//            'middleware' => ['web']
        'middleware' => [ 'web','localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]

    ], function(){

    Route::group(['middleware' => ['auth:web']], function(){

        Route::post('/logout', [AuthController::class,'logout'])->name('Admin.logout');

        // Dashboard Routes
        Route::get('index', [DashboardController::class,'index'])->name('dashboard');

        Route::resource('admins',AdminController::class);

        Route::resource('services',ServiceController::class);
        Route::get('/services/update-recent_work/{id}', [ServiceController::class, 'update_recent_work'])->name('update-recent_work-status');
        Route::get('/services/update-our_service/{id}', [ServiceController::class, 'update_our_service'])->name('update-our_service-status');

        Route::get('contact-messages',[ContactMessageController::class,'index'])->name('contact-messages.index');
        Route::delete('contact-messages/{contactMessage}',[ContactMessageController::class,'destroy'])->name('contact-messages.destroy');
        Route::post('contact-messages/mark-read', [ContactMessageController::class, 'markAllAsRead'])->name('contact-messages.markRead');

        Route::get('subscribers',[SubscribeController::class,'index'])->name('subscribers.index');
        Route::delete('subscriber/{subscriber}',[SubscribeController::class,'destroy'])->name('subscribers.destroy');
        Route::post('subscribers/mark-read', [SubscribeController::class, 'markAllAsRead'])->name('subscribers.markRead');

        Route::resource('member',MemberController::class);

        Route::resource('process',ProcessController::class);

        Route::get('work/service-list', [WorkController::class, 'list'])->name('services.list');
        Route::resource('work',WorkController::class);

        Route::resource('blog',BlogController::class);
        Route::post('/blog/upload-image', [BlogController::class, 'uploadCkeditorImage'])->name('blog.ckeditor.upload');
        Route::get('/blog/update-default/{id}', [BlogController::class, 'updateDefault'])->name('update-blog-default');

        Route::resource('tags',TagController::class);

        // settings
        Route::get('settings/',[SettingController::class, 'index'])->name('settings.index');
        Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

    });

});

