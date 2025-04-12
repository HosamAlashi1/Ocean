@extends('frontEnd.layouts.master')
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('title',App::getLocale() == 'ar' ? $data['meta_title_ar_terms'] :$data['meta_title_en_terms'] )
@section('description',App::getLocale() == 'ar' ? $data['meta_desc_ar_terms'] :$data['meta_desc_en_terms'] )
@section('content')
    <section class="content-section">
      <div class="container">
        <h2 class="page-title">{{App::getLocale() == 'ar' ? $data['term_title_ar'] :$data['term_title_en']}}</h2>
        <p class="page-pargh">
            {{App::getLocale() == 'ar' ? $data['term_desc_ar'] :$data['term_desc_en']}}
        </p>
        <div class="terms-content" style="color: #fff">
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
