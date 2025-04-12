@extends('frontedOld.layouts.master')
@section('title', __('front.Terms & Conditions'))
@php
    $data = \App\Models\Setting::whereIn('key_id', ['term_title_ar', 'term_title_en','term_desc_ar', 'term_desc_en'])->pluck('value', 'key_id')->toArray();
@endphp
@section('content')
    <section class="terms-section">
        <div class="terms-container">
            <h1 class="terms-title">{{App::getLocale() == 'ar' ? $data['term_title_ar'] :$data['term_title_en']}}</h1>
            <p class="terms-subtitle">{{App::getLocale() == 'ar' ? $data['term_desc_ar'] :$data['term_desc_en']}}</p>

            <h2 class="terms-heading">{{__('front.Services Provided')}}</h2>

            <div class="terms-content">
                @foreach($termServices as $termService)
                    <h3>
                        1.{{($loop->index+1)}} {{ App::getLocale() == 'ar' ? $termService->service_name_ar : $termService->service_name_en }}</h3>
                    <ul>
                        @foreach(\App\Models\Term::where('service_name_en',$termService->service_name_en)->get() as $term)
                            <li>{{App::getLocale() == 'ar' ?$term->desc_ar :$term->desc_en }}</li>
                        @endforeach
                    </ul>
                @endforeach

            </div>
        </div>
    </section>
@endsection
