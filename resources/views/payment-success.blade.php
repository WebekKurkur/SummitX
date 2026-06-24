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

    $orderNumber = 'SX-2026-3384';
@endphp

@extends('layouts.landing')

@section('title', 'Order Confirmed — SummitX')
@section('description', 'Your adventure awaits. Your SummitX order has been confirmed.')

@section('content')
    <section aria-labelledby="success-title" class="bg-[var(--color-offwhite)] pt-32 pb-24 lg:pt-40 lg:pb-32">
        <div class="container-x">

<header class="reveal flex flex-col items-center text-center">
                <span aria-hidden="true" class="flex h-20 w-20 items-center justify-center rounded-full bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                    <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"/>
                        <path d="M8 12l3 3 5-6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>

                <h1
                    id="success-title"
                    class="mt-8 font-display text-4xl font-bold leading-[1.1] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-5xl lg:text-[64px]"
                >
                    Your Adventure Awaits
                </h1>
                <p class="mt-6 max-w-xl text-base text-[var(--color-charcoal)]/70 lg:text-xl lg:leading-[1.625]">
                    Your order has been confirmed and your expedition gear is being prepared for the
                    journey ahead.
                </p>
            </header>

<div class="mt-16 grid gap-8 lg:grid-cols-2 lg:gap-8">
                @include('partials.payment-success.order-details', [
                    'items' => $items,
                    'subtotal' => $subtotal,
                    'shipping' => $shipping,
                    'tax' => $tax,
                    'total' => $total,
                ])
                @include('partials.payment-success.meta', ['orderNumber' => $orderNumber])
            </div>

@include('partials.payment-success.expedition-banner')

<div class="mt-12 grid gap-4 sm:grid-cols-2">
                <a
                    href="{{ route('products') }}"
                    class="inline-flex items-center justify-center gap-3 rounded-2xl border border-black/5 bg-white px-6 py-5 text-base font-semibold text-[var(--color-charcoal)] shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_-20px_rgba(28,28,28,0.18)]"
                >
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Continue Shopping
                </a>

                <a
                    href="{{ route('payment.history') }}"
                    class="inline-flex items-center justify-center gap-3 rounded-2xl bg-[var(--color-forest)] px-6 py-5 text-base font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
                >
                    Payment History
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
