@php use Illuminate\Support\Facades\App; @endphp
@extends('frontedOld.layouts.master')
@section('title', __('front.About Us'))
@section('content')
    @php
        $data = \App\Models\Setting::whereIn('key_id', ['about_title1_ar', 'about_title1_en','about_desc1_ar', 'about_desc1_en','about_title2_ar','about_title2_en','about_desc2_ar','about_desc2_en','team_title_ar','team_title_en','team_desc_ar','team_desc_en'])->pluck('value', 'key_id')->toArray();
    @endphp
    <section class="about-page-section">
        <div class="about-page-container">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['about_title1_ar'] :$data['about_title1_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['about_desc1_ar'] :$data['about_desc1_en']}}</p>
        </div>
    </section>

    <section class="dynamic-team-section">
        <div class="about-page-container">
            <div class="team-intro">
                <h3>{{App::getLocale() == 'ar' ? $data['about_title2_ar'] :$data['about_title2_en']}}</h3>
                <p>{{App::getLocale() == 'ar' ? $data['about_desc2_ar'] :$data['about_desc2_en']}}</p>
            </div>
        </div>
    </section>

    <section class="leadership-team-section">
        <div class="about-page-container">
            <h3 class="section-title">{{App::getLocale() == 'ar' ? $data['team_title_ar'] :$data['team_title_en']}}</h3>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['team_desc_ar'] :$data['team_desc_en']}}</p>

            <div class="leadership-grid">
                @foreach($members as $member)
                    <div class="leader-card">
                        <img src="{{asset($member->image)}}" alt="{{$member->name_en}}">
                        <h4>{{ App::getLocale() == 'ar' ? $member->name_ar : $member->name_en}}</h4>
                        <span>{{ App::getLocale() == 'ar' ? $member->job_name_ar : $member->job_name_en}}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
