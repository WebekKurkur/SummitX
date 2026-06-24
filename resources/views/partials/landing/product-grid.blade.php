
@php
    $products = [
        ['tag' => 'Climbing Gear', 'name' => 'Alpine Climbing Rope', 'price' => 3000000, 'image' => 'https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Cold Weather Gear', 'name' => 'Winter Summit Gloves', 'price' => 2100000, 'image' => 'https://images.unsplash.com/photo-1483721310020-03333e577078?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Climbing Gear', 'name' => 'Dynamic Climbing Rope', 'price' => 3500000, 'image' => 'https://images.unsplash.com/photo-1551698618-1dfe5d97d256?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Camping Gear', 'name' => 'Expedition Sleeping Bag', 'price' => 5600000, 'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Safety Equipment', 'name' => 'Technical Climbing Harness', 'price' => 2700000, 'image' => 'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Technical Apparel', 'name' => 'Mountain Base Layers', 'price' => 1900000, 'image' => 'https://images.unsplash.com/photo-1556906781-9a412961c28c?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Camping Comfort', 'name' => 'Insulated Camp Mat', 'price' => 2400000, 'image' => 'https://images.unsplash.com/photo-1455156218388-5e61b526818b?auto=format&fit=crop&w=900&q=70'],
        ['tag' => 'Outerwear', 'name' => 'Summit Shell Jacket', 'price' => 11000000, 'image' => 'https://images.unsplash.com/photo-1548883354-94bcfe321cbb?auto=format&fit=crop&w=900&q=70'],
    ];
@endphp

<section id="catalog" aria-labelledby="more-products-title" class="bg-[var(--color-offwhite)] py-24 lg:py-32">
    <div class="container-x">
        <header class="text-center reveal">
            <span class="eyebrow">Complete Your Kit</span>
            <h2 id="more-products-title" class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-5xl lg:text-6xl">
                More to Explore
            </h2>
        </header>

        <ul class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
            @foreach ($products as $product)
                <li class="reveal">
                    <a href="#" class="card-image group flex h-full flex-col overflow-hidden rounded-2xl bg-white shadow-soft transition hover:shadow-card">
                        <div class="relative aspect-square overflow-hidden bg-[var(--color-stone)]/30">
                            <img
                                src="{{ $product['image'] }}"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover"
                            >
                        </div>
                        <div class="flex flex-1 flex-col gap-2 p-6">
                            <p class="text-xs font-medium tracking-[0.18em] uppercase text-[var(--color-mist)]">{{ $product['tag'] }}</p>
                            <h3 class="font-display text-xl font-semibold text-[var(--color-charcoal)]">{{ $product['name'] }}</h3>
                            <p class="mt-auto pt-2 font-display text-xl font-bold text-[var(--color-charcoal)]">{{ $product['price'] }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="mt-16 flex justify-center reveal">
            <a href="#" class="inline-flex items-center gap-3 rounded-full border border-[var(--color-charcoal)]/20 px-8 py-4 text-sm font-medium transition hover:border-[var(--color-charcoal)] hover:bg-[var(--color-charcoal)] hover:text-[var(--color-offwhite)]">
                View Full Catalog
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>
