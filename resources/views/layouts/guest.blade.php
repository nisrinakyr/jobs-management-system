{{-- resources/views/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}?v=1">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite assets (Tailwind should be imported in resources/css/app.css) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Optional: Tailwind CDN fallback if styles failed to load (useful in dev) --}}
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            try {
                // If there are no CSSStyleSheets or first stylesheet fails to access rules,
                // inject Tailwind CDN to avoid a "stripped" page.
                const sheets = document.styleSheets;
                if (!sheets || sheets.length === 0) throw new Error('No stylesheets loaded');
                // Try to access a rule (will throw cross-origin in some cases; that’s ok).
                if (sheets[0].cssRules === null) throw new Error('Stylesheet not ready');
            } catch (e) {
                const s = document.createElement('script');
                s.src = 'https://cdn.tailwindcss.com';
                document.head.appendChild(s);
            }
        });
    </script>
</head>
<body class="min-h-screen font-sans text-gray-900 dark:text-gray-100 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-950 dark:to-gray-900">
    {{-- Center the guest content; your page (e.g., login) provides its own card/container --}}
    <div class="min-h-screen flex items-center justify-center p-4">
        {{ $slot }}
    </div>

    {{-- Alpine.js fallback (only if not already loaded) --}}
    <script>
        window.Alpine || document.write('<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer><\/script>');
    </script>
</body>
</html>
