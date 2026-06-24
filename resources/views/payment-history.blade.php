@php
    /**
     * Payment history dataset.
     * In production this comes from a database. Each transaction includes:
     * date, order number, total, status, items[], optional buy-again flag.
     */
    $transactions = [
        [
            'date' => 'May 13, 2026',
            'order' => 'SX-2026-4521',
            'total' => 12300000,
            'status' => 'in-transit',
            'statusLabel' => 'In Transit',
            'items' => [
                [
                    'name' => 'Alpine Summit Pack 65L',
                    'meta' => '65L · Forest Green · Qty: 1',
                    'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=300&q=70',
                ],
                [
                    'name' => 'Technical Climbing Harness Pro',
                    'meta' => 'Size M · Mountain Grey · Qty: 2',
                    'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=300&q=70',
                ],
            ],
            'buyAgain' => false,
        ],
        [
            'date' => 'April 28, 2026',
            'order' => 'SX-2026-3892',
            'total' => 10400000,
            'status' => 'delivered',
            'statusLabel' => 'Delivered',
            'items' => [
                [
                    'name' => 'Expedition Basecamp Tent',
                    'meta' => '4-Person · Stone Beige · Qty: 1',
                    'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=300&q=70',
                ],
            ],
            'buyAgain' => true,
        ],
        [
            'date' => 'April 12, 2026',
            'order' => 'SX-2026-2754',
            'total' => 20000000,
            'status' => 'delivered',
            'statusLabel' => 'Delivered',
            'items' => [
                [
                    'name' => 'Mountain Trail Boots GTX',
                    'meta' => 'US 10 · Stone Beige · Qty: 1',
                    'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=300&q=70',
                ],
                [
                    'name' => '4-Season Expedition Tent',
                    'meta' => '2-Person · Forest Green · Qty: 1',
                    'image' => 'https://images.unsplash.com/photo-1496080174650-637e3f22fa03?auto=format&fit=crop&w=300&q=70',
                ],
            ],
            'collapsed' => 1,
            'buyAgain' => true,
        ],
        [
            'date' => 'March 25, 2026',
            'order' => 'SX-2026-1983',
            'total' => 5300000,
            'status' => 'delivered',
            'statusLabel' => 'Delivered',
            'items' => [
                [
                    'name' => 'Ultralight Trekking Pack 45L',
                    'meta' => '45L · Mountain Grey · Qty: 1',
                    'image' => 'https://images.unsplash.com/photo-1622260614153-03223fb72052?auto=format&fit=crop&w=300&q=70',
                ],
            ],
            'buyAgain' => true,
        ],
    ];
@endphp

@extends('layouts.landing')

@section('title', 'Payment History — SummitX')
@section('description', 'Track your expedition gear orders and delivery status.')

@section('content')
    <section
        id="payment-history"
        aria-labelledby="payment-history-title"
        class="bg-[var(--color-offwhite)] pt-32 pb-24 lg:pt-40 lg:pb-32"
    >
        <div class="container-x">

<header class="reveal max-w-4xl">
                <h1
                    id="payment-history-title"
                    class="font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-6xl lg:text-[72px] lg:leading-[1.1]"
                >
                    Payment History
                </h1>
                <p class="mt-5 text-base text-[var(--color-charcoal)]/60 lg:text-lg">
                    Track your expedition gear orders and delivery status.
                </p>
            </header>

@if (count($transactions) === 0)
                <div class="mt-12 rounded-3xl border border-dashed border-black/10 bg-white p-14 text-center">
                    <p class="font-display text-2xl font-bold text-[var(--color-charcoal)]">No orders yet</p>
                    <p class="mt-3 text-[var(--color-charcoal)]/60">
                        Browse the
                        <a href="{{ route('products') }}" class="font-semibold text-[var(--color-forest)] underline underline-offset-4 hover:text-[var(--color-charcoal)]">catalog</a>
                        to start an expedition.
                    </p>
                </div>
            @else
                <ul class="mt-10 flex flex-col gap-6 lg:mt-12 lg:gap-8">
                    @foreach ($transactions as $tx)
                        <li class="reveal">
                            @include('partials.payment-history.transaction-card', ['tx' => $tx])
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>
@endsection
