<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\ContactMessageController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ProcessController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect','localeViewPath' ]
    ], function(){
    Route::get('/', [HomeController::class,'index'])->name('front.index');
    Route::post('/customer-store', [HomeController::class,'store'])->name('front.customer.store');
    Route::get('about', [AboutController::class,'index'])->name('front.about');
    Route::get('blogs', [BlogController::class,'index'])->name('front.blogs');
    Route::get('blog/{id}/{key?}', [BlogController::class,'show'])->name('front.blog');
    Route::get('contact', [ContactController::class,'index'])->name('front.contact');
//    Route::get('services/{id?}', [ServicesController::class,'index'])->name('front.services');
    Route::get('service/{id}/{name}', [ServicesController::class,'show'])->name('front.service.show');
    Route::get('/services/{id}/works', [ServicesController::class, 'getWorksByService'])->name('services.works');
    Route::get('terms', [TermsController::class,'index'])->name('front.terms');

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
        Route::delete('contact-messages/{ContactMessage}',[ContactMessageController::class,'destroy'])->name('contact-messages.destroy');

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

// ====================== SEO ===================
//Route::get('/sitemap.xml', function () {
////    return 'a';
//    $sitemap = Sitemap::create();
//
//    // احصل على جميع اللغات المدعومة
//    $locales = LaravelLocalization::getSupportedLocales();
//
//    // أضف الروابط الثابتة بجميع اللغات
//    foreach ($locales as $locale => $details) {
//        $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.index', [], false), $locale)));
//        $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.about', [], false), $locale)));
//        $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.contact', [], false), $locale)));
//        $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.terms', [], false), $locale)));
//    }
//
//    // أضف الروابط الديناميكية للمدونات بجميع اللغات
//    $blogs = \App\Models\Blog::all();
//    foreach ($blogs as $blog) {
//        foreach ($locales as $locale => $details) {
//            $sitemap->add(
//                Url::create(LaravelLocalization::localizeURL(route('front.blog', [$blog->id], false), $locale))
//                    ->setLastModificationDate($blog->updated_at)
//            );
//        }
//    }
//
//    // أضف الروابط الديناميكية للخدمات بجميع اللغات
//    $services = \App\Models\Service::all();
//    foreach ($services as $service) {
//        foreach ($locales as $locale => $details) {
//            $sitemap->add(
//                Url::create(LaravelLocalization::localizeURL(route('front.service.show', [$service->id, $service->name_en], false), $locale))
//                    ->setLastModificationDate($service->updated_at)
//            );
//            $sitemap->add(
//                Url::create(LaravelLocalization::localizeURL(route('services.works', ['id' => $service->id], false), $locale))
//            );
//        }
//    }
//
//    return $sitemap->writeToFile(public_path('sitemap.xml'));
//});




