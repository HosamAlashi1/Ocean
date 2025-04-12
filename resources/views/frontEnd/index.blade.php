@extends('frontEnd.layouts.master')
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('title',LaravelLocalization::getCurrentLocale() == 'ar' ? $data['meta_title_ar_home'] :$data['meta_title_en_home'] )
@section('description',LaravelLocalization::getCurrentLocale() == 'ar' ? $data['meta_desc_ar_home'] :$data['meta_desc_en_home'] )

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

@endsection
@section('content')

    <main class="main-section">
      <div class="container">
        <div class="main-cont">
          <div class="main-content">
            <h1 class="main-title">
              <span> Effect</span> - {!! LaravelLocalization::getCurrentLocale() == 'ar' ? $data['main_title_ar1'] :$data['main_title_en1'] !!}
            </h1>
            <p class="main-pargh">
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['main_title_ar2'] :$data['main_title_en2']}}
            </p>
            <a href="{{route('front.contact')}}" class="main-btn">
              <span> {{__('front.Connect With Us')}} </span>
            </a>
            <div class="socials main-socials">
              <a href="{{$data['instagram']}}" target="_blank" class="social">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="{{$data['facebook']}}" target="_blank" class="social">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="{{$data['Linkedin']}}" target="_blank" class="social">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
              <a href="{{$data['twitter']}}" target="_blank" class="social">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
              <a href="{{$data['youtube']}}" target="_blank" class="social">
                <i class="fa-brands fa-youtube"></i>
              </a>
            </div>
          </div>
          <div class="main-gif">
            <figure>
              <img loding="lazy" src="{{asset('frontEnd/images/main-img.gif')}}" alt="gif" />
            </figure>
            <div class="socials main-socials">
              <a href="{{$data['instagram']}}" target="_blank" class="social">
                <i class="fa-brands fa-instagram"></i>
              </a>
              <a href="{{$data['facebook']}}" target="_blank" class="social">
                <i class="fa-brands fa-facebook-f"></i>
              </a>
              <a href="{{$data['Linkedin']}}" target="_blank" class="social">
                <i class="fa-brands fa-linkedin-in"></i>
              </a>
              <a href="{{$data['twitter']}}" target="_blank" class="social">
                <i class="fa-brands fa-x-twitter"></i>
              </a>
              <a href="{{$data['youtube']}}" target="_blank" class="social">
                <i class="fa-brands fa-youtube"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- End main -->
    <!-- Start services -->
    <section class="services-section" id="services">
      <div class="container">
        <h2 class="section-head">{{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['service_title_ar'] :$data['service_title_en']}}</h2>
        <p class="section-pargh">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['service_title_desc_ar'] :$data['service_title_desc_en']}}
        </p>
        <div class="services-cont">
            @foreach($services as $service)

          <div class="services-item" >
              <a href="{{route('front.service.show', ['id'=> $service->id , 'name' => $service->name_en ])}}">
            <figure class="services-icon">
              <img loding="lazy" src="{{asset($service->image)}}" alt="icon" />
            </figure>
            <h5 class="services-item-head">{{LaravelLocalization::getCurrentLocale()== 'ar' ? $service->name_ar :$service->name_en}}</h5>
            <p class="services-item-pargh">
                {{LaravelLocalization::getCurrentLocale()== 'ar' ? $service->desc_ar :$service->desc_en}}
            </p>
              </a>
          </div>

            @endforeach

        </div>
      </div>
    </section>
    <!-- End services -->
    <!-- Start partners -->
    <section class="partners-section">
      <div
        class="partners-bg"
        style="background-image: url({{asset('frontEnd/images/partners/partners-bg.png')}})"
      ></div>
      <div class="container">
        <div class="partners-cont">
          <div class="partners-content">
            <h2 class="partners-title" data-sal="slide-up" data-sal-delay="150">
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['company_title_ar'] :$data['company_title_en']}}
            </h2>
            <p class="partners-pargh">
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['company_desc_ar'] :$data['company_desc_en']}}
            </p>
          </div>
          <div class="partners-imgs">
              @foreach($companies as $companie)
                  <figure class="partners-figure"
                          data-sal="zoom-in"
                          data-sal-delay="150">
                      <img loding="lazy" src="{{asset($companie->image)}}" alt="partners-img"/>
                  </figure>
              @endforeach

          </div>
        </div>
      </div>
    </section>
    <!-- End partners -->
    <!-- Start design -->
    <section class="design-section">
      <div class="container">
        <div class="design-cont">
          <figure class="design-img" data-sal="zoom-in" data-sal-delay="150">
            <img loding="lazy" src="{{asset($data['about_image'])}}" alt="design-img" />
          </figure>
          <div class="design-content">
            <h2 class="design-head">
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['about_title_ar'] :$data['about_title_en']}}
            </h2>
            <p class="design-pargh">
                {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['about_desc_ar'] :$data['about_desc_en']}}
            </p>
            <a href="{{route('front.about')}}" class="custom-ancor">{{__('front.About us')}}</a>
          </div>
        </div>
      </div>
    </section>
    <!-- End design -->
    <!-- Start process -->
    <section class="process-section">
      <div class="container">
        <h2 class="process-head" data-sal="slide-left" data-sal-delay="150">{{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['process_title_ar'] :$data['process_title_en']}}</h2>
        <p class="process-pargh">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['process_desc_ar'] :$data['process_desc_en']}}
        </p>
          <div class="process-graph">
              @foreach($processes as $process)
          <div class="process-item">
            <span>{{LaravelLocalization::getCurrentLocale()== 'ar' ? $process->name_ar :$process->name_en}}</span>

            <figure>
              <img loding="lazy" src="{{asset($process->image)}}" alt="icon" />
            </figure>
            <p class="process-item-pargh">
                {{LaravelLocalization::getCurrentLocale()== 'ar' ? $process->desc_ar :$process->desc_en}}
            </p>
          </div>
              @endforeach

          <div class="process-gif">
            <img
              loding="lazy"
              src="{{asset($data['process_image'])}}"
              alt="process-gif"
            />
          </div>
        </div>
      </div>
    </section>
    <!-- End process -->
    <!-- Start work -->
    <section class="work-section" id="work">
      <div class="container">
        <h2 class="section-head" data-sal="slide-left" data-sal-delay="150">{{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['works_title_ar'] :$data['works_title_en']}}</h2>
        <div class="wotk-cont">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            @foreach($services_work as $service_work)
            <li class="nav-item" role="presentation">
              <button
                class="nav-link {{ $loop->first ? 'active' : ''}}"
                id="pills-{{$service_work->id}}-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-{{$service_work->id}}"
                type="button"
                role="tab"
                aria-controls="pills-{{$service_work->id}}"
                aria-selected="true"
              >
                {{LaravelLocalization::getCurrentLocale()== 'ar' ? $service_work->name_ar :$service_work->name_en}}
              </button>
            </li>
              @endforeach

          </ul>
          <div class="tab-content" id="pills-tabContent">
              @foreach($services_work as $service_work)
            <div
              class="tab-pane fade {{ $loop->first ? 'show active' : ''}}"
              id="pills-{{$service_work->id}}"
              role="tabpanel"
              aria-labelledby="pills-{{$service_work->id}}-tab"
              tabindex="0"
            >

              <div class="work-tab">
                  @foreach($service_work->works as $work)
                <a href="{{route('front.service.show', ['id'=> $service_work->id , 'name' => $service_work->name_en])}}" class="work-item">
                  <figure>
                    <img
                      loding="lazy"
                      src="{{asset($work->images->first()->image)}}"
                      alt="work-sample"
                    />
                  </figure>
                  <div class="work-hover">
                    <span>
                        {{__('front.Details')}}
                    </span>
                  </div>
                </a>
                    @endforeach

              </div>
            </div>
              @endforeach



            <div
              class="tab-pane fade"
              id="pills-marketing"
              role="tabpanel"
              aria-labelledby="pills-marketing-tab"
              tabindex="0"
            >

            </div>

            <div
              class="tab-pane fade"
              id="pills-design"
              role="tabpanel"
              aria-labelledby="pills-design-tab"
              tabindex="0"
            >
            </div>

            <div
              class="tab-pane fade"
              id="pills-programming"
              role="tabpanel"
              aria-labelledby="pills-programming-tab"
              tabindex="0"
            >
              ...
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End work -->
    <!-- End testimonials -->
    <section class="testimonials-section">
      <div class="container">
        <h2 class="testimonials-head"
            data-sal="slide-left"
            data-sal-delay="150">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['satisfy_title_ar'] :$data['satisfy_title_en']}}

        </h2>
        <div class="testimonials-slider">
          <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($clients as $client)
              <div class="swiper-slide">
                <div class="testimonials-cont">
                  <div class="testimonials-img">
                    <figure>
                      <img src="{{ asset($client->image) }}" alt="client" />
                    </figure>
                    <i class="fa-solid fa-quote-left"></i>
                  </div>
                  <div class="testimonials-title">{{LaravelLocalization::getCurrentLocale()== 'ar' ? $client->name_ar :$client->name_en}}</div>
                  <div class="testimonials-job">{{LaravelLocalization::getCurrentLocale()== 'ar' ? $client->nick_name_ar :$client->nick_name_en}}</div>
                  <p class="testimonials-pargh">
                      {{LaravelLocalization::getCurrentLocale()== 'ar' ? $client->content_ar :$client->content_en}}
                  </p>
                </div>
              </div>
                @endforeach


            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
    <!-- End testimonials -->
    <!-- Start contact  -->
    <section class="contact-section">
      <div class="container">
        <h2 class="section-head" data-sal="slide-left" data-sal-delay="150">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['connect_title_ar'] :$data['connect_title_en']}}
        </h2>
        <p class="contact-pargh">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['connect_desc_ar'] :$data['connect_desc_en']}}

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
                    <span class="check-text">{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $service->name_ar : $service->name_en }}</span>
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
    <!-- End contact  -->
    <!-- Start faq  -->
    <section class="faq-section"  id="FAQs">
      <div class="container">
        <h2 class="section-head" data-sal="slide-up" data-sal-delay="150">
            {{LaravelLocalization::getCurrentLocale() == 'ar' ? $data['questions_title_ar'] :$data['questions_title_en']}}
        </h2>
        <div class="gruop-collase">
{{--            color_toggle inactive--}}
            @foreach($questions as $question)
          <div class="collapse_parant">
            <div class="group_collapse">
              <button class="btn_collapse_ {{ $loop->first ? 'color_toggle inactive' : '' }} ">
                <span>{{LaravelLocalization::getCurrentLocale()== 'ar' ? $question->question_ar :$question->question_en}}</span>
                <div class="icon-wrapper {{ $loop->first ? 'is-active' : '' }}">
                  <i class="fa-solid fa-arrow-down-right"></i>
                </div>
              </button>
              <div class="toggle_collapse  {{ $loop->first ? 'open-collapse' : '' }}">
                  {{LaravelLocalization::getCurrentLocale()== 'ar' ? $question->answer_ar :$question->answer_en}}
              </div>
            </div>
          </div>
            @endforeach




          <div class="collapse_parant">
            <div class="faq-item">
              <h3>{{__('front.Do You Have Querries?')}}</h3>
              <a href="#" class="faq-ancor">{{__('front.Get In Touch')}}</a>
            </div>
          </div>

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
