@if($routeEdit)
    <a href="{{ route($routeEdit, $id) }}" type="button" class="btn btn-info btn-sm rounded rounded-2 mb-2 mr-2">
        <i class="bi bi-pencil-fill"></i>
    </a>
@endif

@if($routeDelete)
    <button type="button" class="btn rounded rounded-2 btn-danger btn-sm delete-btn mb-2"
            data-url="{{ route($routeDelete, $id) }}"
            data-name="{{ $name }}">
        <i class="bi bi-trash-fill"></i>
    </button>
@endif




