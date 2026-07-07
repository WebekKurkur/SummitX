@php
    $kpis = [
        [
            'icon' => 'revenue',
            'label' => 'Total Revenue',
            'value' => 'Rp. 724.000.000',
            'change' => '+12.5%',
            'trend' => 'up',
        ],
        [
            'icon' => 'orders',
            'label' => 'Total Orders',
            'value' => '1,284',
            'change' => '+8.2%',
            'trend' => 'up',
        ],
        [
            'icon' => 'users',
            'label' => 'Active Users',
            'value' => '892',
            'change' => '+5.1%',
            'trend' => 'up',
        ],
        [
            'icon' => 'conversion',
            'label' => 'Conversion Rate',
            'value' => '3.8%',
            'change' => '-0.3%',
            'trend' => 'down',
        ],
    ];

    $months = [
        ['label' => 'Jan', 'value' => 18],
        ['label' => 'Feb', 'value' => 32],
        ['label' => 'Mar', 'value' => 45],
        ['label' => 'Apr', 'value' => 38],
        ['label' => 'May', 'value' => 62],
        ['label' => 'Jun', 'value' => 78],
    ];

    $maxRevenue = max(array_column($months, 'value'));

    $quickActions = [
        ['label' => 'Add Product',   'href' => '#', 'icon' => 'plus'],
        ['label' => 'Create Article','href' => '#', 'icon' => 'pencil'],
        ['label' => 'View Users',    'href' => '#', 'icon' => 'arrow'],
    ];

    $transactions = [
        ['name' => 'John Doe',       'order' => 'SX-2026-4521', 'date' => 'May 13, 2026', 'amount' => 'Rp. 12.300.000', 'status' => 'completed'],
        ['name' => 'Jane Smith',     'order' => 'SX-2026-4520', 'date' => 'May 13, 2026', 'amount' => 'Rp. 6.200.000', 'status' => 'pending'],
        ['name' => 'Mike Johnson',   'order' => 'SX-2026-4519', 'date' => 'May 12, 2026', 'amount' => 'Rp. 8.800.000', 'status' => 'completed'],
        ['name' => 'Sarah Williams', 'order' => 'SX-2026-4518', 'date' => 'May 12, 2026', 'amount' => 'Rp. 4.500.000', 'status' => 'completed'],
    ];
@endphp

@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('description', 'Overview of your expedition commerce platform.')

@section('content')
    <header>
        <h1 class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px]">
            Dashboard
        </h1>
        <p class="mt-3 text-base text-[var(--color-charcoal)]/60">
            Overview of your expedition commerce platform
        </p>
    </header>

    <section aria-labelledby="kpi-title" class="mt-10">
        <h2 id="kpi-title" class="sr-only">Key performance indicators</h2>
        <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
            @foreach ($kpis as $kpi)
                @include('admin.partials.analytics-card', ['kpi' => $kpi])
            @endforeach
        </div>
    </section>

    <div class="mt-8 grid gap-6 lg:grid-cols-3 lg:gap-6">
        <section
            aria-labelledby="revenue-title"
            class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8 lg:col-span-2"
        >
            <div class="flex items-center justify-between gap-4">
                <h3 id="revenue-title" class="font-display text-xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-2xl">
                    Revenue Overview
                </h3>
                <select
                    aria-label="Time range"
                    class="rounded-xl border border-black/10 bg-white px-3 py-2 text-sm font-medium text-[var(--color-charcoal)] focus:border-[var(--color-charcoal)] focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                >
                    <option>Last 6 months</option>
                    <option>Last 12 months</option>
                    <option>Year to date</option>
                </select>
            </div>

            <div class="mt-8 flex h-64 gap-3" role="img" aria-label="Monthly revenue bar chart">
                @foreach ($months as $i => $m)
                    @php
                        $heightPct = max(8, round(($m['value'] / $maxRevenue) * 100));
                    @endphp
                    <div class="group flex flex-1 flex-col items-center gap-3">
                        <div class="relative flex h-full w-full items-end">
                            <div
                                class="w-full rounded-t-xl bg-[var(--color-forest)]/20 transition-colors group-hover:bg-[var(--color-forest)]"
                                style="height: {{ $heightPct }}%"
                                aria-hidden="true"
                            ></div>
                            <span class="pointer-events-none absolute inset-x-0 -top-7 text-center text-xs font-semibold text-[var(--color-charcoal)] opacity-0 transition group-hover:opacity-100">
                                ${{ $m['value'] }}k
                            </span>
                        </div>
                        <span class="text-sm font-medium text-[var(--color-charcoal)]/60">{{ $m['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </section>

        <section
            aria-labelledby="quick-actions-title"
            class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8"
        >
            <h3 id="quick-actions-title" class="font-display text-xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-2xl">
                Quick Actions
            </h3>
            <ul class="mt-7 flex flex-col gap-3">
                @foreach ($quickActions as $action)
                    <li>
                        <a
                            href="{{ $action['href'] }}"
                            class="flex items-center justify-between rounded-2xl border border-black/10 bg-white px-5 py-4 text-base font-semibold text-[var(--color-charcoal)] transition hover:border-[var(--color-charcoal)] hover:bg-[var(--color-charcoal)] hover:text-white"
                        >
                            {{ $action['label'] }}
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>

    <section
        aria-labelledby="recent-tx-title"
        class="mt-8 rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8"
    >
        <div class="flex items-center justify-between gap-4">
            <h3 id="recent-tx-title" class="font-display text-xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-2xl">
                Recent Transactions
            </h3>
            <a href="#" class="text-sm font-semibold text-[var(--color-forest)] hover:text-[var(--color-charcoal)]">
                View all
            </a>
        </div>

        <ul class="mt-7 divide-y divide-black/5">
            @foreach ($transactions as $tx)
                @include('admin.partials.transaction-row', ['tx' => $tx])
            @endforeach
        </ul>
    </section>
@endsection
