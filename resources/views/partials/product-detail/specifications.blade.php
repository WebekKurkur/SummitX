
<section
    aria-labelledby="specs-title"
    class="bg-white py-24 lg:py-28"
>
    <div class="container-x">
        <header class="reveal max-w-4xl">
            <p class="text-[13px] font-semibold uppercase tracking-[0.18em] text-[var(--color-forest)]">
                Technical Specifications
            </p>
            <h2
                id="specs-title"
                class="mt-4 font-display text-3xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[48px]"
            >
                Engineered for Extreme Expeditions
            </h2>
        </header>

        @if (! empty($product['specs']))
            <div class="reveal mt-12 rounded-3xl border border-black/5 bg-[var(--color-offwhite)] p-8 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] lg:p-10">
                <h3 class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[28px]">
                    Specifications
                </h3>

                <dl class="mt-8 divide-y divide-black/5">
                    @foreach ($product['specs'] as $label => $value)
                        <div class="flex flex-col gap-1 py-5 sm:flex-row sm:items-baseline sm:justify-between sm:gap-6">
                            <dt class="text-[15px] font-semibold text-[var(--color-charcoal)]/80">
                                {{ $label }}
                            </dt>
                            <dd class="text-[15px] text-[var(--color-charcoal)] sm:text-right">
                                {{ $value }}
                            </dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        @endif
    </div>
</section>
