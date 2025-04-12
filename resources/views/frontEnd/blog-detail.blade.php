@extends('frontEnd.layouts.master')
@section('title',App::getLocale() == 'ar' ? $blog->title_html_ar ?? 'Effect | Blog'  : $blog->title_html_en ?? 'Effect | Blog')
@section('description',App::getLocale() == 'ar' ? $blog->desc_html_ar : $blog->desc_html_en)
@section('content')

    <section class="content-section">
      <div class="container">
        <div class="blog-detail">
          <figure class="blog-detail-img">
            <img src="{{ asset($blog->image) }}" alt="blog" />
          </figure>
          <h5 class="blog-detail-head">
              {{ App::getLocale() == 'ar' ? $blog->title_ar : $blog->title_en}}
          </h5>
          <div class="blog-info">
            <span>{{\Carbon\Carbon::parse($blog->date)->format('d M, Y')}}</span>
            <span>{{ App::getLocale() == 'ar' ? $blog->blog_type->name_ar : $blog->blog_type->name_en}}</span>
          </div>
            <div class="blog-detail" style="color: #fff">
            @if(App::getLocale() == 'ar' )
                {!! $blog->content_ar !!}
            @else
                {!! $blog->content_en !!}
            @endif
            </div>

        </div>
        <h3 class="related-head">{{__('front.From the Blog')}}</h3>
        <div class="bolg-section">
          <div class="blog-cards">
              @foreach($blogManualContent as $blog)
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
