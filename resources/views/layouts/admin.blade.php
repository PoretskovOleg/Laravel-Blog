<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? config('app.name') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#7843E9">
    <meta name="msapplication-TileColor" content="#7843E9">
    <meta name="theme-color" content="#7843E9">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/js/app.js')
</head>
<body class="antialiased">

@if(!isset($skipHeader) || !$skipHeader)
    <x-header>
        <x-admin.header.menu></x-admin.header.menu>

        @auth()
            <x-header.actions>
                <x-header.actions.admin-auth></x-header.actions.admin-auth>
            </x-header.actions>
        @endauth
    </x-header>
@endif

<main class="py-16 lg:py-20">
    <div class="container">
        @yield('content')
    </div>
</main>

</body>
</html>
