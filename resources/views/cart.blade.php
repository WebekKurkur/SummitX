@php
    /**
     * Cart contents (would come from session/db in production).
     * Each item: slug, category, categoryLabel, name, variant info, qty, price, image
     */
    $items = [
        [
            'slug' => 'alpine-summit-pack-65l',
            'category' => 'backpacks',
            'categoryLabel' => 'Backpacks',
            'name' => 'Alpine Summit Pack 65L',
            'variants' => ['65L', 'Forest Green'],
            'quantity' => 1,
            'price' => 6200000,
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=600&q=70',
        ],
        [
            'slug' => 'technical-climbing-harness',
            'category' => 'climbing',
            'categoryLabel' => 'Climbing',
            'name' => 'Technical Climbing Harness Pro',
            'variants' => ['Size M', 'Mountain Grey'],
            'quantity' => 2,
            'price' => 3000000,
            'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=600&q=70',
        ],
        [
            'slug' => 'mountain-trail-boots-gtx',
            'category' => 'footwear',
            'categoryLabel' => 'Footwear',
            'name' => 'Mountain Trail Boots GTX',
            'variants' => ['US 10', 'Stone Beige'],
            'quantity' => 1,
            'price' => 4500000,
            'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=600&q=70',
        ],
    ];

    $itemCount = collect($items)->sum('quantity');
    $subtotal = collect($items)->sum(fn ($i) => $i['price'] * $i['quantity']);
    $shipping = 0; // free shipping per Figma
    $taxRate = 0.08;
    $tax = round($subtotal * $taxRate, 2);
    $total = $subtotal + $shipping + $tax;
@endphp

@extends('layouts.landing')

@section('title', 'Shopping Cart — SummitX')
@section('description', 'Review your gear before checkout. Free shipping on orders over Rp. 3.000.000, secure SSL checkout.')

@section('content')
    <section aria-labelledby="cart-title" class="bg-[var(--color-offwhite)] pt-32 pb-24 lg:pt-40 lg:pb-32">
        <div class="container-x">

<header class="reveal max-w-4xl">
                <h1
                    id="cart-title"
                    class="font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-6xl lg:text-[72px] lg:leading-[1.1]"
                >
                    Shopping Cart
                </h1>
                <p class="mt-4 text-base text-[var(--color-charcoal)]/60 lg:text-lg">
                    {{ $itemCount }} {{ $itemCount === 1 ? 'item' : 'items' }} in your cart
                </p>
            </header>

            @if (count($items) === 0)
                <div class="mt-12 rounded-3xl border border-dashed border-black/10 bg-white p-14 text-center">
                    <p class="font-display text-2xl font-bold text-[var(--color-charcoal)]">Your cart is empty</p>
                    <p class="mt-3 text-[var(--color-charcoal)]/60">
                        Browse the
                        <a href="{{ route('products') }}" class="font-semibold text-[var(--color-forest)] underline underline-offset-4 hover:text-[var(--color-charcoal)]">catalog</a>
                        to start a kit.
                    </p>
                </div>
            @else
                <div class="mt-10 grid gap-8 lg:grid-cols-12 lg:gap-8">

<div class="lg:col-span-7 flex flex-col gap-8">
                        @include('partials.cart.items', ['items' => $items])
                        @include('partials.cart.promo')
                    </div>

<aside class="lg:col-span-5">
                        @include('partials.cart.summary', [
                            'subtotal' => $subtotal,
                            'shipping' => $shipping,
                            'tax' => $tax,
                            'total' => $total,
                        ])
                    </aside>
                </div>
            @endif
        </div>
    </section>
@endsection
