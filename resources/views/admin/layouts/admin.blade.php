<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-[var(--color-offwhite)]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#1F3A2E">
    <meta name="description" content="@yield('description', 'SummitX admin')">

    <title>@yield('title', 'Admin') — SummitX</title>

    @fonts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[var(--color-offwhite)] text-[var(--color-charcoal)] antialiased">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <main id="main" class="flex-1 @yield('main_padding', 'px-6 py-10 lg:px-12 lg:py-12')">
            @yield('content')
        </main>
    </div>

    @stack('modals')
    @include('admin.partials.confirm-dialog')
</body>
</html>
