
<section
    aria-labelledby="summary-title"
    class="rounded-3xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8 lg:sticky lg:top-28"
>
    <h2 id="summary-title" class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[28px]">
        Order Summary
    </h2>

    <dl class="mt-8 space-y-4 text-base">
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/70">Subtotal</dt>
            <dd class="font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($subtotal, 0, ',', '.') }}</dd>
        </div>
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/70">Shipping</dt>
            <dd class="font-semibold text-[var(--color-forest)]">{{ $shipping === 0 ? 'Free' : 'Rp. ' . number_format($shipping, 0, ',', '.') }}</dd>
        </div>
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/70">Estimated Tax</dt>
            <dd class="font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($tax, 0, ',', '.') }}</dd>
        </div>
    </dl>

    <div class="mt-8 flex items-baseline justify-between border-t border-black/10 pt-6">
        <span class="font-display text-lg font-bold text-[var(--color-charcoal)]">Total</span>
        <span class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[32px]">
            Rp. {{ number_format($total, 0, ',', '.') }}
        </span>
    </div>

    <a
        href="{{ route('checkout') }}"
        class="mt-8 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-4 text-base font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
    >
        Proceed to Checkout
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
            <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>

    <ul class="mt-8 space-y-3 text-center text-sm text-[var(--color-charcoal)]/55">
        <li>Free shipping on orders over Rp. 3.000.000</li>
        <li>Secure checkout with SSL encryption</li>
    </ul>
</section>
