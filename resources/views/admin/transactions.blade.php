@php
    $transactions = [
        [
            'order' => 'SX-2026-4521',
            'items' => 2,
            'customer' => 'John Doe',
            'amount' => 12300000,
            'status' => 'completed',
            'payment' => 'Visa ****3456',
            'date' => 'May 13, 2026',
        ],
        [
            'order' => 'SX-2026-4520',
            'items' => 1,
            'customer' => 'Jane Smith',
            'amount' => 6200000,
            'status' => 'pending',
            'payment' => 'PayPal',
            'date' => 'May 13, 2026',
        ],
        [
            'order' => 'SX-2026-4519',
            'items' => 1,
            'customer' => 'Mike Johnson',
            'amount' => 8800000,
            'status' => 'completed',
            'payment' => 'Mastercard ****7890',
            'date' => 'May 12, 2026',
        ],
        [
            'order' => 'SX-2026-4518',
            'items' => 1,
            'customer' => 'Sarah Williams',
            'amount' => 4500000,
            'status' => 'failed',
            'payment' => 'Visa ****1234',
            'date' => 'May 12, 2026',
        ],
        [
            'order' => 'SX-2026-4517',
            'items' => 3,
            'customer' => 'David Chen',
            'amount' => 20000000,
            'status' => 'completed',
            'payment' => 'Amex ****5678',
            'date' => 'May 11, 2026',
        ],
    ];

    $stats = [
        ['label' => 'Total Revenue',       'value' => 'Rp. 724.000.000'],
        ['label' => 'Pending Transactions', 'value' => '12'],
        ['label' => 'Average Order Value',  'value' => 'Rp. 5.600.000'],
    ];

    $statusFilters = ['All', 'Completed', 'Pending', 'Failed'];
    $activeFilter = 'All';
@endphp

@extends('admin.layouts.admin')

@section('title', 'Transactions')
@section('description', 'Monitor payments and order processing.')

