
@php
    $hero = [
        [
            'tag' => 'Technical Outerwear',
            'name' => 'Alpine Summit Shell',
            'price' => 12000000,
            'rating' => '4.9',
            'image' => 'https://images.unsplash.com/photo-1516763296043-f676c1105999?auto=format&fit=crop&w=1400&q=70',
            'wide' => true,
        ],
        [
            'tag' => 'Backpacks',
            'name' => 'Expedition Pack 65L',
            'price' => 6900000,
            'rating' => '5.0',
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=1000&q=70',
            'wide' => false,
        ],
    ];

    $supporting = [
        [
            'tag' => 'Insulated Outerwear',
            'name' => 'Winter Ascent Jacket',
            'price' => 9500000,
            'rating' => '4.9',
            'image' => 'https://images.unsplash.com/photo-1483721310020-03333e577078?auto=format&fit=crop&w=900&q=70',
        ],
        [
            'tag' => 'Shell Outerwear',
            'name' => 'Summit Pro Jacket',
            'price' => 11000000,
            'rating' => '4.7',
            'image' => 'https://images.unsplash.com/photo-1548883354-94bcfe321cbb?auto=format&fit=crop&w=900&q=70',
        ],
        [
            'tag' => 'Day Packs',
            'name' => 'Trail Navigator Pack',
            'price' => 3700000,
            'rating' => '4.8',
            'image' => 'https://images.unsplash.com/photo-1622260614153-03223fb72052?auto=format&fit=crop&w=900&q=70',
        ],
    ];
@endphp

<section id="products" aria-labelledby="featured-products-title" class="bg-[var(--color-offwhite)] py-24 lg:py-32">
    <div class="container-x">

        <header class="flex flex-wrap items-end justify-between gap-6 reveal">
            <div class="max-w-xl">
                <span class="eyebrow">Featured Gear</span>
                <h2 id="featured-products-title" class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-5xl lg:text-6xl">
                    Expedition Essentials
                </h2>
            </div>
            <a href="#" class="link-arrow text-sm">
                View All Products
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </header>

<div class="mt-16 grid gap-6 lg:grid-cols-12 lg:gap-8">
            @foreach ($hero as $product)
                <article class="reveal {{ $product['wide'] ? 'lg:col-span-7' : 'lg:col-span-5' }}">
                    @include('partials.landing.product-card', ['product' => $product, 'aspect' => 'h-[260px] sm:h-[360px] lg:h-[460px]'])
                </article>
            @endforeach
        </div>

<div class="mt-6 grid gap-6 sm:grid-cols-2 lg:mt-8 lg:grid-cols-3 lg:gap-8">
            @foreach ($supporting as $product)
                <article class="reveal">
                    @include('partials.landing.product-card', ['product' => $product, 'aspect' => 'aspect-[4/3]'])
                </article>
            @endforeach
        </div>
    </div>
</section>
