
@php
    $related = [
        [
            'slug' => 'solo-through-patagonias-wild-heart',
            'title' => "Solo Through Patagonia's Wild Heart",
            'date' => 'Apr 25, 2026',
            'time' => '14 min',
            'image' => 'https://images.unsplash.com/photo-1506260408121-e353d10b87c7?auto=format&fit=crop&w=1100&q=70',
        ],
        [
            'slug' => 'mastering-high-altitude-navigation',
            'title' => 'Mastering High-Altitude Navigation',
            'date' => 'Apr 22, 2026',
            'time' => '10 min',
            'image' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1100&q=70',
        ],
        [
            'slug' => 'protecting-the-peaks-we-climb',
            'title' => 'Protecting the Peaks We Climb',
            'date' => 'Apr 18, 2026',
            'time' => '13 min',
            'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1100&q=70',
        ],
    ];
@endphp

<section
    aria-labelledby="related-title"
    class="bg-[var(--color-offwhite)] pt-24 pb-24 lg:pt-32 lg:pb-32"
>
    <div class="container-x">
        <header class="reveal max-w-3xl">
            <h2
                id="related-title"
                class="font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-5xl lg:text-[56px]"
            >
                Continue Reading
            </h2>
            <p class="mt-4 text-base text-[var(--color-charcoal)]/65 lg:text-lg">
                More stories from the Summit Journal
            </p>
        </header>

        <div class="mt-12 grid items-stretch gap-8 sm:grid-cols-2 lg:grid-cols-3 lg:gap-10">
            @foreach ($related as $story)
                <article class="reveal flex">
                    <a
                        href="{{ route('article.show', ['slug' => $story['slug']]) }}"
                        class="card-image group flex h-full flex-col overflow-hidden rounded-3xl border border-black/5 bg-white shadow-[0_2px_20px_0_rgba(0,0,0,0.06)] transition hover:-translate-y-0.5 hover:shadow-[0_18px_40px_-20px_rgba(28,28,28,0.18)]"
                    >
                        <div class="relative h-[200px] shrink-0 overflow-hidden bg-[var(--color-stone)]/30 sm:h-[240px] lg:h-[280px]">
                            <img
                                src="{{ $story['image'] }}"
                                alt="{{ $story['title'] }}"
                                loading="lazy"
                                class="absolute inset-0 h-full w-full object-cover"
                            >
                        </div>

                        <div class="flex flex-1 flex-col p-7">
                            <h3 class="font-display text-xl font-bold leading-[1.25] tracking-[-0.025em] text-[var(--color-charcoal)]">
                                {{ $story['title'] }}
                            </h3>

                            <footer class="mt-auto flex items-center gap-3 border-t border-black/5 pt-5 text-[13px] text-[var(--color-charcoal)]/60">
                                <span>{{ $story['date'] }}</span>
                                <span aria-hidden="true">·</span>
                                <span>{{ $story['time'] }}</span>
                            </footer>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>
