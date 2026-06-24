@php
    $items = [
        [
            'name' => 'Alpine Summit Pack 65L',
            'variants' => '65L · Forest Green',
            'quantity' => 1,
            'price' => 6200000,
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=400&q=70',
        ],
        [
            'name' => 'Technical Climbing Harness Pro',
            'variants' => 'Size M · Mountain Grey',
            'quantity' => 2,
            'price' => 3000000,
            'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=400&q=70',
        ],
    ];

    $subtotal = collect($items)->sum(fn ($i) => $i['price'] * $i['quantity']);
    $shipping = 0;
    $tax = round($subtotal * 0.08, 2);
    $total = $subtotal + $shipping + $tax;
@endphp

@extends('layouts.landing')

@section('title', 'Checkout — SummitX')
@section('description', 'Complete your order securely. Free shipping on orders over Rp. 3.000.000, SSL encrypted checkout.')

@section('content')
    <section aria-labelledby="checkout-title" class="bg-[var(--color-offwhite)] pt-32 pb-24 lg:pt-40 lg:pb-32">
        <div class="container-x">

<h1
                id="checkout-title"
                class="text-center font-display text-4xl font-bold leading-[1.1] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-5xl lg:text-[64px]"
            >
                Checkout
            </h1>

<form
                action="{{ route('payment.success') }}"
                method="get"
                class="mt-12 grid gap-8 lg:mt-16 lg:grid-cols-12 lg:gap-8"
            >
                <div class="lg:col-span-7 flex flex-col gap-8">
                    @include('partials.checkout.shipping-form')
                    @include('partials.checkout.payment-form')
                </div>

                <aside class="lg:col-span-5">
                    @include('partials.checkout.summary', [
                        'items' => $items,
                        'subtotal' => $subtotal,
                        'shipping' => $shipping,
                        'tax' => $tax,
                        'total' => $total,
                    ])
                </aside>
            </form>
        </div>
    </section>
@endsection
