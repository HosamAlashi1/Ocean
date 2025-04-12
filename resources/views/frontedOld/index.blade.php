@extends('frontedOld.layouts.master')
@section('title', 'Effect')
@section('css')
    <style>
        .testimonial-user-img,
        #testimonial-content,
        #testimonial-user-name,
        #testimonial-user-nick,
        .testimonial-stars img {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.4s ease-out, transform 0.4s ease-out;
        }

        .testimonial-user-img.active,
        #testimonial-content.active,
        #testimonial-user-name.active,
        #testimonial-user-nick.active,
        .testimonial-stars img.active {
            opacity: 1;
            transform: translateY(0);
        }


        .highlight-box {
            width: fit-content;
            height: fit-content;
            white-space: nowrap;
        }

        .process-container {
            display: flex;
            align-items: stretch; /* اجعل العناصر الفرعية تمتد لطول الحاوية */
        }

        .process-image,
        .process-content {
            /* flex: 1; اجعل كل جزء يأخذ نفس النسبة من العرض */
            height: auto;
        }

        .process-content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }


<<<<<<< HEAD:resources/views/frontedOld/index.blade.php
        .image-group img {
=======
        .image-group img{
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/index.blade.php
            object-fit: contain
        }


        /* Fullscreen overlay for modal */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        /* Fullscreen overlay for modal */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 1000;
        }

        /* Popup modal styling */
        .popup-modal {
            background-color: #ffffff;
            padding: 60px;
            width: 500px;
            max-width: 80%;
            text-align: center;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.3);
            transform: scale(0.8);
            transition: transform 0.4s ease, opacity 0.4s ease;
            opacity: 0;
        }

        /* Success icon styling and animation */
        .success-icon {
            margin-bottom: 20px;
            animation: pop-in 0.4s ease;
        }

        @keyframes pop-in {
            0% {
                transform: scale(0);
            }
            70% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Show modal animation */
        .show-modal {
            opacity: 1;
        }

        .show-modal .popup-modal {
            opacity: 1;
            transform: scale(1);
        }

        /* Popup content styles */
        .popup-modal p {
            font-size: 1.8em;
            color: #333;
            margin-top: 15px;
        }

        .popup-modal .success-icon svg {
            fill: #4CAF50;
            width: 100px;
            height: 100px;
        }
<<<<<<< HEAD:resources/views/frontedOld/index.blade.php


=======


        .company-slider {
            display: flex;
            justify-content: space-around;
            align-items: center;
            overflow: hidden; /* Hide overflowing content during transitions */
            position: relative;
            transform: translateX(0);
            transition: transform 0.5s ease , opacity 0.5s ease; /* Smooth sliding effect */
        }

        .company-logo {
            flex-shrink: 0;
            margin: 0 30px; /* Add spacing between logos */
        }




        .btn-primary-service ,.btn-primary-service:focus ,.btn-primary-service:hover {
            width : max-content !important;
        }

>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/index.blade.php
    </style>
@endsection
@php
    $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
@endphp
@section('content')
    <section class="hero-section">
        <div class="hero-container fadeInUp">
            <div class="highlight-box fadeInUp">
                <div class="round"></div>
                "<span>Effect</span>: {{App::getLocale() == 'ar' ? $data['main_title_ar1'] :$data['main_title_en1']}}"
            </div>
            <h1 class="hero-title">
                "<span>Effect</span>" - {{App::getLocale() == 'ar' ? $data['main_title_ar2'] :$data['main_title_en2']}}
            </h1>
            <p class="hero-subtitle">
                {{App::getLocale() == 'ar' ? $data['main_title_ar3'] :$data['main_title_en3']}}
            </p>
            <div class="hero-buttons">
                <a href="{{route('front.contact')}}" class="btn btn-primary-hero">{{__('front.Connect With Us')}}</a>

                <a href="https://wa.me/{{$data['whatsApp']}}" target="_blank" class="btn btn-primary-hero">{{__('front.Get Free Consultation')}}</a>
                <a href="{{route('front.services')}}" class="btn btn-secondary-hero">{{__('front.Browse Our Works')}}</a>

            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="services-container fadeInUp">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['service_title_ar'] :$data['service_title_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['service_title_desc_ar'] :$data['service_title_desc_en']}}</p>

            <div class="services-grid fadeInUp">
                <!-- Service Card 1 -->
                @foreach($services as $service)
                    <div class="service-card">
                        <div class="service-icon">
                            <img src="{{asset($service->image)}}" alt="Mobile App Design Icon">
                        </div>
                        <h3 class="service-title">{{App::getLocale()== 'ar' ? $service->name_ar :$service->name_en}}</h3>
                        <p class="service-description">{{App::getLocale()== 'ar' ? $service->desc_ar :$service->desc_en}}</p>
                        <div class="service-buttons">
<<<<<<< HEAD:resources/views/frontedOld/index.blade.php
                            <a href="{{route('front.contact')}}"
                               class="btn-primary-service">{{__('front.Connect now')}}</a>
                            <a href="{{route('front.services',$service->id)}}"
                               class="btn-secondary-service">{{__('front.Our Works')}}</a>
=======
                            <a href="{{route('front.contact')}}" class="btn-primary-service">{{__('front.Request service now')}}</a>
                            <a href="{{route('front.services',$service->id)}}" class="btn-secondary-service">{{__('front.Our Works')}}</a>
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/index.blade.php
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <section class="companies-section">
        <div class="companies-container fadeInUp">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['company_title_ar'] : $data['company_title_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['company_desc_ar'] : $data['company_desc_en']}}</p>
            <div class="companies-logos fadeInUp">
                <!-- Default structure for large screens -->
                <div class="company-row">
                    @foreach($firstFourCompanies as $company)
                        <div class="company-logo rounded-circle">
                            <img class="rounded-circle" src="{{ asset($company->image) }}" alt="company image">
                        </div>
                    @endforeach
                </div>
                <div class="company-row">
                    @foreach($remainingCompanies as $company)
                        <div class="company-logo logo-container">
                            <img class="rounded-circle" src="{{ asset($company->image) }}" alt="company image">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="process-section">
        <div class="process-container fadeInUp">
            <!-- Left side: Image -->
            <div class="process-image">
                <img src="{{asset($data['process_image'])}}" height="750px" alt="Workstation image">
            </div>

            <!-- Right side: Process steps -->
            <div class="process-content">
                <h2 class="process-section-title">{{App::getLocale() == 'ar' ? $data['process_title_ar'] :$data['process_title_en']}}</h2>
                <p class="process-section-subtitle">
                    {{App::getLocale() == 'ar' ? $data['process_desc_ar'] :$data['process_desc_en']}}
                </p>
                <div class="process-steps" style=" height: fit-content;">
                    @foreach($processes as $process)
                        <div class="process-step">
                            <div class="step-icon discovery">
                                <img height="55px" width="55px" src="{{asset($process->image)}}" alt="Discovery icon">
                            </div>
                            <div class="step-content">
                                <h3>{{App::getLocale()== 'ar' ? $process->name_ar :$process->name_en}}</h3>
                                <p>{{App::getLocale()== 'ar' ? $process->desc_ar :$process->desc_en}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="portfolio-section">
        <div class="portfolio-container fadeInUp">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['works_title_ar'] :$data['works_title_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['works_desc_ar'] :$data['works_desc_en']}}</p>
            <div class="portfolio-grid">
                @foreach($works as $work)
                    <div class="portfolio-item">
                        <h3>{{App::getLocale()== 'ar' ? $work->title_ar :$work->title_en}}</h3>

                        <!-- Main Image -->
                        <div class="main-image">
                            <img style="height: 300px" id="mainImage-{{ $loop->index }}"
                                 src="{{ asset($work->images[0]->image) }}" alt="Project Image {{ $loop->index + 1 }}">
                        </div>

                        <!-- Thumbnails -->
                        <div class="thumbnail-list" id="thumbnailList-{{ $loop->index }}">
                            @foreach($work->images->take(4) as $index => $thumb)
                                <img src="{{ asset($thumb->image) }}"
                                     alt="Thumb {{ $loop->parent->index + 1 }}"
                                     class="{{ $index == 0 ? 'active-thumbnail' : '' }}"
                                     onclick="changeMainImage('{{ asset($thumb->image) }}', 'mainImage-{{ $loop->parent->index }}', 'thumbnailList-{{ $loop->parent->index }}', this)">
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
        <form action="{{route('front.services')}}" method="get">
            @csrf
            <button class="btn-primary">{{__('front.See All Projects')}}</button>
        </form>

        </div>
    </section>
    <section class="about-section">
        <div class="about-container fadeInUp">
            <div class="about-image">
                <img height="300px" src="{{asset($data['about_image'])}}" alt="Creative Team">
            </div>
            <div class="about-content">
                <h1>{{App::getLocale() == 'ar' ? $data['about_title_ar'] :$data['about_title_en']}}</h1>
                <p>{{App::getLocale() == 'ar' ? $data['about_desc_ar'] :$data['about_desc_en']}}</p>
                <form action="{{route('front.about')}}" method="get">
                    @csrf
                    <button class="about-button">{{__('front.About us')}}</button>
                </form>
            </div>
        </div>
    </section>
    <section class="testimonial-section">
        <div class="testimonial-container fadeInUp">
            <div class="testimonial-text">
                <h1>{{App::getLocale() == 'ar' ? $data['satisfy_title_ar'] :$data['satisfy_title_en']}}</h1>

                <div class="testimonial-stars" id="testimonial-stars">
                    @for($i = 1; $i <= $clients->first()->ranked; $i++)
                        <img src="{{ asset('img/Star.svg') }}" alt="star">
                    @endfor
                </div>

                <p id="testimonial-content">{{App::getLocale()== 'ar' ? $clients->first()->content_ar :$clients->first()->content_en}}</p>

                <div class="testimonial-info">
                    <div class="testimonial-user">
                        <img id="testimonial-user-img" src="{{ asset($clients->first()->image) }}" alt="User Image"
                             class="testimonial-user-img">
                        <div>
                            <h3 id="testimonial-user-name">{{App::getLocale()== 'ar' ? $clients->first()->name_ar :$clients->first()->name_en}}</h3>
                            <p id="testimonial-user-nick">{{App::getLocale()== 'ar' ? $clients->first()->nick_name_ar :$clients->first()->nick_name_en}}</p>
                        </div>
                    </div>

                    <div class="testimonial-arrows">
                        <button id="arrow-left" class="arrow-left disabled"><img src="{{ asset('img/ArrowLeft.svg') }}"
                                                                                 alt="arrow"/></button>
                        <button id="arrow-right" class="arrow-right"><img src="{{ asset('img/ArrowRight.svg') }}"
                                                                          alt="arrow"/></button>
                    </div>
                </div>
            </div>
            <div class="testimonial-images">
                <div class="image-group">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image1'])}}" alt="Testimonial 1"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image2'])}}" alt="Testimonial 2"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image3'])}}" alt="Testimonial 3"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image4'])}}" alt="Testimonial 4"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image5'])}}" alt="Testimonial 5"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image6'])}}" alt="Testimonial 6"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image7'])}}" alt="Testimonial 7"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image8'])}}" alt="Testimonial 6"
                         class="floating-img">
                    <img height="100px" width="100px" src="{{asset($data['satisfy_image9'])}}" alt="Testimonial 7"
                         class="floating-img">
                </div>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-container fadeInUp">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['connect_title_ar'] :$data['connect_title_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['connect_desc_ar'] :$data['connect_desc_en']}}</p>
            <div class="contact-item">
                <!-- Contact Information -->
                <div class="contact-info">
                    <div class="circle-design"></div>
                    <h2>{{__('front.Contact Information')}}</h2>
                    <p>{{__('front.Fill up the form and our team will get back to you within 24 hours.')}}</p>

                    <ul class="contact-info-list">
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/PhoneIcon.svg')}}" alt="Phone Icon" class="icon">
                            </div>
                            <span class="contact-text">{{$data['phone']}}</span>
                        </li>
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/EmailIcon.svg')}}" alt="Email Icon" class="icon">
                            </div>
                            <a href="{{$data['email_contact']}}" target="_blank"
                               class="contact-text">{{$data['email_contact']}}</a>
                        </li>
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/WebsiteIcon.svg')}}" alt="Website Icon" class="icon">
                            </div>
                            <a href="{{$data['website']}}" target="_blank" class="contact-text">{{$data['website']}}</a>
                        </li>
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/LocationIcon.svg')}}" alt="Location Icon" class="icon">
                            </div>
                            <span class="contact-text">{{$data['location']}}</span>
                        </li>
                    </ul>
                    <h3>Follow us</h3>
                    <div class="social-contact-icons">
                        <a href="{{$data['Linkedin']}}" target="_blank"><img src="{{asset('img/LinkedinIcon.svg')}}"
                                                                             alt="LinkedIn"></a>
                        <a href="{{$data['instagram']}}" target="_blank"><img src="{{asset('img/InstagramIcon.svg')}}"
                                                                              alt="Instagram"></a>
                        <a href="{{$data['facebook']}}" target="_blank"><img src="{{asset('img/FacebookIcon.svg')}}"
                                                                             alt="Facebook"></a>
                        <a href="{{$data['twitter']}}" target="_blank"><img src="{{asset('img/X.svg')}}" alt="Twitter"></a>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="contact-form">
                    <form id="contactForm">
                        @csrf
                        <div class="form-group">
                            <div class="input-box">
                                <label for="first-name">{{ __('front.First Name') }}</label>
                                <input type="text" id="first-name" name="first-name" value="{{ old('first-name') }}"
                                       required>
                                @error('first-name')
                                <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <label for="last-name">{{ __('front.Last Name') }}</label>
                                <input type="text" id="last-name" name="last-name" value="{{ old('last-name') }}"
                                       required>
                                @error('last-name')
                                <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-box">
                                <label for="email">{{ __('front.Mail') }}</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box">
                                <label for="phone">{{ __('front.Phone') }}</label>
                                <input value="{{ old('phone') }}" type="number" id="phone" name="phone">
                                @error('phone')
                                <span class="col-form-label-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group-column">
                            <label for="service">{{ __('front.What service do you need?') }}</label>
                            <div class="radio-group">
                                @foreach(\App\Models\Service::all() as $service)
                                    <label class="custom-radio">
                                        <input type="radio" name="service" @if($service->id == old('service')) checked
                                               @endif value="{{ $service->id }}">
                                        <span class="radio-text">{{ App::getLocale() == 'ar' ? $service->name_ar : $service->name_en }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @if($errors->has('service'))
                                <span class="col-form-label-sm text-danger">{{ $errors->first('service') }}</span>
                            @endif
                        </div>
                        <div class="form-group-column">
                            <label for="message">{{ __('front.Message') }}</label>
                            <textarea id="message" name="message" rows="1" placeholder="Write your message..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                            <span class="col-form-label-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">{{ __('front.Send Message') }}</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        </div>
    </section>
    <section class="faq-section">
        <div class="faq-container fadeInUp">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['questions_title_ar'] :$data['questions_title_en']}}</h2>
            <p class="section-subtitle">{{App::getLocale() == 'ar' ? $data['questions_desc_ar'] :$data['questions_desc_en']}}</p>

            @foreach($questions as $question)
                <div class="faq-item">
                    <button class="faq-question">
                        {{App::getLocale()== 'ar' ? $question->question_ar :$question->question_en}}
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p>{{App::getLocale()== 'ar' ? $question->answer_ar :$question->answer_en}}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <!-- Popup modal -->
    <div id="popupOverlay" class="popup-overlay" style="display: none;">
        <div id="popupModal" class="popup-modal">
            <div class="success-icon">
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 15-5-5 1.414-1.414L11 13.172l6.586-6.586L19 8l-8 8z" fill="#4CAF50"/>
                </svg>
            </div>
            <p>{{__('messages.send message successfully.')}}</p>
            <span class="text-muted">{{__('messages.Thanks for contacting us!')}}</span>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function changeMainImage(imageUrl, mainImageId, thumbnailListId, clickedThumbnail) {
            const mainImage = document.getElementById(mainImageId);

            // Fade out the current main image
            mainImage.classList.add('fade-out');

            // Define a timeout as a fallback
            const fallbackTimeout = setTimeout(() => {
                mainImage.classList.remove('fade-out');
                mainImage.src = imageUrl;
            }, 500); // Adjust duration if needed

            // Change the image source after the fade-out transition ends
            mainImage.addEventListener('transitionend', function onFadeOut() {
                clearTimeout(fallbackTimeout); // Clear fallback
                mainImage.src = imageUrl;

                // Remove the fade-out class and fade in the new image
                mainImage.classList.remove('fade-out');

                // Clean up the event listener
                mainImage.removeEventListener('transitionend', onFadeOut);
            });

            // Get the thumbnail list and remove the 'active-thumbnail' class from all images
            const thumbnailList = document.getElementById(thumbnailListId);
            const thumbnails = thumbnailList.getElementsByTagName('img');
            for (let thumb of thumbnails) {
                thumb.classList.remove('active-thumbnail');
            }

            // Add the 'active-thumbnail' class to the clicked thumbnail
            clickedThumbnail.classList.add('active-thumbnail');
        }
    </script>

    <script>
        document.querySelectorAll('.faq-question').forEach((question) => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('.faq-icon');

                // Toggle the 'show' class to animate answer visibility
                answer.classList.toggle('show');

                // Toggle the icon rotation for '+' and '×' effect
                icon.classList.toggle('rotate');

                // Change the icon text based on the 'show' state
                icon.textContent = icon.classList.contains('rotate') ? '×' : '+';
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const clients = @json($clients);
            let currentIndex = 0;

            const contentEl = document.getElementById('testimonial-content');
            const starsEl = document.getElementById('testimonial-stars');
            const userImgEl = document.getElementById('testimonial-user-img');
            const userNameEl = document.getElementById('testimonial-user-name');
            const userNickEl = document.getElementById('testimonial-user-nick');

            const arrowLeft = document.getElementById('arrow-left');
            const arrowRight = document.getElementById('arrow-right');

            function updateClient(index) {
                const client = clients[index];

                // Slide out current content smoothly
                contentEl.classList.remove('active');
                userImgEl.classList.remove('active');
                userNameEl.classList.remove('active');
                userNickEl.classList.remove('active');
                starsEl.classList.remove('active');

                setTimeout(() => {
                    // Update the content once exiting animation finishes
                    const isArabic = "{{ app()->getLocale() === 'ar' }}";

                    contentEl.textContent = isArabic ? client.content_ar : client.content_en;
                    userImgEl.src = "{{ asset('') }}" + client.image;
                    userNameEl.textContent = isArabic ? client.name_ar : client.name_en;
                    userNickEl.textContent = isArabic ? client.nick_name_ar : client.nick_name_en;


                    // Update stars with a staggered bounce effect
                    starsEl.innerHTML = '';
                    for (let i = 0; i < client.ranked; i++) {
                        const star = document.createElement('img');
                        star.src = "{{ asset('img/Star.svg') }}";
                        star.alt = 'star';
                        starsEl.appendChild(star);

                        // Add active class with a staggered delay for each star
                        setTimeout(() => {
                            star.classList.add('active');
                        }, i * 100);
                    }

                    // Slide in the new content
                    setTimeout(() => {
                        contentEl.classList.add('active');
                        userImgEl.classList.add('active');
                        userNameEl.classList.add('active');
                        userNickEl.classList.add('active');
                        starsEl.classList.add('active');
                    }, 100); // Delay to ensure smooth transition

                }, 500); // Duration for the exit animation

                // Adjust button classes
                if (index === 0) {
                    arrowLeft.className = 'arrow-left';
                    arrowRight.className = 'arrow-right';
                } else if (index === clients.length - 1) {
                    arrowLeft.className = 'arrow-right';
                    arrowRight.className = 'arrow-left';
                } else {
                    arrowLeft.className = 'arrow-right';
                    arrowRight.className = 'arrow-right';
                }
            }

            // Click event handlers for navigation
            arrowLeft.addEventListener('click', function () {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateClient(currentIndex);
                }
            });

            arrowRight.addEventListener('click', function () {
                if (currentIndex < clients.length - 1) {
                    currentIndex++;
                    updateClient(currentIndex);
                }
            });

            // Initialize with the first client
            updateClient(currentIndex);
        });

    </script>

    <!-- Include jQuery from a CDN or a local file -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Your custom script should come after jQuery -->
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
<<<<<<< HEAD:resources/views/frontedOld/index.blade.php
                        const overlay = $('#popupOverlay');
                        overlay.css('display', 'flex').addClass('show-modal');

                        setTimeout(() => {
                            overlay.removeClass('show-modal');
                            setTimeout(() => {
                                overlay.css('display', 'none');
                            }, 500);
                        }, 3000);

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
                    console.error('Error:', error);
                }
            });
