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
