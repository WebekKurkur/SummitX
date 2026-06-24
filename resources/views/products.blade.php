@php
    /**
     * Product catalog dataset.
     * In production this comes from a model. Kept inline for Figma parity.
     * Fields: slug (route key), name, category (key), categoryLabel, price, image
     */
    $products = [
        ['slug' => 'alpine-summit-pack-65l',     'name' => 'Alpine Summit Pack 65L',       'category' => 'backpacks', 'categoryLabel' => 'Backpacks', 'price' => 6200000, 'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'expedition-basecamp-tent',   'name' => 'Expedition Basecamp Tent',     'category' => 'camping',   'categoryLabel' => 'Camping',   'price' => 10400000, 'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'technical-climbing-harness', 'name' => 'Technical Climbing Harness Pro','category' => 'climbing', 'categoryLabel' => 'Climbing',  'price' => 3000000, 'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'mountain-trail-boots-gtx',   'name' => 'Mountain Trail Boots GTX',     'category' => 'footwear',  'categoryLabel' => 'Footwear',  'price' => 4500000, 'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'ultralight-trekking-pack',   'name' => 'Ultralight Trekking Pack 45L', 'category' => 'backpacks', 'categoryLabel' => 'Backpacks', 'price' => 5300000, 'image' => 'https://images.unsplash.com/photo-1622260614153-03223fb72052?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'alpine-shelter-2-person',    'name' => 'Alpine Shelter 2-Person',      'category' => 'camping',   'categoryLabel' => 'Camping',   'price' => 8800000, 'image' => 'https://images.unsplash.com/photo-1455156218388-5e61b526818b?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'dynamic-climbing-rope-70m',  'name' => 'Dynamic Climbing Rope 70m',    'category' => 'climbing',  'categoryLabel' => 'Climbing',  'price' => 4000000, 'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'winter-expedition-boots',    'name' => 'Winter Expedition Boots',      'category' => 'footwear',  'categoryLabel' => 'Footwear',  'price' => 7200000, 'image' => 'https://images.unsplash.com/photo-1514989940723-e8e51635b782?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'day-hiker-pack-28l',         'name' => 'Day Hiker Pack 28L',           'category' => 'backpacks', 'categoryLabel' => 'Backpacks', 'price' => 3000000, 'image' => 'https://images.unsplash.com/photo-1551632811-561732d1e306?auto=format&fit=crop&w=900&q=70'],
        ['slug' => '4-season-expedition-tent',   'name' => '4-Season Expedition Tent',     'category' => 'camping',   'categoryLabel' => 'Camping',   'price' => 14400000, 'image' => 'https://images.unsplash.com/photo-1496080174650-637e3f22fa03?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'belay-device-auto-lock',     'name' => 'Belay Device with Auto-Lock',  'category' => 'climbing',  'categoryLabel' => 'Climbing',  'price' => 2100000, 'image' => 'https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=70'],
        ['slug' => 'approach-shoes-technical',   'name' => 'Approach Shoes Technical',     'category' => 'footwear',  'categoryLabel' => 'Footwear',  'price' => 3200000, 'image' => 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=900&q=70'],
    ];

    $categories = [
        ['key' => 'all',       'label' => 'All Products'],
        ['key' => 'backpacks', 'label' => 'Backpacks'],
        ['key' => 'camping',   'label' => 'Camping'],
        ['key' => 'climbing',  'label' => 'Climbing'],
        ['key' => 'footwear',  'label' => 'Footwear'],
    ];

    $activeCategory = $category ?? 'all';

    $visible = $activeCategory === 'all'
        ? $products
        : array_values(array_filter($products, fn ($p) => $p['category'] === $activeCategory));

    $activeLabel = collect($categories)->firstWhere('key', $activeCategory)['label'];
@endphp

@extends('layouts.landing')

@section('title', $activeCategory === 'all' ? 'Premium Outdoor Gear' : $activeLabel . ' — SummitX')
@section('description', 'Explore expedition-tested equipment designed for climbers, hikers, and outdoor enthusiasts who demand performance without compromise.')

@section('content')
    @include('partials.products.hero')

    <section
        aria-label="Product catalog"
        class="bg-[var(--color-offwhite)] pb-24 lg:pb-32"
    >
        <div class="container-x">
            <div class="grid gap-12 lg:grid-cols-12 lg:gap-12">
                <aside class="lg:col-span-3">
                    @include('partials.products.sidebar', [
                        'categories' => $categories,
                        'activeCategory' => $activeCategory,
                    ])
                </aside>

                <div class="lg:col-span-9">
                    @include('partials.products.toolbar')
                    @include('partials.products.grid', ['visible' => $visible])
                    @include('partials.products.pagination')
                </div>
            </div>
        </div>
    </section>
@endsection
