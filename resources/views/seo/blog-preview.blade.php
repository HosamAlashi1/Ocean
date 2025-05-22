<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

    <!-- OG -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:image" content="{{ $image }}" />
    <meta property="og:url" content="{{ $url }}" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ $image }}" />

</head>
<body>
<p>Redirecting to full content...</p>
<script>
    window.location.href = "{{ $url }}";
</script>
</body>
</html>
