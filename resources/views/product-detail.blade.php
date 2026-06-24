@php
    /**
     * Product detail dataset (in production this comes from a model).
     * Keyed by slug for fast lookup. Fields cover everything the Figma design
     * displays: gallery, specs, related products.
     */
    $catalog = [
        'alpine-summit-pack-65l' => [
            'category' => 'backpacks',
            'categoryLabel' => 'Expedition Collection',
            'name' => 'Alpine Summit Pack 65L',
            'price' => 6200000,
            'rating' => 4.9,
            'reviews' => 127,
            'description' => "Built for multi-day expeditions in the world's most demanding environments, the Alpine Summit Pack 65L is engineered to carry serious loads with technical precision. Field-tested by mountaineers across six continents.",
            'gallery' => [
                'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=1600&q=70',
                'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=900&q=70',
                'https://images.unsplash.com/photo-1622260614153-03223fb72052?auto=format&fit=crop&w=900&q=70',
                'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=900&q=70',
                'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?auto=format&fit=crop&w=900&q=70',
            ],
            'capacities' => ['45L', '65L', '85L'],
            'defaultCapacity' => '65L',
            'colors' => ['Forest Green', 'Mountain Grey', 'Stone Beige'],
            'defaultColor' => 'Forest Green',
            'specs' => [
                'Capacity' => '65 Liters',
                'Weight' => '2.1 kg (4.6 lbs)',
                'Dimensions' => '75 × 35 × 28 cm',
                'Material' => '210D Ripstop Nylon, water-resistant coating',
                'Frame' => 'Adjustable aluminum internal frame',
                'Load Capacity' => 'Up to 30 kg (66 lbs)',
                'Hydration Compatible' => 'Yes, 3L reservoir sleeve',
                'Weather Resistance' => 'Water-resistant, includes rain cover',
            ],
            'related' => [
                ['slug' => 'technical-climbing-harness', 'category' => 'climbing', 'categoryLabel' => 'Climbing', 'name' => 'Technical Climbing Harness Pro', 'price' => 3000000, 'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=900&q=70'],
                ['slug' => 'mountain-trail-boots-gtx', 'category' => 'footwear', 'categoryLabel' => 'Footwear', 'name' => 'Mountain Trail Boots GTX', 'price' => 4500000, 'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=900&q=70'],
                ['slug' => 'expedition-basecamp-tent', 'category' => 'camping', 'categoryLabel' => 'Camping', 'name' => 'Expedition Basecamp Tent', 'price' => 10400000, 'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=900&q=70'],
            ],
        ],
    ];

    // Resolve the requested slug to a product, or fall back to a stub so the
    // route never 404s during development.
    $product = $catalog[$slug] ?? [
        'category' => $category ?? 'backpacks',
        'categoryLabel' => 'SummitX',
        'name' => str(str_replace('-', ' ', $slug ?? 'product'))->title(),
        'price' => 0,
        'rating' => 0,
        'reviews' => 0,
        'description' => 'Product details coming soon.',
        'gallery' => array_fill(0, 5, 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=1600&q=70'),
        'capacities' => [],
        'defaultCapacity' => null,
        'colors' => [],
        'defaultColor' => null,
        'specs' => [],
        'related' => [],
    ];
@endphp

@extends('layouts.landing')

@section('title', $product['name'] . ' — SummitX')
@section('description', $product['description'])

@section('content')
    <section aria-labelledby="product-title" class="bg-[var(--color-offwhite)] pt-32 pb-20 lg:pt-40 lg:pb-24">
        <div class="container-x">

            <a
                href="{{ route('products', ['category' => $product['category']]) }}"
                class="inline-flex items-center gap-2 text-sm font-semibold text-[var(--color-charcoal)]/70 transition hover:text-[var(--color-charcoal)]"
            >
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to Products
            </a>

            <div class="mt-8 grid gap-12 lg:mt-10 lg:grid-cols-12 lg:gap-12">
                <div class="lg:col-span-7">
                    @include('partials.product-detail.gallery', ['product' => $product])
                </div>
                <div class="lg:col-span-5">
                    @include('partials.product-detail.info', ['product' => $product])
                </div>
            </div>
        </div>
    </section>

    @include('partials.product-detail.specifications', ['product' => $product])

    @if (! empty($product['related']))
        @include('partials.product-detail.related', ['related' => $product['related']])
    @endif
@endsection
