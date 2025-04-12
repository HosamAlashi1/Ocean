@props([
    'title',
    'dataTable'
])

@extends('dashboard.layouts.master')
@section('title', $title)
@section('css')
    <link rel="stylesheet" href="{{ asset('dashboard/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    {{ $css ?? ''}}
    @include('components.datatable.assets.css')
@endsection
@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                {{ $header ?? '' }}
                <div class="card-datatable table-responsive pt-0">

                {{$dataTable->table()}}

                </div>

            </div>
        </div>
    </div>

@endsection
@section('js')
    <!-- DATA TABLE JS -->
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('dashboard/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('dashboard/app-assets/js/scripts/tables/table-datatables-basic.js') }}"></script>
    <script src="{{ asset('dashboard/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>


    {{$dataTable->scripts()}}

    @include('components.datatable.assets.scripts')

    {{ $script ?? '' }}

@stop
