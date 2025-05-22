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
//            "{$frontendDomain}/#services",
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
        $xml = View::make('seo.sitemap', compact('urls'))->render();

        return Response::make($xml, 200)->header('Content-Type', 'application/xml');
    }

    public function blogPreview($id)
    {
        $lang = app()->getLocale(); // or 'en'

        $title_col = "title_$lang";
        $desc_col = "desc_$lang";
        $key_col = "key_url_$lang";
        $content_col = "content_$lang";

        $blog = Blog::with('details')->findOrFail($id);

        $data = [
            'title' => $blog->$title_col,
            'description' => $blog->$desc_col,
            'image' => asset($blog->image),
            'url' => "https://ocean-it.net/blog-details/{$id}",
        ];

        return view('seo.blog-preview', $data);
    }

}
