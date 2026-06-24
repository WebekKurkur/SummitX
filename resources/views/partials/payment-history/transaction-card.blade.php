
@php
    $status = $tx['status'] ?? 'delivered';

    // Status pill chrome derived from semantic state.
    $badgeClasses = match ($status) {
        'in-transit' => 'bg-amber-50 text-amber-700',
        'delivered'  => 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]',
        'cancelled'  => 'bg-rose-50 text-rose-700',
        default      => 'bg-black/5 text-[var(--color-charcoal)]',
    };

    $badgeIcon = match ($status) {
        'in-transit' => '<rect x="2" y="6" width="13" height="11" rx="2"/><path d="M15 9h4l3 3v5h-7" stroke-linecap="round" stroke-linejoin="round"/><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/>',
        'delivered'  => '<circle cx="12" cy="12" r="9"/><path d="M8 12l3 3 5-6" stroke-linecap="round" stroke-linejoin="round"/>',
        'cancelled'  => '<circle cx="12" cy="12" r="9"/><path d="M9 9l6 6M15 9l-6 6" stroke-linecap="round"/>',
        default      => '<circle cx="12" cy="12" r="9"/>',
    };
@endphp

<article
    aria-labelledby="order-{{ $tx['order'] }}"
    class="rounded-3xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8"
>

    <header class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between sm:gap-6">
        <div>
            <p class="text-sm text-[var(--color-charcoal)]/60">{{ $tx['date'] }}</p>
            <h2
                id="order-{{ $tx['order'] }}"
                class="mt-2 font-display text-xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[22px]"
            >
                Order {{ $tx['order'] }}
            </h2>
            <p class="mt-2 font-display text-lg font-semibold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-xl">
                Rp. {{ number_format($tx['total'], 0, ',', '.') }}
            </p>
        </div>

        <span class="inline-flex shrink-0 items-center gap-2 self-start rounded-full px-4 py-2 text-sm font-semibold {{ $badgeClasses }}">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                {!! $badgeIcon !!}
            </svg>
            {{ $tx['statusLabel'] }}
        </span>
    </header>

<ul class="mt-8 flex flex-col gap-4 border-t border-black/5 pt-7">
        @foreach ($tx['items'] as $item)
            <li class="flex items-center gap-4">
                <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-[var(--color-offwhite)]">
                    <img
                        src="{{ $item['image'] }}"
                        alt="{{ $item['name'] }}"
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover"
                    >
                </div>
                <div class="min-w-0 flex-1">
                    <h3 class="font-display text-[15px] font-semibold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-base">
                        {{ $item['name'] }}
                    </h3>
                    <p class="mt-1 text-[13px] text-[var(--color-charcoal)]/60 lg:text-sm">
                        {{ $item['meta'] }}
                    </p>
                </div>
            </li>
        @endforeach
    </ul>

@if (! empty($tx['collapsed']))
        <button
            type="button"
            class="mt-5 flex w-full items-center justify-center gap-2 rounded-2xl border border-black/10 bg-[var(--color-offwhite)] px-5 py-3 text-sm font-semibold text-[var(--color-charcoal)]/80 transition hover:border-black/30 hover:bg-white"
        >
            Show {{ $tx['collapsed'] }} More {{ $tx['collapsed'] === 1 ? 'Item' : 'Items' }}
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    @endif

@if (! empty($tx['buyAgain']))
        <div class="mt-7 border-t border-black/5 pt-6">
            <a
                href="{{ route('products') }}"
                class="inline-flex items-center gap-2 rounded-2xl border border-black/10 bg-white px-6 py-3 text-sm font-semibold text-[var(--color-charcoal)] transition hover:border-[var(--color-charcoal)] hover:bg-[var(--color-charcoal)] hover:text-white"
            >
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M3 12a9 9 0 1 0 3-6.7L3 8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 3v5h5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Buy Again
            </a>
        </div>
    @endif
</article>
