<x-datatable :dataTable="$dataTable" :title="__('general.Blogs')">
    <x-slot:css>
        <style>
            /* Core styling for tag filter select */
            #tag-filter {
                transition: 0.3s ease-in-out;
                padding-left: 10px;
                padding-right: 2.5rem; /* space for icon */
                background-color: #fff;
                height: 38px; /* match Bootstrap btn height */
                border-radius: 6px; /* match button style */
            }

            #tag-filter:hover,
            #tag-filter:focus {
                border-color: #1291ef !important;
                box-shadow: 0 0 0 0.15rem #51acf1;
            }

            /* Hide default arrow in all browsers */
            .custom-select-no-arrow {
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                background-image: none !important;
            }

            /* Style for the filter icon inside select */
            .bi-filter-circle-fill {
                font-size: 1.5rem;
                color: #1291ef !important;
                pointer-events: none;
            }
        </style>

    </x-slot:css>
    <x-slot:header>
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">

            <!-- Left: Add Button -->
            <a href="{{ route('blog.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> {{ __('dataTable.add') }}
            </a>

            <!-- Filter Dropdown with Embedded Icon -->
            <div class="position-relative" style="min-width: 220px;">
                <!-- Filter Icon on the right -->
                <i class="bi bi-filter-circle-fill position-absolute top-50 end-0 translate-middle-y text-primary fs-5 me-3"></i>

                <select id="tag-filter"
                        class="form-select form-select-sm ps-3 pe-5 rounded-2 border border-primary-subtle shadow-sm w-100 custom-select-no-arrow"
                        style="height: 36px;">
                    <option value="">{{ __('dataTable.FilterByTag') }}</option>
                    @foreach ($tags as $tag)
                        <option value="{{ app()->getLocale() === 'ar' ? $tag->title_ar : $tag->title_en }}">
                            {{ app()->getLocale() === 'ar' ? $tag->title_ar : $tag->title_en }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>
    </x-slot:header>
    <x-slot:script>
        <script>
            $(document).on('preInit.dt', function () {
                const table = $('#datatable').DataTable();
                const $filter = $('#tag-filter');

                $filter.on('change', function () {
                    const selectedTag = $(this).val();
                    const tagColIndex = 5; // replace with actual index of the "tags" column

                    console.log("Filtering by:", selectedTag);

                    table.column(tagColIndex).search(selectedTag).draw();
                });
            });
        </script>
    </x-slot:script>
</x-datatable>
