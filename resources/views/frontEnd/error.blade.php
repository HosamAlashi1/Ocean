@extends('frontEnd.layouts.master')
@section('title', __('front.error'))
@section('content')
    <section class="error-404">
        <div class="container">
            <div class="contact-pargh">
                <img src="{{ asset('img/Error404.svg') }}" alt="404 Face" style="margin-bottom: 20px">

                <h2 class="error-message">{{ __('front.Oops') }}!</h2>
                <p class="error-description">{{ __('front.We can’t seem to find the page you are looking for') }}</p>
                <form action="{{ route('front.index') }}" method="get">
                    <button type="submit" class="submit-btn" style="width: 300px">{{ __('front.Back to Homepage') }}</button>
                </form>
            </div>

        </div>
    </section>
@endsection
