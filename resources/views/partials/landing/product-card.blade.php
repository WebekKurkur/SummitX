
@php
    $aspect ??= 'aspect-[4/3]';
@endphp

<a href="#" class="card-image group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition hover:shadow-card">
    <div class="{{ $aspect }} relative overflow-hidden bg-[var(--color-stone)]/30">
        <img
            src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}"
            loading="lazy"
            class="absolute inset-0 h-full w-full object-cover"
        >
    </div>

    <div class="flex flex-1 flex-col p-7 lg:p-8">

        <div class="flex-1">
            <p class="text-xs font-medium tracking-[0.18em] uppercase text-[var(--color-mist)]">
                {{ $product['tag'] }}
            </p>
            <h3 class="mt-2 font-display text-2xl font-bold text-[var(--color-charcoal)]">
                {{ $product['name'] }}
            </h3>

            <div class="mt-5 flex items-center justify-between text-sm">
                <span class="inline-flex items-center gap-1.5 text-[var(--color-charcoal)]/80">
                    <svg class="h-4 w-4 text-[var(--color-orange)]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 2.5l2.92 6.32 6.58.7-4.92 4.5 1.4 6.48L12 17.27 5.02 20.5l1.4-6.48L1.5 9.52l6.58-.7L12 2.5z"/>
                    </svg>
                    <span>{{ $product['rating'] }}</span>
                </span>
                <span class="font-display text-2xl font-bold text-[var(--color-charcoal)]">Rp. {{ number_format($product['price'], 0, ',', '.') }}</span>
            </div>
        </div>

        <span class="mt-7 inline-flex items-center justify-center gap-2 rounded-full bg-[var(--color-charcoal)] py-3.5 text-sm font-medium text-[var(--color-offwhite)] transition group-hover:bg-[var(--color-forest)]">
            View Details
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </div>
</a>
