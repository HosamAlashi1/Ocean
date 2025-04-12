<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $mainBlog = Blog::where('is_default','1')->first();
        $featuredVideoUrl = Setting::where('key_id', 'blog_video')->first();
        $blogShortLink = Blog::where('is_default','0')->where('short_link','!=',null)->where('content_en',null)->where('content_ar',null)
            ->orderBy('id', 'desc')
            ->get();
        $blogManualContent = Blog::where('is_default', '0')
            ->where(function ($query) {
                $query->where('content_en', '!=', null)
                    ->orWhere('content_ar', '!=', null);
            })
            ->where('short_link', null)
            ->orderBy('id', 'desc')
            ->get();
        return view('frontEnd.blogs',compact('mainBlog','featuredVideoUrl','blogManualContent','blogShortLink'));
    }

    public function show($id )
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return view('frontEnd.error');
        }

        $blogShortLink = Blog::where('short_link', '!=', null)
            ->where('content_en', null)
            ->where('content_ar', null)
            ->take(3)
            ->orderBy('id', 'desc')
            ->get();

        $blogManualContent = Blog::where(function ($query) {
            $query->where('content_en', '!=', null)
                ->orWhere('content_ar', '!=', null);
        })
            ->where('short_link', null)
            ->take(2)
            ->orderBy('id', 'desc')
            ->get();

        return view('frontEnd.blog-detail', compact('blog', 'blogManualContent', 'blogShortLink'));
    }

}
