<script>
    $(document).on('click', '.edit', function () {
        const tagId = $(this).data('id');
        const editUrl = $(this).data('url'); // e.g., /tags/1/edit
        const updateUrl = "{{ route('tags.update', ':id') }}".replace(':id', tagId);

        const modalHtml = `
            <div id="tag-loader" style="text-align: center; padding: 20px;">
                <div class="spinner"></div>
                <div style="margin-top: 10px; font-size: 0.9rem;">Loading tag data...</div>
            </div>
            <div id="tag-container" style="display:none;">
                <div class="swal2-inline-group">
                    <label class="swal2-inline-label">{{ __('general.Tag Name (English)') }}</label>
                    <input type="text" id="tag-title-en" class="swal2-input swal2-inline-input" placeholder="English title">
                </div>
                <div class="swal2-inline-group">
                    <label class="swal2-inline-label">{{ __('general.Tag Name (Arabic)') }}</label>
                    <input type="text" id="tag-title-ar" class="swal2-input swal2-inline-input" placeholder="Arabic title">
                </div>
            </div>
        `;

        Swal.fire({
            title: "{{ __('general.Edit Tag') }}",
            html: modalHtml,
            showCancelButton: true,
            confirmButtonText: "{{ __('general.save') }}",
            cancelButtonText: "{{ __('general.cancel') }}",
            background: 'var(--swal-background)',
            width: '600px',
            didOpen: () => {
                // Fetch existing tag data
                $.get(editUrl).then(res => {
                    if (!res.success) throw new Error("Tag not found");

                    const tag = res.data;

                    $('#tag-loader').remove();
                    $('#tag-container').show().addClass('fade-in');
                    $('#tag-title-en').val(tag.title_en);
                    $('#tag-title-ar').val(tag.title_ar);
                }).catch(err => {
                    console.error(err);
                    $('#tag-loader').html(`<div style="color:red;">⚠️ Failed to load tag data</div>`);
                });
            },
            preConfirm: () => {
                const titleEn = $('#tag-title-en').val().trim();
                const titleAr = $('#tag-title-ar').val().trim();

                if (!titleEn || !titleAr) {
                    Swal.showValidationMessage("{{ __('general.Both fields are required') }}");
                    return false;
                }

                return { title_en: titleEn, title_ar: titleAr };
            }
        }).then(result => {
            if (result.value) {
                const formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('_method', 'PUT');
                formData.append('title_en', result.value.title_en);
                formData.append('title_ar', result.value.title_ar);

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
