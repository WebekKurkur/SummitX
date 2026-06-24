
<div class="mt-8">
    @if (count($visible) === 0)
        <div class="rounded-3xl border border-dashed border-black/10 bg-white p-14 text-center">
            <p class="font-display text-2xl font-bold text-[var(--color-charcoal)]">No products yet</p>
            <p class="mt-3 text-[var(--color-charcoal)]/60">
                Nothing in this category yet — check back soon, or
                <a href="{{ route('products') }}" class="font-semibold text-[var(--color-forest)] underline underline-offset-4 hover:text-[var(--color-charcoal)]">view all products</a>.
            </p>
        </div>
    @else
        <ul class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-10">
            @foreach ($visible as $product)
                <li class="reveal">
                    <a
                        href="{{ route('product.show', ['category' => $product['category'], 'slug' => $product['slug']]) }}"
                        class="card-image group flex h-full flex-col overflow-hidden rounded-3xl border border-black/5 bg-white shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_-20px_rgba(28,28,28,0.18)]"
                    >
                        <div class="relative h-[260px] shrink-0 overflow-hidden bg-[var(--color-stone)]/30 sm:h-[320px] lg:h-[388px]">
                            <img
                                src="{{ $product['image'] }}"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover"
                            >
                        </div>

                        <div class="flex flex-1 flex-col p-6">
                            <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--color-charcoal)]/50">
                                {{ $product['categoryLabel'] }}
                            </p>
                            <h3 class="mt-2 font-display text-xl font-bold leading-[1.25] tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[20px]">
                                {{ $product['name'] }}
                            </h3>
                            <p class="mt-auto pt-4 font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                Rp. {{ number_format($product['price'], 0, ',', '.') }}
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
