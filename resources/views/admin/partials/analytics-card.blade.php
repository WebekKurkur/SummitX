@php
    $iconPaths = [
        'revenue'    => '<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" stroke-linecap="round" stroke-linejoin="round"/>',
        'orders'     => '<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" stroke-linejoin="round"/><path d="M3 6h18M16 10a4 4 0 0 1-8 0" stroke-linecap="round"/>',
        'users'      => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke-linecap="round" stroke-linejoin="round"/>',
        'conversion' => '<path d="M3 17 9 11l4 4 8-8" stroke-linecap="round" stroke-linejoin="round"/><path d="M14 7h7v7" stroke-linecap="round" stroke-linejoin="round"/>',
    ];

    $isUp = ($kpi['trend'] ?? 'up') === 'up';
@endphp

<article class="rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-7">
    <div class="flex items-start justify-between">
        <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[var(--color-forest)]/10 text-[var(--color-forest)]" aria-hidden="true">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                {!! $iconPaths[$kpi['icon']] ?? $iconPaths['revenue'] !!}
            </svg>
        </span>
        <span
            @class([
                'inline-flex items-center gap-1 rounded-full px-3 py-1 text-xs font-semibold',
                'bg-[var(--color-forest)]/10 text-[var(--color-forest)]' => $isUp,
                'bg-rose-50 text-rose-700' => ! $isUp,
            ])
        >
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                @if ($isUp)
                    <path d="M7 17 17 7M9 7h8v8" stroke-linecap="round" stroke-linejoin="round"/>
                @else
                    <path d="M17 7 7 17M15 17H7v-8" stroke-linecap="round" stroke-linejoin="round"/>
                @endif
            </svg>
            {{ $kpi['change'] }}
        </span>
    </div>

    <p class="mt-7 text-sm font-medium text-[var(--color-charcoal)]/60">{{ $kpi['label'] }}</p>
    <p class="mt-2 font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] sm:text-[36px]">
        {{ $kpi['value'] }}
    </p>
</article>
