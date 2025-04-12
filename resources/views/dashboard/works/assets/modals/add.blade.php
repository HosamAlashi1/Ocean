<script>
    $(document).on('click', '.add', function () {
        // Determine modal content depending on cache state
        const servicesAreCached = !!cachedServices;

        const modalHtml = `
    ${!servicesAreCached ? `
    <div id="service-loader" class="fade-spinner" style="text-align: center; padding: 20px;">
        <div class="spinner"></div>
        <div style="margin-top: 10px; font-size: 0.9rem;">Loading services...</div>
    </div>` : ''}

    <div id="service-container" style="${servicesAreCached ? '' : 'display: none;'}">
        <div class="swal2-inline-group">
            <label class="swal2-inline-label">{{ __('general.Service') }}</label>
            <select id="service_id" class="swal2-select swal2-inline-input"></select>
        </div>
    </div>

    <div class="swal2-inline-group">
        <label class="swal2-inline-label">{{ __('general.Image') }}</label>
        <input type="file" id="photo" class="swal2-input swal2-inline-input" accept="image/*">
    </div>
`;


        Swal.fire({
            title: "{{ __('general.Add Work') }}",
            html: modalHtml,
            showCancelButton: true,
            confirmButtonText: "{{ __('general.save') }}",
            cancelButtonText: "{{ __('general.cancel') }}",
            background: 'var(--swal-background)',
            width: '600px',
            didOpen: () => {
                loadServices().then(optionsHtml => {
                    $('#service_id').html(optionsHtml);
                    if (!servicesAreCached) {
                        $('#service-loader').remove();
                        $('#service-container').show().addClass('fade-in');
                    }
                }).catch(() => {
                    $('#service-loader').html(`<div style="color:red;">⚠️ Failed to load services</div>`);
                });
            },
            preConfirm: () => {
                const serviceId = $('#service_id').val();
                const photo = $('#photo')[0].files[0];
                if (!serviceId || !photo) {
                    Swal.showValidationMessage("{{ __('general.fill_all_fields') }}");
                }
                return { service_id: serviceId, photo };
            }
        }).then(result => {
            if (result.value) {
                const formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('service_id', result.value.service_id);
                formData.append('photo', result.value.photo);

                $.post({
                    url: "{{ route('work.store') }}",
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
