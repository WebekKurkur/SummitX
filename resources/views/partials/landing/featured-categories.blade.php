
@php
    $featured = [
        'name' => 'Apparel',
        'count' => '180+ Products',
        'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=1400&q=70',
        'href' => '#products',
    ];

    $categories = [
        ['name' => 'Camping', 'count' => '95+ Products', 'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=900&q=70'],
        ['name' => 'Climbing', 'count' => '120+ Products', 'image' => 'https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=70'],
        ['name' => 'Footwear', 'count' => '85+ Products', 'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=900&q=70'],
        ['name' => 'Backpacks', 'count' => '110+ Products', 'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=900&q=70'],
    ];
@endphp

<section
    id="categories"
    aria-labelledby="categories-title"
    class="bg-[var(--color-offwhite)] py-24 lg:py-32"
>
    <div class="container-x">
        <header class="max-w-3xl reveal">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-[var(--color-forest)]/60">
                Shop by Category
            </span>
            <h2
                id="categories-title"
                class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-5xl lg:text-[56px]"
            >
                Gear for Every Adventure
            </h2>
        </header>

<div class="mt-16 grid gap-6 lg:grid-cols-12 lg:gap-6">

<a
                href="{{ $featured['href'] }}"
                class="card-image group relative block aspect-[546/604] overflow-hidden rounded-3xl bg-[var(--color-charcoal)] reveal lg:col-span-5"
            >
                <img
                    src="{{ $featured['image'] }}"
                    alt="{{ $featured['name'] }} category"
                    loading="lazy"
                    class="absolute inset-0 h-full w-full object-cover"
                >
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                <div class="absolute inset-x-0 bottom-0 p-8 text-[var(--color-offwhite)] lg:p-10">
                    <div class="flex items-end justify-between gap-4">
                        <div>
                            <p class="text-sm text-white/70">{{ $featured['count'] }}</p>
                            <h3 class="mt-2 font-display text-3xl font-bold leading-[1.05] tracking-[-0.025em] lg:text-[40px] lg:leading-[1.1]">
                                {{ $featured['name'] }}
                            </h3>
                        </div>
                        <span
                            aria-hidden="true"
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/10 text-white backdrop-blur-sm transition group-hover:bg-white group-hover:text-[var(--color-charcoal)]"
                        >
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                <path d="M7 17L17 7M9 7h8v8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>

<div class="grid gap-6 sm:grid-cols-2 lg:col-span-7">
                @foreach ($categories as $cat)
                    <a
                        href="#products"
                        class="card-image group relative block aspect-[375/290] overflow-hidden rounded-3xl bg-[var(--color-charcoal)] reveal"
                    >
                        <img
                            src="{{ $cat['image'] }}"
                            alt="{{ $cat['name'] }} category"
                            loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>

                        <div class="absolute inset-x-0 bottom-0 p-7 text-[var(--color-offwhite)] lg:p-8">
                            <div class="flex items-end justify-between gap-3">
                                <div>
                                    <p class="text-sm text-white/70">{{ $cat['count'] }}</p>
                                    <h3 class="mt-2 font-display text-2xl font-bold leading-[1.1] tracking-[-0.025em] lg:text-[28px]">
                                        {{ $cat['name'] }}
                                    </h3>
                                </div>
                                <span
                                    aria-hidden="true"
                                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white/10 text-white backdrop-blur-sm transition group-hover:bg-white group-hover:text-[var(--color-charcoal)]"
                                >
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                                        <path d="M7 17L17 7M9 7h8v8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="mt-16 flex justify-center reveal">
            <a href="#products" class="link-arrow text-sm font-semibold text-[var(--color-forest)]">
                View All Categories
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>
