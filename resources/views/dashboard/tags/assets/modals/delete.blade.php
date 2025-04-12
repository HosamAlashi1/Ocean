<script>
    $(document).on('click', '.delete-btn2', function () {
        const deleteUrl = $(this).data('url');

        Swal.fire({
            title: "{{ __('general.are_you_sure') }}",
            text: "{{ __('general.confirm_delete') }}",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e3342f",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "{{ __('general.yes_delete') }}",
            cancelButtonText: "{{ __('general.cancel') }}"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "{{ __('general.deleted') }}",
                            text: "{{ __('general.item_deleted_successfully') }}",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        $('#datatable').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire({
                            title: "{{ __('general.oops') }}",
                            text: "{{ __('general.something_went_wrong') }}",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>
