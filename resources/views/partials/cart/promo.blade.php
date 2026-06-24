
<section
    aria-labelledby="promo-title"
    class="rounded-3xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8"
>
    <div class="flex items-center gap-3">
        <svg class="h-5 w-5 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
            <path d="M20.59 13.41 13.42 20.58a2 2 0 0 1-2.83 0l-8.59-8.59A2 2 0 0 1 1.41 10l.59-8h8l8.59 8.59a2 2 0 0 1 0 2.82z" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="7.5" cy="7.5" r="1.2" fill="currentColor" stroke="none"/>
        </svg>
        <h3 id="promo-title" class="font-display text-lg font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-xl">
            Promo Code
        </h3>
    </div>

    <form action="#" method="post" class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-4" onsubmit="event.preventDefault();">
        <label for="promo-input" class="sr-only">Promo code</label>
        <input
            id="promo-input"
            type="text"
            name="code"
            placeholder="Enter code"
            autocomplete="off"
            class="w-full rounded-2xl border border-black/10 bg-white px-5 py-4 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
        >
        <button
            type="submit"
            class="inline-flex items-center justify-center rounded-2xl bg-[var(--color-charcoal)] px-8 py-4 text-base font-semibold text-white transition hover:bg-[var(--color-forest)]"
        >
            Apply
        </button>
    </form>
</section>
