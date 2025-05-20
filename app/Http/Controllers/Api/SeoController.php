<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use App\Models\Blog;

class SeoController extends Controller
{
    public function sitemap()
    {
        // هذا هو رابط الفرونت الأساسي
        $frontendDomain = 'https://ocean-it.net';

        // روابط الصفحات الثابتة
        $staticUrls = [
            "{$frontendDomain}/",
            "{$frontendDomain}/#services",
            "{$frontendDomain}/projects",
            "{$frontendDomain}/about",
            "{$frontendDomain}/HowItWork",
            "{$frontendDomain}/blog",
        ];

        // روابط ديناميكية: المدونات
        $dynamicUrls = [];
        $blogs = Blog::select('id')->get();
        foreach ($blogs as $blog) {
            $dynamicUrls[] = "{$frontendDomain}/blog-details/{$blog->id}";
        }

        // لو بدك تضيف أعمال أو خدمات مستقبلاً:
        // foreach (Service::select('id')->get() as $service) {
        //     $dynamicUrls[] = "{$frontendDomain}/services/{$service->id}";
        // }

        // دمج كل الروابط
        $urls = array_merge($staticUrls, $dynamicUrls);

        // توليد XML من View
        $xml = View::make('sitemap', compact('urls'))->render();

        return Response::make($xml, 200)->header('Content-Type', 'application/xml');
    }
}