=======
                        // Clear all previous error messages
                        $('.text-danger').remove();

                        // Reset the form and radio buttons
                        $('#contactForm')[0].reset();

                        // Show success modal
                        const overlay = $('#popupOverlay');
                        overlay.css('display', 'flex').addClass('show-modal');

                        setTimeout(() => {
                            overlay.removeClass('show-modal');
                            setTimeout(() => {
                                overlay.css('display', 'none');
                            }, 500);
                        }, 3000);

                        // Update URL without refreshing
                        const currentUrl = window.location.href;
                        const newUrl = currentUrl.endsWith('/') ? `${currentUrl}thank-you` : `${currentUrl}/thank-you`;
                        history.pushState(null, '', newUrl);
                    } else {
                        alert("An error occurred. Please try again.");
                    }
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) { // Laravel validation error
                        const errors = xhr.responseJSON.errors;

                        // Clear any previous error messages
                        $('.text-danger').remove();

                        // Loop through errors and display them
                        for (const [key, messages] of Object.entries(errors)) {
                            const inputField = $(`[name="${key}"]`);
                            if (inputField.length) {
                                inputField.last().after(`<span class="col-form-label-sm text-danger">${messages[0]}</span>`);
                            }
                        }
                    } else {
                        console.error('Error:', error);
                        alert('An unexpected error occurred. Please try again.');
                    }
                }

            });
        });


    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let currentIndex = 0;
            let slideInterval;

            function adjustCompanyLayout() {
                const companiesSection = document.querySelector(".companies-section");
                const companiesLogos = companiesSection.querySelector(".companies-logos");

                if (window.innerWidth < 768) {
                    if (!companiesLogos.classList.contains("small-screen")) {
                        companiesLogos.classList.add("small-screen");

                        const allCompanies = Array.from(companiesLogos.querySelectorAll(".company-logo"));
                        const sliderCompanies = [...allCompanies];
                        companiesLogos.innerHTML = "";

                        const sliderContainer = document.createElement("div");
                        sliderContainer.classList.add("company-slider");
                        companiesLogos.appendChild(sliderContainer);

                        sliderCompanies.slice(0, 2).forEach(company => sliderContainer.appendChild(company));

                        startAutoSlider(sliderContainer, sliderCompanies);
                    }
                } else {
                    if (companiesLogos.classList.contains("small-screen")) {
                        companiesLogos.classList.remove("small-screen");
                        stopAutoSlider();

                        const sliderContainer = companiesLogos.querySelector(".company-slider");
                        const allCompanies = Array.from(sliderContainer.children);

                        companiesLogos.innerHTML = "";
                        const firstRow = document.createElement("div");
                        firstRow.classList.add("company-row");
                        const secondRow = document.createElement("div");
                        secondRow.classList.add("company-row");

                        allCompanies.forEach((company, index) => {
                            if (index < 4) {
                                firstRow.appendChild(company);
                            } else {
                                secondRow.appendChild(company);
                            }
                        });

                        companiesLogos.appendChild(firstRow);
                        companiesLogos.appendChild(secondRow);
                    }
                }
            }

            function startAutoSlider(sliderContainer, sliderCompanies) {
                currentIndex = 0;

                slideInterval = setInterval(() => {
                    // Apply slide-to-right effect
                    sliderContainer.style.transform = "translateX(25%)";
                    sliderContainer.style.opacity = "0";

                    setTimeout(() => {
                        // Reset position and update content
                        sliderContainer.style.transition = "none"; // Disable transition temporarily
                        sliderContainer.style.transform = "translateX(-25%)";

                        setTimeout(() => {
                            // Clear the current slider content
                            sliderContainer.innerHTML = "";

                            // Determine the next two companies to display
                            const nextCompanies = sliderCompanies.slice(currentIndex, currentIndex + 2);
                            if (nextCompanies.length < 2) {
                                nextCompanies.push(...sliderCompanies.slice(0, 2 - nextCompanies.length));
                            }

                            // Append the next companies to the slider
                            nextCompanies.forEach(company => sliderContainer.appendChild(company));

                            // Slide back to center with transition
                            sliderContainer.style.transition = "transform 0.5s ease , opacity 0.5s easecd ";
                            sliderContainer.style.transform = "translateX(0)";
                            sliderContainer.style.opacity = "1";
                        }, 50); // Allow DOM update before applying the slide-in effect
                    }, 500); // Match with CSS transition duration

                    // Update the index
                    currentIndex += 2;
                    if (currentIndex >= sliderCompanies.length) {
                        currentIndex = 0;
                    }
                }, 5000);
            }

            function stopAutoSlider() {
                clearInterval(slideInterval);
            }

            adjustCompanyLayout();
            window.addEventListener("resize", adjustCompanyLayout);
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/index.blade.php
        });
    </script>

@endsection
