
<div class="flex h-full flex-col gap-6">

<section
        aria-labelledby="shipping-info-title"
        class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8"
    >
        <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <rect x="2" y="7" width="13" height="10" rx="2"/>
                <path d="M15 10h4l3 3v4h-7" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="6" cy="19" r="2"/>
                <circle cx="18" cy="19" r="2"/>
            </svg>
            <h3 id="shipping-info-title" class="font-display text-xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
                Shipping Information
            </h3>
        </div>

        <dl class="mt-6 space-y-5">
            <div>
                <dt class="text-sm font-medium text-[var(--color-charcoal)]/60">Order Number</dt>
                <dd class="mt-1 text-base font-semibold text-[var(--color-charcoal)]">{{ $orderNumber }}</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-[var(--color-charcoal)]/60">Estimated Delivery</dt>
                <dd class="mt-1 text-base font-semibold text-[var(--color-charcoal)]">May 18 – May 22, 2026</dd>
            </div>
            <div>
                <dt class="text-sm font-medium text-[var(--color-charcoal)]/60">Shipping Address</dt>
                <dd class="mt-1 text-base leading-[1.5] text-[var(--color-charcoal)]">
                    123 Summit Trail<br>
                    Boulder, CO 80302<br>
                    United States
                </dd>
            </div>
        </dl>
    </section>

<section
        aria-labelledby="payment-method-title"
        class="flex flex-1 flex-col rounded-2xl border border-black/5 bg-white p-[33px] shadow-[0_2px_8px_0_rgba(0,0,0,0.04)]"
    >
        <div class="flex items-center gap-3">
            <svg class="h-6 w-6 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <rect x="2" y="6" width="20" height="14" rx="2"/>
                <path d="M2 10h20" stroke-linecap="round"/>
                <path d="M6 15h4" stroke-linecap="round"/>
            </svg>
            <h3 id="payment-method-title" class="font-display text-xl font-bold leading-[1.5] tracking-[-0.025em] text-[var(--color-charcoal)]">
                Payment Method
            </h3>
        </div>

        <div class="mt-6 flex flex-1 items-center justify-between">
            <p class="text-base text-[var(--color-charcoal)]">Visa ending in 3456</p>
            <span class="inline-flex items-center rounded-[10px] bg-[var(--color-forest)]/10 px-4 py-2 text-sm font-semibold text-[var(--color-forest)]">
                Paid
            </span>
        </div>
    </section>
</div>
