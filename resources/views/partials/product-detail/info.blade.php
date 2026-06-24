
<div class="lg:sticky lg:top-28">

<p class="text-[13px] font-semibold uppercase tracking-[0.18em] text-[var(--color-forest)]">
        {{ $product['categoryLabel'] }}
    </p>

<h1 id="product-title" class="mt-4 font-display text-3xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px] lg:leading-[1.1]">
        {{ $product['name'] }}
    </h1>

@if ($product['reviews'] > 0)
        <div class="mt-5 flex items-center gap-3 text-[15px]">
            <span class="flex items-center gap-0.5 text-[var(--color-orange)]" aria-label="Rated {{ $product['rating'] }} out of 5">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M12 2.5l2.92 6.32 6.58.7-4.92 4.5 1.4 6.48L12 17.27 5.02 20.5l1.4-6.48L1.5 9.52l6.58-.7L12 2.5z"/>
                    </svg>
                @endfor
            </span>
            <span class="text-[var(--color-charcoal)]/65">
                {{ number_format($product['rating'], 1) }} ({{ $product['reviews'] }} reviews)
            </span>
        </div>
    @endif

<p class="mt-7 font-display text-5xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] lg:text-[56px]">
        Rp. {{ number_format($product['price'], 0, ',', '.') }}
    </p>

<p class="mt-7 text-[17px] leading-[1.625] text-[var(--color-charcoal)]/75">
        {{ $product['description'] }}
    </p>

    <form aria-label="Configure product" class="mt-10 space-y-8" onsubmit="event.preventDefault();">

@if (! empty($product['capacities']))
            <fieldset>
                <legend class="text-base font-semibold text-[var(--color-charcoal)]">Capacity</legend>
                <div class="mt-3 grid grid-cols-3 gap-3" role="radiogroup">
                    @foreach ($product['capacities'] as $size)
                        @php $isActive = $size === $product['defaultCapacity']; @endphp
                        <label
                            @class([
                                'inline-flex h-12 cursor-pointer items-center justify-center rounded-2xl border text-base font-semibold transition',
                                'border-[var(--color-charcoal)] bg-[var(--color-charcoal)] text-white' => $isActive,
                                'border-black/10 bg-white text-[var(--color-charcoal)] hover:border-black/30' => ! $isActive,
                            ])
                        >
                            <input
                                type="radio"
                                name="capacity"
                                value="{{ $size }}"
                                @checked($isActive)
                                class="sr-only"
                            >
                            <span>{{ $size }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>
        @endif

@if (! empty($product['colors']))
            <fieldset>
                <legend class="text-base font-semibold text-[var(--color-charcoal)]">Color</legend>
                <div class="mt-3 grid grid-cols-3 gap-3" role="radiogroup">
                    @foreach ($product['colors'] as $color)
                        @php $isActive = $color === $product['defaultColor']; @endphp
                        <label
                            @class([
                                'inline-flex h-12 cursor-pointer items-center justify-center rounded-2xl border text-sm font-semibold transition',
                                'border-[var(--color-charcoal)] bg-[var(--color-charcoal)] text-white' => $isActive,
                                'border-black/10 bg-white text-[var(--color-charcoal)] hover:border-black/30' => ! $isActive,
                            ])
                        >
                            <input
                                type="radio"
                                name="color"
                                value="{{ $color }}"
                                @checked($isActive)
                                class="sr-only"
                            >
                            <span>{{ $color }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>
        @endif

<div>
            <p class="text-base font-semibold text-[var(--color-charcoal)]">Quantity</p>
            <div class="mt-3 inline-flex h-12 items-center overflow-hidden rounded-2xl border border-black/10 bg-white">
                <button
                    type="button"
                    data-qty-decrement
                    aria-label="Decrease quantity"
                    class="inline-flex h-12 w-12 items-center justify-center text-2xl text-[var(--color-charcoal)] transition hover:bg-black/5"
                >
                    −
                </button>
                <input
                    type="number"
                    name="quantity"
                    min="1"
                    max="99"
                    value="1"
                    data-qty-input
                    aria-label="Quantity"
                    class="h-12 w-16 border-x border-black/10 bg-transparent text-center text-base font-semibold text-[var(--color-charcoal)] focus:outline-none [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                >
                <button
                    type="button"
                    data-qty-increment
                    aria-label="Increase quantity"
                    class="inline-flex h-12 w-12 items-center justify-center text-2xl text-[var(--color-charcoal)] transition hover:bg-black/5"
                >
                    +
                </button>
            </div>
        </div>

<div class="flex items-stretch gap-3 pt-2">
            <a
                href="{{ route('cart') }}"
                class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-4 text-base font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
            >
                Checkout
            </a>

            <button
                type="button"
                data-add-to-cart
                data-product-name="{{ $product['name'] }}"
                aria-label="Add to cart"
                class="inline-flex h-14 w-14 items-center justify-center rounded-2xl border border-black/10 bg-white text-[var(--color-charcoal)] transition hover:border-black/30 hover:bg-black/5"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <circle cx="9" cy="20" r="1.5"/>
                    <circle cx="17" cy="20" r="1.5"/>
                    <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.5L21 8H6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <button
                type="button"
                aria-label="Share product"
                class="inline-flex h-14 w-14 items-center justify-center rounded-2xl border border-black/10 bg-white text-[var(--color-charcoal)] transition hover:border-black/30 hover:bg-black/5"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <circle cx="18" cy="5" r="3"/>
                    <circle cx="6" cy="12" r="3"/>
                    <circle cx="18" cy="19" r="3"/>
                    <path d="M8.59 13.51l6.83 3.98M15.41 6.51l-6.82 3.98" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </form>

<ul class="mt-10 space-y-4 border-t border-black/5 pt-8 text-[15px] text-[var(--color-charcoal)]/80">
        <li class="flex items-center gap-3">
            <svg class="h-5 w-5 shrink-0 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <rect x="2" y="7" width="13" height="10" rx="2"/>
                <path d="M15 10h4l3 3v4h-7" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="6" cy="19" r="2"/>
                <circle cx="18" cy="19" r="2"/>
            </svg>
            Free shipping on orders over Rp. 3.000.000
        </li>
        <li class="flex items-center gap-3">
            <svg class="h-5 w-5 shrink-0 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M12 2l8 4v6c0 5-3.5 9-8 10-4.5-1-8-5-8-10V6l8-4z" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            Lifetime warranty on all expedition gear
        </li>
        <li class="flex items-center gap-3">
            <svg class="h-5 w-5 shrink-0 text-[var(--color-forest)]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M3 12a9 9 0 1 0 9-9" stroke-linecap="round"/>
                <path d="M3 4v5h5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            30-day field testing guarantee
        </li>
    </ul>
</div>
