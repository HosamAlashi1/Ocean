<script>
    $(document).on('click', '.edit', function () {
        const itemId = $(this).data('id');
        const editUrl = $(this).data('url');
        const updateUrl = "{{ route('work.update', ':id') }}".replace(':id', itemId);

        const modalHtml = `
    <div id="service-loader" style="text-align: center; padding: 20px;">
        <div class="spinner"></div>
        <div style="margin-top: 10px; font-size: 0.9rem;">Loading data...</div>
    </div>

    <div id="service-container" style="display:none;">
        <div class="swal2-inline-group">
            <label class="swal2-inline-label">{{ __('general.Service') }}</label>
            <select id="service_id" class="swal2-select swal2-inline-input"></select>
        </div>
    </div>

    <div class="swal2-inline-group">
        <label class="swal2-inline-label">
            {{ __('general.Image') }}
        <small class="text-muted">({{ __('general.Optional') }})</small>
        </label>
        <input type="file" id="photo" class="swal2-input swal2-inline-input" accept="image/*">
    </div>
`;


        Swal.fire({
            title: "{{ __('general.Update Work') }}",
            html: modalHtml,
            showCancelButton: true,
            confirmButtonText: "{{ __('general.save') }}",
            cancelButtonText: "{{ __('general.cancel') }}",
            background: 'var(--swal-background)',
            // customClass: { popup: 'swal-custom-modal' },
            width: '600px',
            didOpen: () => {
                // Step 1: Fetch the work
                $.get(editUrl).then(res => {
                    if (!res.success) throw new Error("Item not found");

                    const item = res.data;

                    // Step 2: Fetch services (from cache or fresh)
                    return loadServices(item.service_id).then(optionsHtml => {
                        $('#service-loader').remove();
                        $('#service_id').html(optionsHtml);
                        $('#service-container').show().addClass('fade-in');
                    });
                }).catch(err => {
                    console.error(err);
                    $('#service-loader').html(`<div style="color:red;">⚠️ Failed to load data</div>`);
                });
            },
            preConfirm: () => {
                const serviceId = $('#service_id').val();
                const photo = $('#photo')[0].files[0];

                if (!serviceId) {
                    Swal.showValidationMessage("{{ __('general.fill_the_field_required') }}");
                    return false;
                }

                return { service_id: serviceId, photo }; // photo can be undefined (optional)
            }
        }).then(result => {
            if (result.value) {
                const formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('_method', 'PUT');
                formData.append('service_id', result.value.service_id);
                if (result.value.photo) {
                    formData.append('photo', result.value.photo);
                }

                $.post({
                    url: updateUrl,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: response => {
                        Swal.fire("{{ __('general.success') }}", response.message, "success")
                            .then(() => $('#datatable').DataTable().ajax.reload(null, false));
                    },
                    error: () => {
                        Swal.fire("{{ __('general.oops') }}", "{{ __('general.something_went_wrong') }}", "error");
                    }
                });
            }
        });
    });
</script>
