@props(['title' => 'Home', 'description' => '', 'menuItems' => []])
<!doctype html>
<html lang="en" class="scroll-smooth {{ $site->theme->appearance_class ?? '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · Newspaper</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Playfair Display sets the masthead and headlines; Inter carries the body. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ $site->theme->fonts_url ?? 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap' }}" rel="stylesheet">

    <!-- Loads Tailwind and inlines the theme tokens plus resources/css/site.css -->
    @vite(['resources/css/theme.css', 'resources/css/site.css'])

    <!-- Flag JS support before first paint so scroll reveals never flash (see main.js) -->
    <script>document.documentElement.classList.add('js')</script>
    <script src="/js/main.js" defer></script>
</head>
<body class="min-h-dvh bg-canvas font-sans text-ink antialiased">

    <!-- The masthead and press bar. Links live in resources/data/site.json (nav_links);
         pages bind the articles collection to menuItems to feed the mega panels. -->
    <x-nav :links="$site->nav_links" :items="$menuItems"/>

    <main class="relative">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_links"/>

</body>
</html>
