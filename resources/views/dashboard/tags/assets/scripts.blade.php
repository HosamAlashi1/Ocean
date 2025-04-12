
<script>
    document.documentElement.style.setProperty('--swal-background', document.body.classList.contains('dark-mode') ? '#2b2b2b' : '#fff');
</script>
{{--// Add Modal--}}
@include('dashboard.tags.assets.modals.add')

{{--// Edit Modal--}}
@include('dashboard.tags.assets.modals.update')

{{--// delete modal--}}
@include('dashboard.tags.assets.modals.delete')
