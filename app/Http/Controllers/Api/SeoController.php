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
        $frontendDomain = 'https://ocean-it.net';

        // روابط ثابتة
        $staticUrls = [
            "{$frontendDomain}/",
            "{$frontendDomain}/projects",
            "{$frontendDomain}/about",
            "{$frontendDomain}/HowItWork",
            "{$frontendDomain}/blog",
        ];

        // روابط المدونات
        $dynamicUrls = Blog::select('id', 'updated_at')->get()->map(function ($blog) use ($frontendDomain) {
            return [
                'loc' => "{$frontendDomain}/blog-details/{$blog->id}",
                'lastmod' => $blog->updated_at->toDateString(),
            ];
        })->toArray();

        // دمج الكل
        $allUrls = array_merge(
            array_map(fn($url) => ['loc' => $url], $staticUrls),
            $dynamicUrls
        );

        // توليد XML يدوي
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;

        foreach ($allUrls as $url) {
            $xml .= "  <url>" . PHP_EOL;
            $xml .= "    <loc>{$url['loc']}</loc>" . PHP_EOL;
            if (isset($url['lastmod'])) {
                $xml .= "    <lastmod>{$url['lastmod']}</lastmod>" . PHP_EOL;
            }
            $xml .= "    <changefreq>weekly</changefreq>" . PHP_EOL;
            $xml .= "    <priority>0.8</priority>" . PHP_EOL;
            $xml .= "  </url>" . PHP_EOL;
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'application/xml');
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
