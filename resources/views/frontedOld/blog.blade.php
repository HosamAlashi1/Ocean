@extends('frontedOld.layouts.master')
@section('title', __('front.blog'))
@section('content')
    <div class="blog-post-container">
        <!-- Header Section -->
        <section class="header-section">
            <img style="max-height:50vh; min-height:50vh;" src="{{ asset($blog->image) }} " alt="Featured Image"
                 class="header-image">
            <div class="header-content">
                <h1 class="header-title">{{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}</h1>

                <div class="blog-card-footer">
                    <div class="header-meta">
                        <span class="date">{{\Carbon\Carbon::parse($blog->date)->format('d M, Y')}}</span>
                        <span class="author">{{$blog->by}}</span>
                    </div>
                    <span class="blog-card-main-category">{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                </div>
            </div>
        </section>

        <!-- Blog Content Section -->
        <section class="blog-content-section">
            <div class="blog-content">
                @if(App::getLocale() == 'ar' )
                    {!! $blog->content_ar !!}
                @else
                    {!! $blog->content_en !!}
                @endif
            </div>
        </section>

        <!-- From the Blog Section -->
        <section class="from-the-blog">
            <h3>{{__('front.From the Blog')}}</h3>
            <div class="blog-post-cards">
                @foreach($blogManualContent as $blog)
                    <div class="blog-card" style="min-height :300px;max-height : 450px;">
                        <a style="text-decoration: none; display: inherit;"
                           href="{{ $blog->short_link != null ? $blog->short_link : route('front.blog', $blog->id) }}">
                            <img style="min-height :200px;max-height : 200px;" src="{{asset($blog->image)}}"
                                 alt="Blog Image" class="blog-post-card-image">
                            <div class="blog-card-content">
                                <h4>{{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}</h4>
                                <div class="blog-card-footer">
                                    <span class="blog-card-date">{{\Carbon\Carbon::parse($blog->date)->format('d M, Y')}}</span>
                                    <span class="blog-card-category">{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @foreach($blogShortLink as $blog)
                    <div class="blog-card-sub" style="min-height :180px;max-height : 280px;">
                        <a style="text-decoration: none; display: inherit;"
                           href="{{ $blog->short_link != null ? $blog->short_link : route('front.blog', $blog->id) }}">
                            <img width="180px" style="min-height :180px;max-height : 180px;"
                                 src="{{asset($blog->image)}}" alt="Cherries" class="shortcut-image">
                            <div style="min-width :100px ; max-width :550px ;" class="shortcut-main-content">
                                <h4 class="shortcut-title">{{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}</h4>
                                <div class="blog-card-footer">
                                    <span class="shortcut-date">{{\Carbon\Carbon::parse($blog->date)->format('d M, Y')}}</span>
                                    <span class="shortcut-category">{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
