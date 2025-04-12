@extends('frontedOld.layouts.master')
@section('title', __('front.error'))
@section('content')
    @php
        $data = \App\Models\Setting::whereIn('key_id', ['instagram', 'twitter','facebook', 'Linkedin','youtube'])->pluck('value', 'key_id')->toArray();
    @endphp
    <section class="error-404">
        <div class="error-container">
            <div class="error-number">
                <img src="{{asset('img/Error404.svg')}}" alt="404 Face">
            </div>
            <h2 class="error-message">{{__('front.Oops')}}!</h2>
            <p class="error-description">{{__('front.We can’t seem to find the page you are looking for')}}</p>
            <form action="{{route('front.index')}}" method="get">
                <button class="btn-home">{{__('front.Back to Homepage')}}</button>
            </form>
            <p class="error-follow">{{__('front.Follow us on')}}</p>
            <div class="social-icons-error">
                <a href="{{$data['instagram']}}"><img src="{{asset('img/InstagramIcon1.svg')}}" alt="Instagram"></a>
                <a href="{{$data['facebook']}}"><img src="{{asset('img/FacebookIcon1.svg')}}" alt="Facebook"></a>
                <a href="{{$data['Linkedin']}}"><img src="{{asset('img/LinkedinIcon1.svg')}}" alt="LinkedIn"></a>
                <a href="{{$data['twitter']}}"><img src="{{asset('img/X1.svg')}}" alt="Twitter"></a>
                <a href="{{$data['youtube']}}"><img src="{{asset('img/YoutubeIcon1.svg')}}" alt="YouTube"></a>
            </div>
        </div>
    </section>

@endsection
