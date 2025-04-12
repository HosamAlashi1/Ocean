<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Service;
use App\Observers\BlogObserver;
use App\Observers\ServiceObserver;
use Illuminate\Support\Facades\App;
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
        $locale = session('locale', config('app.locale'));
        app()->setLocale($locale);
        view()->share('logoPath', asset('dashboard/images/logo.png'));
        view()->share('logoPath2', asset('dashboard/images/logo2.png'));
        Blog::observe(BlogObserver::class);
        Service::observe(ServiceObserver::class);
        Builder::useVite();
    }
}
