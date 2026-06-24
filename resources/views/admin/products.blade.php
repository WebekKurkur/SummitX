@php
    $products = [
        [
            'name' => 'Alpine Summit Pack 65L',
            'category' => 'Backpacks',
            'price' => 6200000,
            'stock' => 24,
            'status' => 'in-stock',
            'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=200&q=70',
        ],
        [
            'name' => 'Technical Climbing Harness Pro',
            'category' => 'Climbing',
            'price' => 3000000,
            'stock' => 8,
            'status' => 'low-stock',
            'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=200&q=70',
        ],
        [
            'name' => 'Mountain Trail Boots GTX',
            'category' => 'Footwear',
            'price' => 4500000,
            'stock' => 0,
            'status' => 'out-of-stock',
            'image' => 'https://images.unsplash.com/photo-1542293787938-c9e299b88061?auto=format&fit=crop&w=200&q=70',
        ],
        [
            'name' => 'Expedition Basecamp Tent',
            'category' => 'Camping',
            'price' => 10400000,
            'stock' => 15,
            'status' => 'in-stock',
            'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=200&q=70',
        ],
        [
            'name' => 'Ultralight Trekking Pack 45L',
            'category' => 'Backpacks',
            'price' => 5300000,
            'stock' => 32,
            'status' => 'in-stock',
            'image' => 'https://images.unsplash.com/photo-1622260614153-03223fb72052?auto=format&fit=crop&w=200&q=70',
        ],
    ];

    $totalProducts = 127;
    $lowStockCount = collect($products)->where('status', 'low-stock')->count();
    $outOfStockCount = collect($products)->where('status', 'out-of-stock')->count();

    $stats = [
        ['label' => 'Total Products', 'value' => $totalProducts],
        ['label' => 'Low Stock Items', 'value' => 8],
        ['label' => 'Out of Stock', 'value' => 3],
    ];
@endphp

@extends('admin.layouts.admin')

@section('title', 'Products')
@section('description', 'Manage expedition gear inventory.')

@section('content')
    <header class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px]">
                Products
            </h1>
            <p class="mt-3 text-base text-[var(--color-charcoal)]/60">
                Manage expedition gear inventory
            </p>
        </div>

        <button
            type="button"
            data-product-modal-open
            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-sm font-semibold text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
            </svg>
            Add Product
        </button>
    </header>

    <section aria-label="Inventory stats" class="mt-10">
        <div class="grid gap-6 sm:grid-cols-3">
            @foreach ($stats as $stat)
                <article class="rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]">
                    <p class="text-sm font-medium text-[var(--color-charcoal)]/60">{{ $stat['label'] }}</p>
                    <p class="mt-2 font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] sm:text-[32px]">
                        {{ $stat['value'] }}
                    </p>
                </article>
            @endforeach
        </div>
    </section>

    <section
        aria-label="Search products"
        class="mt-6 rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)]"
    >
        <form role="search" aria-label="Search products" class="relative" onsubmit="event.preventDefault();">
            <label for="product-admin-search" class="sr-only">Search products</label>
            <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-5 flex items-center text-[var(--color-charcoal)]/50">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m20 20-3.5-3.5" stroke-linecap="round"/>
                </svg>
            </span>
            <input
                id="product-admin-search"
                type="search"
                name="q"
                placeholder="Search products..."
                class="w-full rounded-2xl border border-black/10 bg-[var(--color-offwhite)] py-3.5 pl-14 pr-5 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </form>
    </section>

    <aside
        role="alert"
        class="mt-6 flex items-start gap-4 rounded-2xl border border-[var(--color-orange)]/20 bg-[var(--color-orange)]/10 p-6"
    >
        <span aria-hidden="true" class="mt-0.5 inline-flex h-6 w-6 shrink-0 items-center justify-center text-[var(--color-orange)]">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M12 9v4M12 17h.01" stroke-linecap="round"/>
            </svg>
        </span>
        <div>
            <p class="font-semibold text-[var(--color-charcoal)]">Inventory Alert</p>
            <p class="mt-1 text-sm text-[var(--color-charcoal)]/70">
                You have {{ $lowStockCount }} low-stock {{ $lowStockCount === 1 ? 'item' : 'items' }} and
                {{ $outOfStockCount }} out-of-stock {{ $outOfStockCount === 1 ? 'item' : 'items' }} that need attention.
            </p>
        </div>
    </aside>

    <section
        aria-labelledby="products-table-title"
        class="mt-6 overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_12px_0_rgba(0,0,0,0.04)]"
    >
        <h2 id="products-table-title" class="sr-only">Products inventory</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-[var(--color-offwhite)] text-xs font-semibold uppercase tracking-[0.08em] text-[var(--color-charcoal)]/60">
                    <tr>
                        <th scope="col" class="px-6 py-4">Product</th>
                        <th scope="col" class="px-6 py-4">Price</th>
                        <th scope="col" class="px-6 py-4">Stock</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5">
                    @foreach ($products as $p)
                        @php
                            $stockBadge = match ($p['status']) {
                                'in-stock'     => ['label' => 'In Stock', 'classes' => 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]'],
                                'low-stock'    => ['label' => 'Low Stock', 'classes' => 'bg-[var(--color-orange)]/10 text-[var(--color-orange)]'],
                                'out-of-stock' => ['label' => 'Out of Stock', 'classes' => 'bg-black/10 text-[var(--color-charcoal)]/70'],
                                default        => ['label' => 'Unknown', 'classes' => 'bg-black/5 text-[var(--color-charcoal)]/70'],
                            };
                        @endphp
                        <tr data-confirm-remove class="bg-white transition hover:bg-[var(--color-offwhite)]/60">
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="relative h-16 w-16 shrink-0 overflow-hidden rounded-2xl bg-[var(--color-offwhite)]">
                                        <img
                                            src="{{ $p['image'] }}"
                                            alt="{{ $p['name'] }}"
                                            loading="lazy"
                                            class="absolute inset-0 h-full w-full object-cover"
                                        >
                                    </div>
                                    <div>
                                        <p class="font-display text-base font-semibold tracking-[-0.025em] text-[var(--color-charcoal)]">
                                            {{ $p['name'] }}
                                        </p>
                                        <p class="mt-1 text-sm text-[var(--color-charcoal)]/60">{{ $p['category'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <p class="font-display text-base font-semibold text-[var(--color-charcoal)]">Rp. {{ number_format($p['price'], 0, ',', '.') }}</p>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex items-center gap-3">
                                    <span class="inline-flex items-center rounded-[10px] px-3 py-1 text-xs font-semibold {{ $stockBadge['classes'] }}">
                                        {{ $stockBadge['label'] }}
                                    </span>
                                    <span class="font-semibold text-[var(--color-charcoal)]">{{ $p['stock'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex items-center justify-end gap-2">
                                    <button
                                        type="button"
                                        data-product-modal-open
                                        data-product-payload="{{ json_encode([
                                            'mode' => 'edit',
                                            'name' => $p['name'],
                                            'preview' => $p['image'] ?? null,
                                            'fields' => [
                                                'name' => $p['name'],
                                                'category' => $p['category'],
                                                'price' => $p['price'],
                                                'stock' => $p['stock'],
                                            ],
                                        ], JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_AMP|JSON_HEX_QUOT) }}"
                                        aria-label="Edit {{ $p['name'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        aria-label="Delete {{ $p['name'] }}"
                                        data-confirm-delete
                                        data-confirm-type="product"
                                        data-confirm-name="{{ $p['name'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-rose-50 hover:text-rose-600"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('modals')
    @include('admin.partials.product-modal')
    @include('admin.partials.product-specs-modal')
@endpush
