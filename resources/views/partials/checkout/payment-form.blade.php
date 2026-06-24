
<section
    aria-labelledby="payment-title"
    class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-10"
>
    <h2 id="payment-title" class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
        Payment Method
    </h2>

<fieldset class="mt-8">
        <legend class="sr-only">Payment method</legend>
        <div class="grid gap-4 sm:grid-cols-2" role="radiogroup">
            <label class="inline-flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-[var(--color-forest)] bg-[var(--color-forest)]/5 p-6 text-[var(--color-charcoal)] transition">
                <input type="radio" name="payment_method" value="card" checked class="sr-only">
                <span aria-hidden="true" class="flex h-10 w-10 items-center justify-center rounded-full bg-[var(--color-forest)] text-white">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <rect x="2" y="6" width="20" height="14" rx="2"/>
                        <path d="M2 10h20" stroke-linecap="round"/>
                    </svg>
                </span>
                <span class="text-[15px] font-semibold">Credit / Debit Card</span>
            </label>

            <label class="inline-flex cursor-pointer items-center gap-4 rounded-2xl border-2 border-black/5 bg-white p-6 text-[var(--color-charcoal)]/70 transition hover:border-black/15 hover:text-[var(--color-charcoal)]">
                <input type="radio" name="payment_method" value="paypal" class="sr-only">
                <span aria-hidden="true" class="flex h-10 w-10 items-center justify-center rounded-full bg-[var(--color-offwhite)] text-[var(--color-charcoal)]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M7 4h7a4 4 0 0 1 0 8h-3l-1 8H6L7 4z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="text-[15px] font-semibold">PayPal</span>
            </label>
        </div>
    </fieldset>

<div class="mt-8 grid gap-6 border-t border-black/5 pt-8 sm:grid-cols-3">
        <div class="sm:col-span-3">
            <label for="card-number" class="text-sm font-semibold text-[var(--color-charcoal)]">Card Number</label>
            <input
                id="card-number"
                name="card_number"
                type="text"
                inputmode="numeric"
                placeholder="1234 5678 9012 3456"
                autocomplete="cc-number"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div class="sm:col-span-2">
            <label for="card-expiry" class="text-sm font-semibold text-[var(--color-charcoal)]">Expiry Date</label>
            <input
                id="card-expiry"
                name="expiry"
                type="text"
                placeholder="MM / YY"
                autocomplete="cc-exp"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>
        <div>
            <label for="card-cvv" class="text-sm font-semibold text-[var(--color-charcoal)]">CVV</label>
            <input
                id="card-cvv"
                name="cvv"
                type="text"
                inputmode="numeric"
                placeholder="123"
                autocomplete="cc-csc"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div class="sm:col-span-3">
            <label for="card-name" class="text-sm font-semibold text-[var(--color-charcoal)]">Cardholder Name</label>
            <input
                id="card-name"
                name="card_name"
                type="text"
                placeholder="John Doe"
                autocomplete="cc-name"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>
    </div>
</section>
