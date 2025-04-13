<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\ContactMessage;
use App\Models\Service;
use App\Models\Subscriber;
use App\Observers\BlogObserver;
use App\Observers\ServiceObserver;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);
        view()->share('logoPath', asset('dashboard/images/logo.png'));
        view()->share('logoPath2', asset('dashboard/images/logo2.png'));
        View::composer('*', function ($view) {
            $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
            $unreadSubscribersCount = Subscriber::where('is_read', false)->count();
            $view->with(compact('unreadMessagesCount', 'unreadSubscribersCount'));
        });
        Blog::observe(BlogObserver::class);
        Service::observe(ServiceObserver::class);
        Builder::useVite();
    }
}
