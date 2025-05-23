<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{

    public function list(Request $request)
    {
        $lang = $request->header('lang') ?? 'en';
        $supported_langs = ['en', 'ar'];

        if (!$lang || !in_array($lang, $supported_langs)) {
            return sendError('You must send a valid language in the header.', [
                'provided' => $lang,
                'supported_languages' => $supported_langs
            ], 400);
        }

        $title_col = "title_{$lang}";
        $desc_col = "desc_{$lang}";

        // Pagination
        $page = (int) $request->query('page', 1);
        $size = (int) $request->query('size', 6);
        $skip = ($page - 1) * $size;

        $tag = $request->query('tag_title');

        try {
            $settings = Setting::where('type_en', 'Blog Page Settings')
                ->where('key_id', 'like', "%{$lang}%")
                ->select('key_id', "{$title_col} as title", 'value')
                ->get();

            $seo_settings = getSeoSettings('blog', $lang);

            $query = Blog::select('id', 'image' , 'image_ar', "{$title_col} as title", "{$desc_col} as description", 'date')
                ->orderByDesc('id');

            if ($tag) {
                $query->whereHas('tags', function ($q) use ($tag) {
                    $q->where('title_en', 'like', "%{$tag}%")
                        ->orWhere('title_ar', 'like', "%{$tag}%");
                });
            }

            $total = $query->count();

            $blogs = $query->skip($skip)
                ->take($size)
                ->get()
                ->transform(function ($blog) use ($lang) {
                    $imageToUse = $lang === 'ar' && $blog->image_ar ? $blog->image_ar : $blog->image;
                    $blog->image = $imageToUse ? asset($imageToUse) : null;
                    $blog->date = Carbon::parse($blog->date)->format('F j, Y');
                    unset($blog->image_ar); // optional: hide internal field
                    return $blog;
                });

            return sendResponse([
                'blogs' => $blogs,
                'blog_settings' => $settings,
                'seo_settings' => $seo_settings,
                'pagination' => [
                    'total' => $total,
                    'page' => $page,
                    'size' => $size,
                    'last_page' => ceil($total / $size)
                ]
            ], 'Blog list retrieved successfully.');

        } catch (\Throwable $e) {
            return sendError('Failed to load blog list.', $e->getMessage(), 500);
        }
    }


    public function details(Request $request, $id)
    {
        $lang = $request->header('lang') ?? 'en';
        $supported_langs = ['en', 'ar'];

        if (!$lang || !in_array($lang, $supported_langs)) {
            return sendError('You must send a valid language in the header.', [
                'provided' => $lang,
                'supported_languages' => $supported_langs
            ], 400);
        }

        $title_col = "title_{$lang}";
        $desc_col = "desc_{$lang}";
        $content_col = "content_{$lang}";
        $key_col = "key_url_{$lang}";

        $blog = Blog::select(
            'id',
            'image',
            "{$title_col} as title",
            "{$desc_col} as description",
            "{$content_col} as content",
            'by',
            'date'
        )
            ->with([
                'tags' => fn($q) => $q->select('tags.id', 'title_en', 'title_ar'),
                'details:id,blog_id,url,key_url_en,key_url_ar'
            ])
            ->find($id);

        if (!$blog) {
            return sendError('Blog not found.', [], 400);
        }

        $related_blogs = Blog::where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(6)
            ->select('id', 'image', 'image_ar', "{$title_col} as title")
            ->get()
            ->transform(function ($related) use ($lang) {
                $imageToUse = $lang === 'ar' && $related->image_ar ? $related->image_ar : $related->image;
                $related->image = $imageToUse ? asset($imageToUse) : null;
                unset($related->image_ar); // optional
                return $related;
            });

        $seo_settings = getSeoSettings('blog', $lang);

        return sendResponse([
            'blog' => [
                'id' => $blog->id,
                'image' => $lang === 'ar' && $blog->image_ar ? asset($blog->image_ar) : asset($blog->image),
                'title' => $blog->title,
                'description' => $blog->description,
                'content' => $blog->content,
                'by' => $blog->by,
                'date' => Carbon::parse($blog->date)->format('F j, Y'),
                'tags' => $blog->tags->map(fn($tag) => [
                    'id' => $tag->id,
                    'title' => $tag["title_{$lang}"]
                ])->values(),
                'details' => $blog->details->map(fn($detail) => [
                    'url' => $detail->url,
                    'key' => $detail[$key_col]
                ])->values()
            ],
            'related_blogs' => $related_blogs,
            'seo_settings' => $seo_settings,
        ], 'Blog details retrieved successfully.');
    }

}