@section('content')
    <header class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px]">
                Transactions
            </h1>
            <p class="mt-3 text-base text-[var(--color-charcoal)]/60">
                Monitor payments and order processing
            </p>
        </div>

        <button
            type="button"
            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Export
        </button>
    </header>

    <section aria-label="Revenue stats" class="mt-10">
        <div class="grid gap-6 sm:grid-cols-3">
            @foreach ($stats as $stat)
                <article class="rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]">
                    <p class="text-sm font-medium text-[var(--color-charcoal)]/60">{{ $stat['label'] }}</p>
                    <p class="mt-2 font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] sm:text-[32px]">
                        {{ $stat['value'] }}
                    </p>
                </article>
            @endforeach
        </div>
    </section>

    <section
        aria-label="Search and filter transactions"
        class="mt-6 rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]"
    >
        <form role="search" aria-label="Search transactions" class="relative" onsubmit="event.preventDefault();">
            <label for="transaction-search" class="sr-only">Search transactions</label>
            <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-5 flex items-center text-[var(--color-charcoal)]/50">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m20 20-3.5-3.5" stroke-linecap="round"/>
                </svg>
            </span>
            <input
                id="transaction-search"
                type="search"
                name="q"
                placeholder="Search transactions..."
                class="w-full rounded-2xl border border-black/10 bg-[var(--color-offwhite)] py-3.5 pl-14 pr-5 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </form>

        <nav
            aria-label="Filter by status"
            class="mt-6 -mx-1 flex gap-2 overflow-x-auto px-1 pb-1"
            data-filter-group="transaction-status"
            data-filter-active-class="bg-[var(--color-forest)] text-white"
            data-filter-inactive-class="bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
        >
            @foreach ($statusFilters as $status)
                @php
                    $value = strtolower($status);
                    $isActive = $status === $activeFilter;
                    $base = 'shrink-0 rounded-[10px] px-4 py-2 text-sm font-semibold transition';
                    $state = $isActive
                        ? 'bg-[var(--color-forest)] text-white'
                        : 'bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 hover:bg-black/5 hover:text-[var(--color-charcoal)]';
                @endphp
                <button
                    type="button"
                    data-filter-btn="{{ $value }}"
                    @if ($isActive) aria-current="true" @endif
                    class="{{ $base }} {{ $state }}"
                >
                    {{ $status }}
                </button>
            @endforeach
        </nav>
    </section>

    <section
        aria-labelledby="transactions-table-title"
        class="mt-6 overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_12px_0_rgba(0,0,0,0.04)]"
    >
        <h2 id="transactions-table-title" class="sr-only">Transactions</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-[var(--color-offwhite)] text-xs font-semibold uppercase tracking-[0.08em] text-[var(--color-charcoal)]/60">
                    <tr>
                        <th scope="col" class="px-6 py-4">Order</th>
                        <th scope="col" class="px-6 py-4">Customer</th>
                        <th scope="col" class="px-6 py-4">Amount</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Payment</th>
                        <th scope="col" class="px-6 py-4">Date</th>
                        <th scope="col" class="px-6 py-4 text-right">View</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5" data-filter-target="transaction-status">
                    @foreach ($transactions as $tx)
                        @php
                            $statusBadge = match ($tx['status']) {
                                'completed' => [
                                    'label' => 'Completed',
                                    'classes' => 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]',
                                    'icon' => '<path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>',
                                ],
                                'pending' => [
                                    'label' => 'Pending',
                                    'classes' => 'bg-[var(--color-orange)]/10 text-[var(--color-orange)]',
                                    'icon' => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3" stroke-linecap="round" stroke-linejoin="round"/>',
                                ],
                                'failed' => [
                                    'label' => 'Failed',
                                    'classes' => 'bg-black/10 text-[var(--color-charcoal)]/70',
                                    'icon' => '<circle cx="12" cy="12" r="9"/><path d="m9 9 6 6M15 9l-6 6" stroke-linecap="round"/>',
                                ],
                                default => [
                                    'label' => ucfirst($tx['status']),
                                    'classes' => 'bg-black/5 text-[var(--color-charcoal)]/70',
                                    'icon' => '<circle cx="12" cy="12" r="9"/>',
                                ],
                            };
                        @endphp
                        <tr
                            data-filter-tag="{{ $tx['status'] }}"
                            class="bg-white transition hover:bg-[var(--color-offwhite)]/60"
                        >
                            <td class="px-6 py-5 align-top">
                                <p class="font-display text-base font-semibold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                    {{ $tx['order'] }}
                                </p>
                                <p class="mt-1 text-sm text-[var(--color-charcoal)]/60">
                                    {{ $tx['items'] }} {{ $tx['items'] === 1 ? 'item' : 'items' }}
                                </p>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <p class="font-display text-base font-semibold text-[var(--color-charcoal)]">{{ $tx['customer'] }}</p>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <p class="font-display text-base font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($tx['amount'], 0, ',', '.') }}</p>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="inline-flex items-center gap-2 rounded-[10px] px-3 py-1.5 text-xs font-semibold {{ $statusBadge['classes'] }}">
                                    <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        {!! $statusBadge['icon'] !!}
                                    </svg>
                                    {{ $statusBadge['label'] }}
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle text-sm text-[var(--color-charcoal)]">
                                {{ $tx['payment'] }}
                            </td>
                            <td class="px-6 py-5 align-middle text-sm text-[var(--color-charcoal)]">
                                {{ $tx['date'] }}
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex justify-end">
                                    <button
                                        type="button"
                                        data-transaction-modal-open
                                        data-transaction-payload="{{ json_encode([
                                            'order' => $tx['order'],
                                            'total' => 'Rp. ' . number_format($tx['amount'], 0, ',', '.'),
                                            'customer' => $tx['customer'],
                                            'email' => strtolower(str_replace(' ', '.', $tx['customer'])) . '@example.com',
                                            'payment' => $tx['payment'],
                                            'date' => $tx['date'],
                                            'items' => $tx['items'] . ' item' . ($tx['items'] === 1 ? '' : 's'),
                                            'status' => $tx['status'],
                                        ], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) }}"
                                        aria-label="View {{ $tx['order'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div
                data-filter-empty="transaction-status"
                class="hidden px-6 py-16 text-center text-sm text-[var(--color-charcoal)]/60"
            >
                No transactions match this status.
            </div>
        </div>
    </section>
@endsection

@push('modals')
    @include('admin.partials.transaction-modal')
@endpush
