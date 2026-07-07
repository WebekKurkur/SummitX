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
    {{-- Mobile top bar (<lg) — hamburger toggles admin drawer --}}
    <header data-admin-header class="sticky top-0 z-[60] flex items-center justify-between border-b border-black/5 bg-white/90 px-6 py-4 backdrop-blur lg:hidden">
        <button
            type="button"
            data-admin-drawer-open
            class="flex h-10 w-10 items-center justify-center rounded-xl text-[var(--color-charcoal)] transition hover:bg-black/5"
            aria-label="Open menu"
            aria-expanded="false"
            aria-controls="admin-drawer"
        >
            <svg data-admin-icon-menu class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round"/>
            </svg>
            <svg data-admin-icon-close class="hidden h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M18 6 6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <a href="{{ route('admin.dashboard') }}" class="font-display text-lg font-bold tracking-tight text-[var(--color-charcoal)]">
            SummitX
        </a>
        <span class="h-10 w-10" aria-hidden="true"></span>
    </header>

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
