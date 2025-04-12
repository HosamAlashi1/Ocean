@extends('fronted.layouts.master')
@section('title',  App::getLocale() == 'ar' ? $service->name_ar: $service->name_en )
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MlEUn0o1gUuOfXH3sOJHkF80S4fvcswCUZoC3qbxmRJHlKfTwHUYN/SOdlA2By8e" crossorigin="anonymous">
@endsection
@section('content')
    <section class="services-page-section">


        <div class="d-flex justify-content-center align-items-center" >
            <div class="w-100 px-3">
                <div class="service-page-card text-center" data-id="{{ $service->id }}" data-image="{{ asset($service->image) }}">
                    <div class="service-page-icon mb-3">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name_en }}">
                    </div>
                    <h3 class="service-page-title">{{ App::getLocale() == 'ar' ? $service->name_ar : $service->name_en }}</h3>
                    <p class="service-page-description">{{ App::getLocale() == 'ar' ? $service->desc_ar : $service->desc_en }}</p>
                </div>
            </div>
        </div>


    </section>

    <section class="portfolio-section">
        <div class="portfolio-container">
            <div class="loader" style="display:none;">{{__('front.Loading')}}...</div>
            <div class="portfolio-grid">
                @foreach($works as $work)
                    <div class="portfolio-item">
                        <h3>{{ App::getLocale() == 'ar' ? $work->title_ar : $work->title_en }}</h3>
                        <!-- Main Image -->
                        <div  class="main-image">
                            <img style="min-height: 300px; max-height: 300px" id="mainImage-{{ $loop->index }}" src="{{ asset($work->images[0]->image) }}" alt="Project Image {{ $loop->index + 1 }}">
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
@endsection
@section('scripts')
    <script>
        function changeMainImage(imageUrl, mainImageId, thumbnailListId, clickedThumbnail) {
            const mainImage = document.getElementById(mainImageId);

            // Fade out the current main image
            mainImage.classList.add('fade-out');

            // Change the image source after the fade-out transition ends
            mainImage.addEventListener('transitionend', function onFadeOut() {
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
@endsection
