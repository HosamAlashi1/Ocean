@extends('frontedOld.layouts.master')
@section('title', __('front.blogs'))
@section('css')
    <style>
        .video-thumbnail-frame {
            width: 100%;
            height: 250px;
            max-height: 500px; /* Adjust as needed */
            border-radius: 30px; /* Adjust if you want rounded corners */
        }

        .blog-sidebar {
            max-width: 30%;
        }

        .shortcut-image {
            max-width: 150px;
        }

        .shortcut-main-content {
            width: 100%;
            min-width: 180px;
            max-width: 260px;
        }

        /* Responsive styling */
        @media screen and (max-width: 1025px) {
            .blog-sidebar {
                max-width: 100%;
            }

            .shortcut-main-content {
                min-width: auto; /* Allowing content to adjust to 100% width */
                max-width: 100%; /* Allowing content to adjust to 100% width */
            }
        }

    </style>

@endsection
@php
    $data = \App\Models\Setting::whereIn('key_id', ['blog_title_ar', 'blog_title_en','blog_desc_ar', 'blog_desc_en'])->pluck('value', 'key_id')->toArray();
@endphp
@section('content')
    <section class="blogs-section">
        <div class="blogs-container">
            <div class="blogs-title">
                <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['blog_title_ar'] :$data['blog_title_en']}}</h2>
                <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['blog_desc_ar'] :$data['blog_desc_en']}}</p>
            </div>
            <div class="blogs-main-content">

                <div class="blog-main">
                    @if($mainBlog)
                        <div style="min-width: 600px ;max-width: 1200px" class="blog-card-main">
                            <a style="text-decoration: none; display: inherit;"
                               href="{{ $mainBlog->short_link != null ? $mainBlog->short_link : route('front.blog', $mainBlog->id) }}">
                                <img style=" max-width: 300px;" src="{{ asset($mainBlog->image) }}" alt="Cherries"
                                     class="blog-card-image">
                                <div style="width : 100%; min-width: 300px; max-width: 750px;"
                                     class="blog-card-main-content ">
                                    <h3 class="blog-card-title">{{ App::getLocale() == 'ar' ? $mainBlog->title_ar : $mainBlog->title_en }}</h3>
                                    @if(App::getLocale() == 'ar')
                                        @if($mainBlog->desc_ar)
                                            <p class="blog-card-description">{{ $mainBlog->desc_ar }}</p>
                                        @endif
                                    @else
                                        @if($mainBlog->desc_en)
                                            <p class="blog-card-description">{{ $mainBlog->desc_en }}</p>
                                        @endif
                                    @endif
                                    <div class="blog-card-footer">
                                        <span class="blog-card-date">{{ \Carbon\Carbon::parse($mainBlog->date)->format('d M, Y') }}</span>
                                        <span class="blog-card-category">{{ App::getLocale() == 'ar' ? $mainBlog->blog_type->name_ar : $mainBlog->blog_type->name_en }}</span>
                                    </div>
                                </div>
                            </a>

                        </div>
                    @endif

                    @if($blogManualContent)
                        @foreach($blogManualContent as $blog)
                            <div style="min-width:200px; max-width:600px; min-height : 350px; max-height : 350px"
                                 class="blog-card">
                                <a style="text-decoration: none; display: inherit;"
                                   href="{{ route('front.blog',$blog->id) }}">
                                    <img style=" height : 250px" src="{{asset($blog->image)}}" alt="Blog Image">
                                    <div class="blog-card-content">
                                        <h4>{{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}</h4>
                                        <div class="blog-card-footer">
                                            <span class="blog-card-date">{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</span>
                                            <span class="blog-card-category">{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif

                    <!-- Repeat blog cards as needed -->
                </div>
                <div class="blog-sidebar">
                    <div class="shortcut-links">
                        <h4>{{__('front.Shortcut Links')}}</h4>
                        @if($blogShortLink)
                            <ul>
                                @foreach($blogShortLink as $blog)
                                    <a style="text-decoration: none;" href="{{$blog->short_link}}">
                                        <li>
                                            <div style="min-height : 120px;" class="blog-card-main">
                                                <img src="{{asset($blog->image)}}" alt="Cherries"
                                                     class="shortcut-image">
                                                <div class="shortcut-main-content">
                                                    <h3 style="width:100%"
                                                        class="shortcut-title">{{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en }}</h3>
                                                    <div class="blog-card-footer">
                                                        <span class="shortcut-date">{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</span>
                                                        <span class="shortcut-category">{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>

                @if($featuredVideoUrl->value)
                    <div class="featured-video">
                        <h4>{{__('front.Featured Video')}}</h4>
                        <div class="video-thumbnail">
                            <video
                                    controls
                                    class="video-thumbnail-frame">
                                <source src="{{ asset($featuredVideoUrl->value) }}" type="video/mp4">
                                {{__('front.Your browser does not support the video tag.')}}
                            </video>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section>

@endsection
