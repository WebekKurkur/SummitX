<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[var(--color-offwhite)]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1F3A2E">
    <meta name="description" content="@yield('description', 'SummitX — premium outdoor gear engineered for adventurers who seek the summit.')">

    <title>@yield('title', config('app.name', 'SummitX')) — Premium Outdoor Gear</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[var(--color-offwhite)] text-[var(--color-charcoal)] antialiased">
    @include('partials.landing.nav')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.shared.toast')

    @include('partials.landing.footer')
</body>
</html>
