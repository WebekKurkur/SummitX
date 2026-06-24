
@php
    $variant ??= 'standard';

    // Image sizing per variant matches Figma node ratios.
    $imageClass = match ($variant) {
        'feature' => 'aspect-[765/747]',
        'tall'    => 'aspect-[535/765]',
        default   => 'h-[200px] sm:h-[240px] lg:h-[280px]',
    };

    // Title scale per variant matches Figma heading sizes.
    $titleClass = match ($variant) {
        'feature' => 'text-2xl sm:text-3xl lg:text-[30px] lg:leading-[1.25]',
        default   => 'text-xl lg:text-[20px] lg:leading-[1.25]',
    };

    // Inner padding matches Figma (feature 36px, others 28px).
    $padding = $variant === 'feature' ? 'p-7 lg:p-9' : 'p-7';
@endphp

<a
    href="#"
    class="card-image group flex h-full flex-col overflow-hidden rounded-3xl border border-black/5 bg-white shadow-[0_2px_20px_0_rgba(0,0,0,0.06)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_-20px_rgba(28,28,28,0.18)]"
>
    <div class="relative shrink-0 overflow-hidden bg-[var(--color-stone)]/30 {{ $imageClass }}">
        <img
            src="{{ $article['image'] }}"
            alt="{{ $article['title'] }}"
            loading="lazy"
            class="absolute inset-0 h-full w-full object-cover"
        >
    </div>

    <div class="flex flex-1 flex-col {{ $padding }}">
        <h3 class="font-display font-bold tracking-[-0.025em] text-[var(--color-charcoal)] {{ $titleClass }}">
            {{ $article['title'] }}
        </h3>

        @if (! empty($article['excerpt']))
            <p class="mt-4 text-[15px] leading-[1.625] text-[var(--color-charcoal)]/70">
                {{ $article['excerpt'] }}
            </p>
        @endif

        <footer class="mt-auto flex items-center justify-between gap-4 border-t border-black/5 pt-5 text-[13px] text-[var(--color-charcoal)]/60">
            <div class="flex items-center gap-2">
                <span class="font-medium text-[var(--color-charcoal)]/80">{{ $article['author'] }}</span>
                <span aria-hidden="true">·</span>
                <span>{{ $article['date'] }}</span>
            </div>
            <span class="inline-flex items-center gap-1.5 whitespace-nowrap">
                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 7v5l3 2" stroke-linecap="round"/>
                </svg>
                {{ $article['time'] }}
            </span>
        </footer>
    </div>
</a>
