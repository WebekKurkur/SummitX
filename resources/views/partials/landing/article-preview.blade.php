
@php
    $feature = [
        'category' => 'Expedition',
        'title' => 'Beyond the Summit: A Winter Expedition to K2',
        'excerpt' => 'Follow our journey through the harshest winter conditions on the second highest peak — what it really takes to climb above 8,000 meters in February.',
        'author' => 'Marcus Chen',
        'time' => '12 min read',
        'image' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1600&q=70',
    ];

    $stories = [
        [
            'category' => 'Technical Guide',
            'title' => 'The Science of Layering: Cold Weather Essentials',
            'excerpt' => 'Understanding the principles behind effective layering systems in extreme environments.',
            'author' => 'Dr. Sarah Lin',
            'time' => '8 min read',
            'image' => 'https://images.unsplash.com/photo-1502786129293-79981df4e689?auto=format&fit=crop&w=1100&q=70',
        ],
        [
            'category' => 'Lifestyle',
            'title' => 'Campfire Chronicles: Wilderness Cooking',
            'excerpt' => 'Master the art of backcountry cuisine with tested recipes and tools from our field team.',
            'author' => 'Jamie Rivers',
            'time' => '6 min read',
            'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=1100&q=70',
        ],
    ];
@endphp

<section id="articles" aria-labelledby="journal-title" class="bg-[var(--color-offwhite)] py-24 lg:py-32">
    <div class="container-x">

        <header class="flex flex-wrap items-end justify-between gap-6 reveal">
            <div class="max-w-xl">
                <span class="eyebrow">The Summit Journal</span>
                <h2 id="journal-title" class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-5xl lg:text-6xl">
                    Stories from the Wild
                </h2>
            </div>
            <a href="#" class="link-arrow text-sm">
                View All Stories
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </header>

        <div class="mt-16 grid gap-6 lg:grid-cols-12 lg:gap-8">

            <article class="lg:col-span-7 reveal flex">
                <a href="#" class="card-image group flex h-full w-full flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition hover:shadow-card">
                    <div class="relative aspect-[16/10] overflow-hidden bg-[var(--color-stone)]/30 lg:aspect-[770/807]">
                        <img
                            src="{{ $feature['image'] }}"
                            alt="{{ $feature['title'] }}"
                            loading="lazy"
                            class="absolute inset-0 h-full w-full object-cover"
                        >
                        <span class="absolute left-6 top-6 inline-flex items-center rounded-full bg-white/90 px-4 py-1.5 text-xs font-medium tracking-wide text-[var(--color-charcoal)] backdrop-blur">
                            {{ $feature['category'] }}
                        </span>
                    </div>
                    <div class="flex flex-1 flex-col p-8 lg:p-10">
                        <h3 class="font-display text-2xl font-bold leading-tight text-[var(--color-charcoal)] md:text-3xl lg:text-4xl">
                            {{ $feature['title'] }}
                        </h3>
                        <p class="mt-5 max-w-2xl text-base text-[var(--color-charcoal)]/70">
                            {{ $feature['excerpt'] }}
                        </p>
                        <footer class="mt-auto flex items-center justify-between border-t border-black/10 pt-6 text-sm text-[var(--color-charcoal)]/65">
                            <div class="flex items-center gap-3">
                                <span>By {{ $feature['author'] }}</span>
                                <span aria-hidden="true">·</span>
                                <span class="inline-flex items-center gap-1.5">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path d="M12 7v5l3 2" stroke-linecap="round"/>
                                    </svg>
                                    {{ $feature['time'] }}
                                </span>
                            </div>
                            <span class="link-arrow font-medium text-[var(--color-charcoal)]">
                                Read
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </footer>
                    </div>
                </a>
            </article>

<div class="lg:col-span-5 grid gap-6 lg:gap-8">
                @foreach ($stories as $story)
                    <article class="reveal">
                        <a href="#" class="card-image group flex h-full flex-col overflow-hidden rounded-3xl bg-white shadow-soft transition hover:shadow-card">
                            <div class="relative aspect-[16/9] overflow-hidden bg-[var(--color-stone)]/30">
                                <img
                                    src="{{ $story['image'] }}"
                                    alt="{{ $story['title'] }}"
                                    loading="lazy"
                                    class="absolute inset-0 h-full w-full object-cover"
                                >
                                <span class="absolute left-5 top-5 inline-flex items-center rounded-full bg-white/90 px-3.5 py-1.5 text-xs font-medium tracking-wide text-[var(--color-charcoal)] backdrop-blur">
                                    {{ $story['category'] }}
                                </span>
                            </div>
                            <div class="flex flex-1 flex-col p-7">
                                <h3 class="font-display text-xl font-bold leading-tight text-[var(--color-charcoal)] md:text-2xl">
                                    {{ $story['title'] }}
                                </h3>
                                <p class="mt-3 text-sm text-[var(--color-charcoal)]/70">
                                    {{ $story['excerpt'] }}
                                </p>
                                <footer class="mt-auto flex items-center justify-between pt-6 text-xs text-[var(--color-charcoal)]/65">
                                    <div class="flex items-center gap-2">
                                        <span>By {{ $story['author'] }}</span>
                                        <span aria-hidden="true">·</span>
                                        <span>{{ $story['time'] }}</span>
                                    </div>
                                    <span class="link-arrow font-medium text-[var(--color-charcoal)]">
                                        Read
                                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </footer>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
