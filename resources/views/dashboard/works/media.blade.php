@if($type == 'image')
    <img
        loading="lazy"
        class="datatable_media"
        data-type="image"
        data-src="{{ $file != '' ? asset($file) : asset('dashboard/images/6.jpg') }}"
        src="{{ $file != '' ? asset($file) : asset('dashboard/images/6.jpg') }}"
        alt="Image"
        style="cursor:pointer; max-height: 50px;">
@elseif($type == 'video')
    <video
        class="datatable_media"
        data-type="video"
        data-src="{{ asset($file) }}"
        muted
        preload="metadata"
        style="cursor:pointer; max-height: 50px;">
        <source src="{{ asset($file) }}" type="video/mp4">
        <img src="{{ asset('dashboard/images/6.jpg') }}" alt="Fallback">
    </video>
@endif
