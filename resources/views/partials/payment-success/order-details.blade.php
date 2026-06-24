
<section
    aria-labelledby="order-details-title"
    class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-10"
>
    <h2 id="order-details-title" class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
        Order Details
    </h2>

<ul class="mt-8 flex flex-col gap-6 border-b border-black/5 pb-6">
        @foreach ($items as $item)
            <li class="flex items-start gap-4">
                <div class="relative h-20 w-20 shrink-0 overflow-hidden rounded-2xl bg-[var(--color-offwhite)]">
                    <img
                        src="{{ $item['image'] }}"
                        alt="{{ $item['name'] }}"
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover"
                    >
                </div>
                <div class="flex-1">
                    <h3 class="font-display text-[15px] font-medium tracking-[-0.025em] text-[var(--color-charcoal)]">
                        {{ $item['name'] }}
                    </h3>
                    <p class="mt-1.5 text-[13px] font-medium text-[var(--color-charcoal)]/60">
                        {{ $item['variants'] }}
                    </p>
                    <div class="mt-3 flex items-baseline justify-between text-sm">
                        <span class="font-medium text-[var(--color-charcoal)]/60">Qty: {{ $item['quantity'] }}</span>
                        <span class="font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

<dl class="mt-6 space-y-4 text-base">
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/60">Subtotal</dt>
            <dd class="font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($subtotal, 0, ',', '.') }}</dd>
        </div>
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/60">Shipping</dt>
            <dd class="font-semibold text-[var(--color-forest)]">{{ $shipping === 0 ? 'Free' : 'Rp. ' . number_format($shipping, 0, ',', '.') }}</dd>
        </div>
        <div class="flex items-baseline justify-between">
            <dt class="text-[var(--color-charcoal)]/60">Tax</dt>
            <dd class="font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($tax, 0, ',', '.') }}</dd>
        </div>
    </dl>

    <div class="mt-6 flex items-baseline justify-between border-t border-black/5 pt-6">
        <span class="font-display text-xl font-bold text-[var(--color-charcoal)]">Total</span>
        <span class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[28px]">
            Rp. {{ number_format($total, 0, ',', '.') }}
        </span>
    </div>
</section>
