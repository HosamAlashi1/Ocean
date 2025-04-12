@extends('frontEnd.layouts.master')
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('title',App::getLocale() == 'ar' ? $data['meta_title_ar_about'] :$data['meta_title_en_about'] )
@section('description',App::getLocale() == 'ar' ? $data['meta_desc_ar_about'] :$data['meta_desc_en_about'] )
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
@endsection
@section('content')

    <section class="content-section">
      <div class="container">
        <h2 class="page-title">  {{App::getLocale() == 'ar' ? $data['about_title1_ar'] :$data['about_title1_en']}}</h2>
        <p class="page-pargh">
            {{App::getLocale() == 'ar' ? $data['about_desc1_ar'] :$data['about_desc1_en']}}
        </p>
        <div class="team-section">
          <div class="team-content">
            <h3 class="team-head">{{App::getLocale() == 'ar' ? $data['about_title2_ar'] :$data['about_title2_en']}}</h3>
            <p class="team-pargh">
                {{App::getLocale() == 'ar' ? $data['about_desc2_ar'] :$data['about_desc2_en']}}
            </p>
          </div>
          <div class="team-img">
            <figure><img src="{{asset('frontEnd/images/about.jpg')}}" alt="team" /></figure>
          </div>
        </div>
        <div class="leader-section">
          <h3 class="team-head">{{App::getLocale() == 'ar' ? $data['team_title_ar'] :$data['team_title_en']}}</h3>
          <p class="page-pargh">
              {{App::getLocale() == 'ar' ? $data['team_desc_ar'] :$data['team_desc_en']}}
          </p>
          <div class="leader-cont">
              @foreach($members as $member)
                  <div class="leader-item">
                      <figure>
                          <img src="{{asset($member->image)}}" alt="{{$member->name_en}}" />
                      </figure>
                      <div class="leader-name">{{ App::getLocale() == 'ar' ? $member->name_ar : $member->name_en}}</div>
                      <span class="leader-desc">{{ App::getLocale() == 'ar' ? $member->job_name_ar : $member->job_name_en}}</span>
                  </div>
              @endforeach

          </div>
        </div>
      </div>
    </section>

@endsection
