<script>
    let cachedServices = null;
    function loadServices(selectedId = '') {
        if (cachedServices) {
            return Promise.resolve(buildOptions(cachedServices, selectedId));
        }

        return $.get("{{ route('services.list') }}").then(res => {
            if (res.success && Array.isArray(res.data)) {
                cachedServices = res.data;
                return buildOptions(cachedServices, selectedId);
            } else {
                throw new Error("Invalid service list response");
            }
        });
    }

    function buildOptions(services, selectedId = '') {
        let options = `<option value="">{{ __('general.Select a service') }}</option>`;
        services.forEach(service => {
            const isSelected = selectedId == service.id ? 'selected' : '';
            const label = "{{ App::getLocale() }}" === 'ar' ? service.title_ar : service.title_en;
            options += `<option value="${service.id}" ${isSelected}>${label}</option>`;
        });
        return options;
    }


    document.documentElement.style.setProperty('--swal-background', document.body.classList.contains('dark-mode') ? '#2b2b2b' : '#fff');
</script>

{{--// Add Modal--}}
@include('dashboard.works.assets.modals.add')

{{--// Edit Modal--}}
@include('dashboard.works.assets.modals.update')

{{--// delete modal--}}
@include('dashboard.works.assets.modals.delete')

{{-- dipaly media (image or video) --}}
<script>
    $(document).on('click', '.datatable_media', function () {
        const fileType = $(this).data('type');
        const fileSrc = $(this).data('src');

        if (fileType === 'image') {
            Swal.fire({
                imageUrl: fileSrc,
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
        } else if (fileType === 'video') {
            Swal.fire({
                html: `
                    <video controls style="width: 100%; max-height: 400px; border-radius: 10px;">
                        <source src="${fileSrc}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                `,
                showConfirmButton: false,
                showCloseButton: true,
                background: '#000',
                width: 600,
                padding: '0 0 20px 0'
            });
        }
    });
</script>
