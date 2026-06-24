
<div
    data-toast
    role="status"
    aria-live="polite"
    aria-atomic="true"
    class="
        pointer-events-none fixed bottom-6 right-6 z-[70]
        flex max-w-sm items-start gap-4
        translate-y-4 opacity-0 transition-all duration-300
        rounded-2xl border border-white/10 bg-[var(--color-charcoal)] p-5 text-white shadow-[0_24px_50px_-20px_rgba(0,0,0,0.45)]
        [&.is-visible]:translate-y-0 [&.is-visible]:opacity-100 [&.is-visible]:pointer-events-auto
    "
>
    <span aria-hidden="true" class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[var(--color-forest)] text-white">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M5 12l5 5L20 7" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </span>
    <div class="flex-1">
        <p data-toast-title class="font-display text-base font-bold">Added to cart</p>
        <p data-toast-message class="mt-1 text-sm text-white/75"></p>
        <a
            href="{{ route('cart') }}"
            class="mt-3 inline-flex items-center gap-1.5 text-sm font-semibold text-white underline-offset-4 hover:underline"
        >
            View cart
            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <button
        type="button"
        data-toast-close
        aria-label="Dismiss"
        class="-mt-1 -mr-1 inline-flex h-7 w-7 items-center justify-center rounded-full text-white/60 transition hover:bg-white/10 hover:text-white"
    >
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
            <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/>
        </svg>
    </button>
</div>
