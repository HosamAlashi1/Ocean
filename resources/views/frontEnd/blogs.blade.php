@extends('frontEnd.layouts.master')
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('title',App::getLocale() == 'ar' ? $data['meta_title_ar_blogs'] :$data['meta_title_en_blogs'] )
@section('description',App::getLocale() == 'ar' ? $data['meta_desc_ar_blogs'] :$data['meta_desc_en_blogs'] )
@section('content')

    <section class="content-section">
      <div class="container">
        <h2 class="page-title">{{App::getLocale() == 'ar' ? $data['blog_title_ar'] :$data['blog_title_en']}}</h2>
        <p class="page-pargh">
            {{App::getLocale() == 'ar' ? $data['blog_desc_ar'] :$data['blog_desc_en']}}
        </p>
        <div class="bolg-section">
          <div class="blog-cards">
              @foreach($blogManualContent as $blog)
                  <div class="blog-card">
                      <a href="{{ route('front.blog',['id' => $blog->id , 'key' => $blog->key_url ?? null ]) }}" class="blog-img">
                          <figure>
                              <img loading="lazy" src="{{asset($blog->image)}}" alt="blog" />
                          </figure>
                      </a>
                      <div class="blog-content">
                          <a href="{{ route('front.blog',$blog->id) }}" class="blog-title">
                              {{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}
                          </a>

                          <div class="blog-info">
                              <span>{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</span>
                              <span>{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                          </div>
                      </div>
                  </div>
              @endforeach

          </div>
          <div class="blog-shortcut">
            <h5 class="shortcut-title">{{__('front.Shortcut Links')}}</h5>
              @if($blogShortLink)
            <div class="shortcut-flex">
                @foreach($blogShortLink as $blog)
                   <div class="blog-card">
                <a href="{{ route('front.blog',$blog->id) }}" class="blog-img">
                  <figure>
                    <img loading="lazy" src="{{asset($blog->image)}}" alt="blog" />
                  </figure>
                </a>
                <div class="blog-content">
                  <a href="{{ route('front.blog',$blog->id) }}" class="blog-title">
                      {{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}
                  </a>
                  <div class="blog-info">
                      <span>{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</span>
                      <span>{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
                  </div>
                </div>
              </div>
                @endforeach


            </div>
              @endif
          </div>
        </div>
      </div>
    </section>

@endsection
