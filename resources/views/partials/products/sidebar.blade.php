
<div class="rounded-3xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] lg:sticky lg:top-28">

<section aria-labelledby="filter-categories-title">
        <h3 id="filter-categories-title" class="font-display text-lg font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
            Categories
        </h3>

        <ul class="mt-6 flex flex-col gap-2">
            @foreach ($categories as $cat)
                @php $isActive = $cat['key'] === $activeCategory; @endphp
                <li>
                    <a
                        href="{{ $cat['key'] === 'all' ? route('products') : route('products', ['category' => $cat['key']]) }}"
                        @if ($isActive) aria-current="page" @endif
                        class="
                            flex items-center justify-between rounded-2xl px-4 py-3 text-[15px] font-semibold transition
                            @if ($isActive)
                                bg-[var(--color-charcoal)] text-white
                            @else
                                text-[var(--color-charcoal)]/80 hover:bg-black/5 hover:text-[var(--color-charcoal)]
                            @endif
                        "
                    >
                        <span>{{ $cat['label'] }}</span>
                        @if ($isActive)
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M5 12l5 5L20 7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </section>

<section aria-labelledby="filter-price-title" class="mt-10 border-t border-black/5 pt-8">
        <h3 id="filter-price-title" class="font-display text-base font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
            Price Range
        </h3>

        <ul class="mt-5 flex flex-col gap-3">
            @foreach ([
                ['under-3m', 'Under Rp. 3.000.000'],
                ['3m-6m', 'Rp. 3.000.000 – Rp. 6.000.000'],
                ['6m-9m', 'Rp. 6.000.000 – Rp. 9.000.000'],
                ['over-9m', 'Over Rp. 9.000.000'],
            ] as [$id, $label])
                <li>
                    <label for="price-{{ $id }}" class="flex cursor-pointer items-center gap-3 text-sm text-[var(--color-charcoal)]/80">
                        <input
                            id="price-{{ $id }}"
                            type="checkbox"
                            class="h-4 w-4 rounded border-black/20 text-[var(--color-charcoal)] accent-[var(--color-charcoal)] focus:ring-2 focus:ring-[var(--color-charcoal)]/30"
                        >
                        <span>{{ $label }}</span>
                    </label>
                </li>
            @endforeach
        </ul>
    </section>
</div>
