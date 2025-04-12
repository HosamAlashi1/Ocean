<?php

namespace App\Observers;

use App\Models\Blog;
use App\Models\Service;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class ServiceObserver
{
//    public function saved(Service $service)
//    {
//        $this->generateSitemap();
//    }
//
//    public function deleted(Service $service)
//    {
//        $this->generateSitemap();
//    }
//
//    protected function generateSitemap()
//    {
//        $sitemap = Sitemap::create();
//        $locales = LaravelLocalization::getSupportedLocales();
//
//        // روابط ثابتة
//        foreach ($locales as $locale => $details) {
//            $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.index', [], false), $locale)));
//            $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.about', [], false), $locale)));
//            $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.contact', [], false), $locale)));
//            $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.terms', [], false), $locale)));
//        }
//
//        // روابط ديناميكية
//        $blogs = Blog::all();
//        foreach ($blogs as $blog) {
//            foreach ($locales as $locale => $details) {
//                $sitemap->add(Url::create(LaravelLocalization::localizeURL(route('front.blog', [$blog->id], false), $locale)));
//            }
//        }
//        $services = Service::all();
//        foreach ($services as $service) {
//            foreach ($locales as $locale => $details) {
//                $sitemap->add(
//                    Url::create(LaravelLocalization::localizeURL(route('front.service.show', [$service->id, $service->name_en], false), $locale))
//                        ->setLastModificationDate($service->updated_at)
//                );
//                $sitemap->add(
//                    Url::create(LaravelLocalization::localizeURL(route('services.works', ['id' => $service->id], false), $locale))
//                );
//            }
//        }
//
//        $sitemap->writeToFile(public_path('sitemap.xml'));
//    }
}
