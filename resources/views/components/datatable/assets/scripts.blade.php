{{--delete script--}}
<script>
    let suppressSkeleton = false;
    $(document).on('click', '.delete-btn', function () {
        let url = $(this).data('url');
        Swal.fire({
            title: "{{__('dataTable.Delete Operation')}}",
            text: "{{__('dataTable.will not able to revert')}}",
            type: "{{__('dataTable.warning')}}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ff0000",
            cancelButtonColor: "#898a8c",
            confirmButtonText: "{{__('dataTable.Delete')}}",
            confirmButtonClass: 'btn btn-danger',
            cancelButtonClass: 'btn bg-secondary bg-lighten-2 text-white ml-1',
            buttonsStyling: false,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url,
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success(response) {
                        console.log(response)
                        Swal.fire({
                            title: "{{ __('dataTable.success') }}",
                            text: "{{ __('dataTable.deleted successfully') }}",
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500,
                            customClass: {
                                popup: 'animated bounceIn',
                                icon: 'swal2-success',
                            }
                        });
                        suppressSkeleton = true;
                        $('#datatable').DataTable().row($(this).parents('tr')).remove().draw();
                    },
                    error(error) {
                        console.log(error)
                        Swal.fire({
                            type: "error",
                            title: "{{__('dataTable.oops')}}",
                            text: "{{__('dataTable.something wrong')}}"
                        });
                    }
                })
            }
        });
    })

</script>

{{--update status--}}
<script>
    function updateStatus(id, route) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
        });

        $.ajax({
            url: route.replace(':id', id),
            type: 'GET',
            success: function(response) {
                suppressSkeleton = true;
                $('#datatable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    // Click event handler for the icon
    function st(id, route, type) {
        var $icon;
        var currentStatus;

        if (type === 'status') {
            $icon = $('#icon-status-' + id);
            currentStatus = $icon.attr('src');
        } else {
            $icon = $('#icon-contact-' + id);
            currentStatus = $icon.attr('src');
        }

        // Fade out the current icon
        $icon.fadeOut(200, function() {
            // Determine the new icon source based on current status
            var newStatus;
            if (type === 'status') {
                newStatus = currentStatus === "{{ asset('dashboard/icon/tick.png') }}" ? "{{ asset('dashboard/icon/error.png') }}" : "{{ asset('dashboard/icon/tick.png') }}";
            } else {
                newStatus = currentStatus === "{{ asset('dashboard/icon/tick.png') }}" ? "{{ asset('dashboard/icon/error.png') }}" : "{{ asset('dashboard/icon/tick.png') }}";
            }

            // Change the icon source
            $icon.attr('src', newStatus);

            // Fade in the new icon
            $icon.fadeIn(200);
        });

        updateStatus(id, route);
    }
</script>

{{--skeleton loader--}}
<script>
    $(document).on('preXhr.dt', '#datatable', function () {
        if (suppressSkeleton) return; // ⛔️ Skip if coming from delete/update

        const $table = $('#datatable');
        const $thead = $table.find('thead');
        const $tbody = $table.find('tbody');

        const columnCount = $thead.find('th').length;
        const visibleRowCount = $table.DataTable().page.len();
        const $firstRealRow = $tbody.find('tr:first');
        const rowHeight = $firstRealRow.length ? $firstRealRow.outerHeight() : 55;

        let skeletonHTML = '';
        for (let i = 0; i < visibleRowCount; i++) {
            skeletonHTML += '<tr>';
            for (let j = 0; j < columnCount; j++) {
                if (j === 1) {
                    skeletonHTML += `<td class="text-center"><span class="skeleton-circle"></span></td>`;
                } else if (j === columnCount - 1) {
                    skeletonHTML += `<td class="text-center">`;
                    for (let k = 0; k < 2; k++) {
                        skeletonHTML += `<span class="skeleton-rect"></span>`;
                    }
                    skeletonHTML += `</td>`;
                } else {
                    skeletonHTML += `<td><div class="skeleton-line full"></div></td>`;
                }
            }
            skeletonHTML += '</tr>';
        }

        $tbody.stop(true, true).fadeOut(50, function () {
            $(this).html(skeletonHTML).fadeIn(80);
        });
    });


</script>

{{--display the image--}}
<script>
    $(document).on('click', '.datatable_img', function () {
        const fullImageUrl = $(this).data('full');

        Swal.fire({
            imageUrl: fullImageUrl,
            imageAlt: 'Preview',
            showConfirmButton: false,
            showCloseButton: true,
            background: '#fff',
            width: 'auto',
            padding: '0px 0px 20px 0px',
            customClass: {
                popup: 'image-preview-popup',
                image: 'image-preview-img',
                closeButton: 'image-preview-close'
            }
        });
    });
</script>

