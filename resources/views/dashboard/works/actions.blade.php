@if($routeEdit)
    <button
        data-url="{{ route($routeEdit, $id) }}"
        data-id="{{$id}}"
        type="button"
        class="btn edit btn-info btn-sm rounded rounded-2 mb-1">
        <i class="bi bi-pencil-fill"></i>
    </button>
@endif

@if($routeDelete)
    <button type="button" class="btn rounded rounded-2 btn-danger btn-sm delete-btn2 mb-1"
            data-url="{{ route($routeDelete, $id) }}">
        <i class="bi bi-trash-fill"></i>
    </button>
@endif
