@php
    $items = $items ?? [
        ['icon' => 'dashboard', 'label' => 'Dashboard',   'route' => 'admin.dashboard',  'href' => route('admin.dashboard')],
        ['icon' => 'article',   'label' => 'Articles',    'route' => 'admin.articles',   'href' => route('admin.articles')],
        ['icon' => 'product',   'label' => 'Products',    'route' => 'admin.products',   'href' => route('admin.products')],
        ['icon' => 'user',      'label' => 'Users',       'route' => 'admin.users',      'href' => route('admin.users')],
        ['icon' => 'transaction', 'label' => 'Transactions', 'route' => 'admin.transactions', 'href' => route('admin.transactions')],
    ];

    $iconPaths = [
        'dashboard' => '<rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>',
        'article'   => '<rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 8h8M8 12h8M8 16h5" stroke-linecap="round"/>',
        'product'   => '<path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" stroke-linecap="round" stroke-linejoin="round"/><path d="M3.27 6.96 12 12.01l8.73-5.05M12 22.08V12" stroke-linecap="round" stroke-linejoin="round"/>',
        'user'      => '<circle cx="12" cy="8" r="4"/><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>',
        'transaction' => '<rect x="2" y="6" width="20" height="14" rx="2"/><path d="M2 10h20" stroke-linecap="round"/><path d="M6 15h4" stroke-linecap="round"/>',
        'logout'    => '<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9" stroke-linecap="round" stroke-linejoin="round"/>',
        'close'     => '<path d="M18 6 6 18M6 6l12 12" stroke-linecap="round" stroke-linejoin="round"/>',
    ];

    $active = $active ?? request()->route()?->getName() ?? 'admin.dashboard';
@endphp

{{-- Desktop sidebar (≥lg) --}}
<aside
    data-admin-sidebar
    class="sticky top-0 hidden h-screen w-64 shrink-0 flex-col border-r border-black/5 bg-white lg:flex"
>
    <div class="px-8 py-8">
        <a href="{{ route('admin.dashboard') }}" class="font-display text-2xl font-bold tracking-tight text-[var(--color-charcoal)]">
            SummitX
        </a>
        <p class="mt-2 text-sm text-[var(--color-charcoal)]/60">Admin System</p>
    </div>

    @include('admin.partials._nav-list')

    <div class="border-t border-black/5 p-6">
        <a
            href="/"
            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
        >
            <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                {!! $iconPaths['logout'] !!}
            </svg>
            Logout
        </a>
    </div>
</aside>

{{-- Mobile drawer (<lg) --}}
<div
    data-admin-overlay
    class="fixed inset-0 z-40 bg-black/50 opacity-0 transition-opacity duration-300 lg:hidden"
    aria-hidden="true"
></div>

<aside
    data-admin-drawer
    id="admin-drawer"
    class="fixed inset-y-0 left-0 z-50 flex h-full w-72 -translate-x-full flex-col border-r border-black/5 bg-white transition-transform duration-300 ease-in-out lg:hidden"
    aria-label="Admin navigation"
>
    <div class="flex items-center justify-between px-8 py-8">
        <div>
            <a href="{{ route('admin.dashboard') }}" class="font-display text-2xl font-bold tracking-tight text-[var(--color-charcoal)]">
                SummitX
            </a>
            <p class="mt-2 text-sm text-[var(--color-charcoal)]/60">Admin System</p>
        </div>
        <button
            type="button"
            data-admin-drawer-close
            class="flex h-10 w-10 items-center justify-center rounded-xl text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
            aria-label="Close menu"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                {!! $iconPaths['close'] !!}
            </svg>
        </button>
    </div>

    @include('admin.partials._nav-list')

    <div class="border-t border-black/5 p-6">
        <a
            href="/"
            class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
        >
            <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                {!! $iconPaths['logout'] !!}
            </svg>
            Logout
        </a>
    </div>
</aside>
