@extends('frontEnd.layouts.master')
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('title',App::getLocale() == 'ar' ? $data['meta_title_ar_contact'] :$data['meta_title_en_contact'] )
@section('description',App::getLocale() == 'ar' ? $data['meta_desc_ar_contact'] :$data['meta_desc_en_contact'] )
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

@endsection
@section('content')


    <section class="contact-section">
        <div class="container">
            <h2 class="page-title">
                {{App::getLocale() == 'ar' ? $data['connect_title_ar'] :$data['connect_title_en']}}

            </h2>
            <p class="contact-pargh">
                {{App::getLocale() == 'ar' ? $data['connect_desc_ar'] :$data['connect_desc_en']}}
            </p>
            <div class="contact-cont">
                <div class="contact-content">
                    <h4 class="contact-header">{{__('front.Let’s work together')}}</h4>
                    <p class="contact-text">
                        {{__('front.Fill up the form and our team will get back to you within 24 hours.')}}
                    </p>
                    <div class="contact-ancors">
                        <a class="contact-item" href="tel:{{$data['phone']}}">
                            <i class="fa-solid fa-mobile-button"></i>
                            <span>{{$data['phone']}}</span>
                        </a>
                        <div class="contact-info">
                            <a
                                class="contact-item"
                                href="mailto:{{$data['email_contact']}}"
                                style="text-decoration: underline"
                            >
                                <i class="fa-solid fa-envelope-open"></i>
                                <span>{{$data['email_contact']}}</span>
                            </a>
                        </div>
                        <div class="contact-info">
                            <a class="contact-item" href="{{$data['website']}}">
                                <i class="fa-light fa-globe"></i>
                                <span>{{$data['website']}}</span>
                            </a>
                        </div>
                        <div class="contact-info">
                            <a class="contact-item" href="#">
                                <i class="fa-light fa-location-dot"></i>
                                <span>
                      {!!$data['location']!!}
                                    {{--                      20 Al Khail Road,<br />Business Bay Tower,<br />Dubai,--}}
                                    {{--                    United Arab Emirates--}}
                  </span>
                            </a>
                        </div>
                    </div>
                    <h3 class="contact-info-head">{{__('front.Follow us')}}</h3>
                    <div class="contact-social">
                        <a href="{{$data['Linkedin']}}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="{{$data['instagram']}}">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="{{$data['facebook']}}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="{{$data['twitter']}}">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                    </div>
                </div>
                <form id="contactForm">
                    @csrf
                    <div class="contact-form">
                        <div class="form-group" ng-class="{'not-empty': userName.length}">
                            <input type="text" class="form-control" name="first-name" value="{{ old('first-name') }}"
                                   id="user" ng-model="userName" placeholder=" " />
                            <label for="user" class="animated-label">{{ __('front.First Name') }}</label>
                            <span id="first-name-error" class="col-form-label-sm text-danger"></span>
                        </div>
                        <div class="form-group" ng-class="{'not-empty': LastName.length}">
                            <input type="text" class="form-control" name="last-name" value="{{ old('last-name') }}"
                                   id="LastName" ng-model="LastName" placeholder=" " required/>
                            <label for="LastName" class="animated-label">{{ __('front.Last Name') }}</label>
                            <span id="last-name-error" class="col-form-label-sm text-danger"></span>
                        </div>
                        <div class="form-group" ng-class="{'not-empty': Mail.length}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required
                                   id="Mail" ng-model="Mail" placeholder=" "/>
                            <label for="Mail" class="animated-label">{{ __('front.Mail') }}</label>
                            <span id="email-error" class="col-form-label-sm text-danger"></span>
                        </div>
                        <div class="form-group" ng-class="{'not-empty': Phone.length}">
                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}"
                                   id="Phone" ng-model="Phone" placeholder=" " required/>
                            <label for="Phone" class="animated-label">{{ __('front.Phone') }}</label>
                            <span id="phone-error" class="col-form-label-sm text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group main-check">
                        <label class="main-check-label">{{ __('front.What service do you need?') }}</label>
                        <div class="check-group">
                            @foreach(\App\Models\Service::all() as $service)
                                <div class="check-width">
                                    <label class="check-label" style="font-size:17px">
                                        <input type="checkbox"  name="service[]" @if($service->id == old('service')) checked
                                               @endif value="{{ $service->id }}" />
                                        <span class="checkmark"></span>
                                        <span class="check-text">{{ App::getLocale() == 'ar' ? $service->name_ar : $service->name_en }}</span>
                                    </label>
                                </div>
                            @endforeach
                            <span id="service-error" class="col-form-label-sm text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('front.Message') }}</label>
                        <input type="text" class="form-input" name="message" value="{{ old('message') }}"
                               placeholder="{{ __('front.Write your message...') }}" required/>
                        <span id="message-error" class="col-form-label-sm text-danger"></span>
                    </div>
                    <button type="submit" class="submit-btn">{{ __('front.Send Message') }}</button>
                </form>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#contactForm').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('front.customer.store') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": $('input[name="_token"]').val(),
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: '{{__('front.Sent successfully')}}',
                            text: '{{__('front.Thank you for contacting us!')}}',
                            // confirmButtonText: 'موافق',
                            timer: 3000, // 3 ثواني
                            timerProgressBar: true,
                            showConfirmButton: false // إخفاء زر "موافق"
                        });

                        $('#contactForm')[0].reset();

                        // Add '/thank-you' to the current URL without refreshing the page
                        const currentUrl = window.location.href;
                        const newUrl = currentUrl.endsWith('/') ? `${currentUrl}thank-you` : `${currentUrl}/thank-you`;

                        // Update the browser's URL using pushState
                        history.pushState(null, '', newUrl);
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) { // خطأ التحقق من صحة البيانات
                        let errors = xhr.responseJSON.errors;

                        // تنظيف الأخطاء السابقة
                        $('.text-danger').text('');

                        // عرض الأخطاء الجديدة
                        for (let field in errors) {
                            $(`#${field}-error`).text(errors[field][0]);
                        }
                    } else {
                        console.error('Error:', error);
                    }
                    // console.error('Error:', error);
                }
            });
        });
    </script>
@endsection
