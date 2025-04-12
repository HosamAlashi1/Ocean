@extends('frontedOld.layouts.master')
@section('title', __('front.Services'))

@section('content')
    @php
        $data = \App\Models\Setting::whereIn('key_id', ['service_title_ar', 'service_title_en','service_desc_en', 'service_desc_ar'])->pluck('value', 'key_id')->toArray();
    @endphp
    <section class="services-page-section">
        <h2 class="section-title">{{App::getLocale() == 'ar' ? $data['service_title_ar'] :$data['service_title_en']}}</h2>
        <p class="section-subtitle">
            {{App::getLocale() == 'ar' ? $data['service_desc_ar'] :$data['service_desc_en']}}
        </p>

        <div class="services-page-grid">
            @foreach($services as $service)
<<<<<<< HEAD:resources/views/frontedOld/services.blade.php
                <div style="cursor: pointer;" class="service-page-card" data-id="{{ $service->id }}"
                     data-image="{{ asset($service->image) }}">
                    <div class="service-page-icon">
=======
                <a href="{{route('front.service.show',$service->id)}}" style="cursor: pointer; text-decoration: none" class="service-page-card" data-id="{{ $service->id }}" data-image="{{ asset($service->image) }}">
                    <div  class="service-page-icon">
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/services.blade.php
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name_en }}">
                    </div>
                    <h3 class="service-page-title">{{ App::getLocale() == 'ar' ? $service->name_ar: $service->name_en }}</h3>
                    <p class="service-page-description">{{ App::getLocale() == 'ar' ? $service->desc_ar: $service->desc_en }}</p>
                </a>
            @endforeach
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
<<<<<<< HEAD:resources/views/frontedOld/services.blade.php
                        <div class="main-image">
                            <img style="min-height: 300px max-height: 300px" id="mainImage-{{ $loop->index }}"
                                 src="{{ asset($work->images[0]->image) }}" alt="Project Image {{ $loop->index + 1 }}">
=======
                        <div  class="main-image">
                            <img style="min-height: 300px; max-height: 300px" id="mainImage-{{ $loop->index }}" src="{{ asset($work->images[0]->image) }}" alt="Project Image {{ $loop->index + 1 }}">
>>>>>>> de8aba48b5982bc2f1eb9dc29b764828b4e2202a:resources/views/fronted/services.blade.php
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

        // document.addEventListener("DOMContentLoaded", function () {
        //     const serviceCards = document.querySelectorAll(".service-page-card");
        //     const portfolioGrid = document.querySelector(".portfolio-grid");
        //     const loader = document.querySelector(".loader");
        //
        //     serviceCards.forEach(card => {
        //         card.addEventListener("click", function () {
        //             const serviceId = card.getAttribute("data-id");
        //
        //             // Show the loader
        //             loader.style.display = "block"; // Show loader
        //             portfolioGrid.style.opacity = "0"; // Start fading out
        //
        //             // Fetch works based on service ID
        //             fetch(`/services/${serviceId}/works`, {
        //                 headers: {
        //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        //                     'Accept': 'application/json'
        //                 }
        //             })
        //                 .then(response => {
        //                     if (!response.ok) {
        //                         throw new Error("Network response was not ok");
        //                     }
        //                     return response.json();
        //                 })
        //                 .then(works => {
        //                     portfolioGrid.innerHTML = ""; // Clear current content
        //
        //                     works.forEach((work, index) => {
        //                         // Take only the first 4 images
        //                         const images = work.images.slice(0, 4).map((image, idx) => `
        //     <img src="${image.image}"
        //          alt="Thumb ${index + 1}"
        //          class="${idx === 0 ? 'active-thumbnail' : ''}"
        //          onclick="changeMainImage('${image.image}', 'mainImage-${index}', 'thumbnailList-${index}', this)">
        // `).join('');
        //
        //                         portfolioGrid.innerHTML += `
        //                 <div class="portfolio-item">
        //                     <h3>${work.title_en}</h3>
        //                     <div style="min-height: 300px max-height: 300px" class="main-image">
        //                         <img id="mainImage-${index}" src="${work.images[0].image}" alt="Project Image ${index + 1}">
        //                     </div>
        //                     <div class="thumbnail-list" id="thumbnailList-${index}">
        //                         ${images}
        //                     </div>
        //                 </div>
        //             `;
        //                     });
        //
        //                     // Hide the loader and fade in the grid
        //                     loader.style.display = "none"; // Hide loader immediately
        //                     setTimeout(() => {
        //                         portfolioGrid.style.opacity = "1"; // Fade in
        //                     }, 50); // Slight delay to ensure the loader is hidden before fading in
        //                 })
        //                 .catch(error => {
        //                     console.error("Error fetching works:", error);
        //                     loader.style.display = "none"; // Hide the loader in case of error
        //                     portfolioGrid.style.opacity = "1"; // Ensure it stays visible on error
        //                 });
        //         });
        //     });
        // });


    </script>
@endsection
