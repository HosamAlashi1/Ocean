<x-datatable :dataTable="$dataTable" :title="__('general.Works')">
    <x-slot:css>
        @include('dashboard.works.assets.css')
    </x-slot:css>
    <x-slot:header>
        <button type="button" class="btn btn-primary waves-effect waves-light add"
                style="font-weight: bold; color: beige;">
            <i class="bi bi-plus-circle me-1"></i> {{ __('dataTable.add') }}
        </button>
    </x-slot:header>
    <x-slot:script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('dashboard.works.assets.scripts')
    </x-slot:script>
</x-datatable>

