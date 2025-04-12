@extends('frontedOld.layouts.master')
@section('title', __('front.Contact us'))
@section('css')
    <style>

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

    </style>
@endsection
@section('content')
    @php
        $data = \App\Models\Setting::pluck('value', 'key_id')->toArray();
    @endphp
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
                            <a href="{{$data['email_contact']}}" class="contact-text">{{$data['email_contact']}}</a>
                        </li>
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/WebsiteIcon.svg')}}" alt="Website Icon" class="icon">
                            </div>
                            <a href="{{$data['website']}}" class="contact-text">{{$data['website']}}</a>
                        </li>
                        <li>
                            <div class="icon-circle">
                                <img src="{{asset('img/LocationIcon.svg')}}" alt="Location Icon" class="icon">
                            </div>
                            <span class="contact-text">{{$data['location']}}</span>
                        </li>
                    </ul>
                    <h3>{{__('front.Follow us')}}</h3>
                    <div class="social-contact-icons">
                        <a href="{{$data['Linkedin']}}"><img src="{{asset('img/LinkedinIcon.svg')}}" alt="LinkedIn"></a>
                        <a href="{{$data['instagram']}}"><img src="{{asset('img/InstagramIcon.svg')}}" alt="Instagram"></a>
                        <a href="{{$data['facebook']}}"><img src="{{asset('img/FacebookIcon.svg')}}" alt="Facebook"></a>
                        <a href="{{$data['twitter']}}"><img src="{{asset('img/X.svg')}}" alt="Twitter"></a>
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
    </section>
    <section class="portfolio-section">
        <div class="portfolio-container">
            <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['work_title_ar'] :$data['work_title_en']}}</h2>

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
    </section>
    <!-- Popup modal -->
    <div id="popupOverlay" class="popup-overlay" style="display: none;">
        <div id="popupModal" class="popup-modal">
            <div class="success-icon">
                <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm-1 15-5-5 1.414-1.414L11 13.172l6.586-6.586L19 8l-8 8z"
                          fill="#4CAF50"/>
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
<<<<<<< HEAD:resources/views/frontedOld/contact.blade.php
=======
                        // Clear all previous error messages
                        $('.text-danger').remove();

                        // Reset the form and radio buttons
                        $('#contactForm')[0].reset();

                        // Show success modal
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/contact.blade.php
                        const overlay = $('#popupOverlay');
                        overlay.css('display', 'flex').addClass('show-modal');

                        setTimeout(() => {
                            overlay.removeClass('show-modal');
                            setTimeout(() => {
                                overlay.css('display', 'none');
                            }, 500);
                        }, 3000);

<<<<<<< HEAD:resources/views/frontedOld/contact.blade.php
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
        });
=======
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


>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/contact.blade.php
    </script>

@endsection
