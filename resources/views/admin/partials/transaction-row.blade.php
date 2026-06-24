@php
    $status = $tx['status'] ?? 'completed';

    $badgeClasses = match ($status) {
        'completed' => 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]',
        'pending'   => 'bg-amber-50 text-amber-700',
        'failed'    => 'bg-rose-50 text-rose-700',
        default     => 'bg-black/5 text-[var(--color-charcoal)]',
    };
@endphp

<li class="flex items-center justify-between gap-4 py-5">
    <div class="min-w-0 flex-1">
        <p class="font-display text-base font-semibold tracking-[-0.025em] text-[var(--color-charcoal)]">
            {{ $tx['name'] }}
        </p>
        <p class="mt-1 text-sm text-[var(--color-charcoal)]/60">
            {{ $tx['order'] }} · {{ $tx['date'] }}
        </p>
    </div>

    <div class="flex shrink-0 items-center gap-3 sm:gap-6">
        <p class="font-display text-base font-bold text-[var(--color-charcoal)] sm:text-lg">
            {{ $tx['amount'] }}
        </p>
        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold capitalize {{ $badgeClasses }}">
            {{ ucfirst($status) }}
        </span>
    </div>
</li>
