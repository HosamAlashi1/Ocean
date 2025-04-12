<script>
    $(document).on('click', '.add', function () {
        Swal.fire({
            title: '{{ __("general.Add New Tag") }}',
            html: `
                <input id="tag-en" class="swal2-input" placeholder="{{ __('general.Tag Name (English)') }}">
                <input id="tag-ar" class="swal2-input" placeholder="{{ __('general.Tag Name (Arabic)') }}">
            `,
            showCancelButton: true,
            confirmButtonText: '{{ __("general.Save") }}',
            cancelButtonText: '{{ __("general.Cancel") }}',
            preConfirm: () => {
                const titleEn = document.getElementById('tag-en').value.trim();
                const titleAr = document.getElementById('tag-ar').value.trim();

                if (!titleEn || !titleAr) {
                    Swal.showValidationMessage('{{ __("general.Both fields are required") }}');
                    return false;
                }

                return { title_en: titleEn, title_ar: titleAr };
            }
        }).then(result => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("tags.store") }}',
                    method: 'POST',
                    data: {
                        title_en: result.value.title_en,
                        title_ar: result.value.title_ar,
                        _token: '{{ csrf_token() }}'
                    },
                    success: response => {
                        Swal.fire("{{ __('general.success') }}", response.message, "success")
                            .then(() => $('#datatable').DataTable().ajax.reload(null, false));
                    },
                    error: function () {
                        Swal.fire({
                            icon: 'error',
                            title: '{{ __("general.Error") }}',
                            text: '{{ __("general.Failed to add tag") }}'
                        });
                    }
                });
            }
        });
    });
</script>
