@if($type == 'show_on_recent_work')
    <a onclick="st('{{ $service->id }}', '{{ route($route, ':id') }}', 'status')" data-status="{{ $service->show_on_recent_work }}">
        <img
            src="{{ $service->show_on_recent_work == 1 ? asset('dashboard/icon/tick.png') : asset('dashboard/icon/error.png') }}"
            id="icon-status-{{ $service->id }}"
            class="icon"
            style="width: 30px; height: 30px; cursor: pointer;"
        >
    </a>
@else
    <a onclick="st('{{ $service->id }}', '{{ route($route, ':id') }}', 'status2')" data-status="{{ $service->show_on_our_service }}">
        <img
            src="{{ $service->show_on_our_service == 1 ? asset('dashboard/icon/tick.png') : asset('dashboard/icon/error.png') }}"
            id="icon-contact-{{ $service->id }}"
            class="icon"
            style="width: 30px; height: 30px; cursor: pointer;"
        >
    </a>
@endif
