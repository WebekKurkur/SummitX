
<div data-product-gallery class="flex flex-col gap-4">

<figure class="relative aspect-[808/750] overflow-hidden rounded-3xl border border-black/5 bg-[var(--color-stone)]/30">
        @foreach ($product['gallery'] as $i => $src)
            <img
                src="{{ $src }}"
                alt="{{ $product['name'] }} — view {{ $i + 1 }}"
                loading="{{ $i === 0 ? 'eager' : 'lazy' }}"
                data-gallery-main
                data-index="{{ $i }}"
                @class([
                    'absolute inset-0 h-full w-full object-cover transition-opacity duration-300',
                    'opacity-100' => $i === 0,
                    'opacity-0 pointer-events-none' => $i !== 0,
                ])
            >
        @endforeach

<button
            type="button"
            data-gallery-prev
            aria-label="Previous image"
            class="absolute left-6 top-1/2 -translate-y-1/2 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/85 text-[var(--color-charcoal)] backdrop-blur-md shadow-md transition hover:bg-white"
        >
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button
            type="button"
            data-gallery-next
            aria-label="Next image"
            class="absolute right-6 top-1/2 -translate-y-1/2 inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/85 text-[var(--color-charcoal)] backdrop-blur-md shadow-md transition hover:bg-white"
        >
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

<div
            role="tablist"
            aria-label="Gallery position"
            class="absolute inset-x-0 bottom-6 flex items-center justify-center gap-2"
        >
            @foreach ($product['gallery'] as $i => $src)
                <button
                    type="button"
                    role="tab"
                    aria-label="Go to image {{ $i + 1 }}"
                    aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                    data-gallery-dot
                    data-index="{{ $i }}"
                    @class([
                        'h-2 rounded-full bg-white transition-all duration-300',
                        'w-8' => $i === 0,
                        'w-2 opacity-60' => $i !== 0,
                    ])
                ></button>
            @endforeach
        </div>
    </figure>

<ul class="grid grid-cols-5 gap-3 lg:gap-4">
        @foreach ($product['gallery'] as $i => $src)
            <li>
                <button
                    type="button"
                    aria-label="Show image {{ $i + 1 }}"
                    data-gallery-thumb
                    data-index="{{ $i }}"
                    @class([
                        'relative block aspect-square w-full overflow-hidden rounded-2xl border-2 transition',
                        'border-[var(--color-charcoal)]' => $i === 0,
                        'border-transparent hover:border-black/30' => $i !== 0,
                    ])
                >
                    <img
                        src="{{ $src }}"
                        alt=""
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover"
                    >
                </button>
            </li>
        @endforeach
    </ul>
</div>
