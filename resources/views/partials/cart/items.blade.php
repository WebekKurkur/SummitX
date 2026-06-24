
<ul class="flex flex-col gap-6">
    @foreach ($items as $item)
        <li>
            <article class="rounded-3xl border border-black/5 bg-white p-6 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-8">
                <div class="flex flex-col gap-6 sm:flex-row sm:gap-8">

<a
                        href="{{ route('product.show', ['category' => $item['category'], 'slug' => $item['slug']]) }}"
                        class="card-image group relative block aspect-square w-full shrink-0 overflow-hidden rounded-2xl bg-[var(--color-stone)]/30 sm:h-40 sm:w-40"
                    >
                        <img
                            src="{{ $item['image'] }}"
                            alt="{{ $item['name'] }}"
                            loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                    </a>

<div class="flex flex-1 flex-col">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--color-charcoal)]/50">
                                    {{ $item['categoryLabel'] }}
                                </p>
                                <h3 class="mt-2 font-display text-xl font-bold leading-tight tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[22px]">
                                    <a
                                        href="{{ route('product.show', ['category' => $item['category'], 'slug' => $item['slug']]) }}"
                                        class="transition hover:text-[var(--color-forest)]"
                                    >
                                        {{ $item['name'] }}
                                    </a>
                                </h3>
                                <p class="mt-3 flex flex-wrap items-center gap-2 text-sm text-[var(--color-charcoal)]/65">
                                    @foreach ($item['variants'] as $i => $v)
                                        <span>{{ $v }}</span>
                                        @if ($i < count($item['variants']) - 1)
                                            <span aria-hidden="true" class="h-1 w-1 rounded-full bg-[var(--color-charcoal)]/30"></span>
                                        @endif
                                    @endforeach
                                </p>
                            </div>

                            <button
                                type="button"
                                aria-label="Remove {{ $item['name'] }} from cart"
                                class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-[var(--color-charcoal)]/60 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </div>

                        <div class="mt-auto flex items-center justify-between gap-4 pt-6">

                            <div class="inline-flex h-10 items-center overflow-hidden rounded-2xl border border-black/10 bg-white">
                                <button
                                    type="button"
                                    aria-label="Decrease quantity"
                                    class="inline-flex h-10 w-10 items-center justify-center text-[var(--color-charcoal)] transition hover:bg-black/5"
                                >
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M5 12h14" stroke-linecap="round"/>
                                    </svg>
                                </button>
                                <span class="inline-flex h-10 w-12 items-center justify-center border-x border-black/10 text-base font-semibold text-[var(--color-charcoal)]">
                                    {{ $item['quantity'] }}
                                </span>
                                <button
                                    type="button"
                                    aria-label="Increase quantity"
                                    class="inline-flex h-10 w-10 items-center justify-center text-[var(--color-charcoal)] transition hover:bg-black/5"
                                >
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </div>

<p class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                Rp. {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </li>
    @endforeach
</ul>
