
<section
    aria-labelledby="related-title"
    class="bg-[var(--color-offwhite)] py-24 lg:py-28"
>
    <div class="container-x">
        <header class="reveal">
            <h2
                id="related-title"
                class="font-display text-3xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[48px]"
            >
                Complete Your Setup
            </h2>
        </header>

        <ul class="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-10">
            @foreach ($related as $item)
                <li class="reveal">
                    <a
                        href="{{ route('product.show', ['category' => $item['category'], 'slug' => $item['slug']]) }}"
                        class="card-image group flex h-full flex-col overflow-hidden rounded-3xl border border-black/5 bg-white shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_-20px_rgba(28,28,28,0.18)]"
                    >
                        <div class="relative h-[260px] shrink-0 overflow-hidden bg-[var(--color-stone)]/30 sm:h-[280px] lg:h-[298px]">
                            <img
                                src="{{ $item['image'] }}"
                                alt="{{ $item['name'] }}"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover"
                            >
                        </div>

                        <div class="flex flex-1 flex-col p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--color-charcoal)]/50">
                                {{ $item['categoryLabel'] }}
                            </p>
                            <h3 class="mt-2 font-display text-xl font-bold leading-[1.25] tracking-[-0.025em] text-[var(--color-charcoal)]">
                                {{ $item['name'] }}
                            </h3>
                            <p class="mt-auto pt-4 font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                Rp. {{ number_format($item['price'], 0, ',', '.') }}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>
