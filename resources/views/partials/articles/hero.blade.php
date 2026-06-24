
@php
    $featured = [
        'slug' => 'vertical-dreams-ascending-el-capitans-dawn-wall',
        'badge' => 'Featured Expedition',
        'title' => "Vertical Dreams: Ascending El Capitan's Dawn Wall",
        'excerpt' => "A 19-day journey on one of climbing's most demanding routes, where every move is calculated, every pitch tests the limits of human endurance, and the granite wall becomes both obstacle and teacher.",
        'author' => 'Tommy Caldwell',
        'date' => 'May 8, 2026',
        'time' => '18 min read',
        'image' => 'https://images.unsplash.com/photo-1516737490857-847e4dc7da42?auto=format&fit=crop&w=1800&q=70',
    ];

    $recent = [
        [
            'category' => 'Adventure',
            'title' => "Solo Through Patagonia's Wild Heart",
            'excerpt' => 'Three weeks alone in the Torres del Paine, where weather, terrain, and solitude converge.',
            'date' => 'May 5, 2026',
            'time' => '12 min',
        ],
        [
            'category' => 'Technical',
            'title' => 'Mastering High-Altitude Navigation',
            'excerpt' => 'Essential techniques for route-finding above 7,000 meters when visibility drops to zero.',
            'date' => 'May 3, 2026',
            'time' => '10 min',
        ],
        [
            'category' => 'Conservation',
            'title' => 'Protecting the Peaks We Climb',
            'excerpt' => 'How the climbing community is taking responsibility for the mountains we love.',
            'date' => 'May 1, 2026',
            'time' => '8 min',
        ],
    ];
@endphp

<section
    aria-labelledby="journal-hero-title"
    class="bg-[var(--color-offwhite)] pt-32 pb-16 lg:pt-40 lg:pb-20"
>
    <div class="container-x">

        <header class="reveal max-w-4xl">
            <span class="inline-flex items-center rounded-full bg-[var(--color-forest)]/5 px-5 py-2 text-xs font-semibold uppercase tracking-[0.18em] text-[var(--color-forest)]">
                The Summit Journal
            </span>
            <h1
                id="journal-hero-title"
                class="mt-8 font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] md:text-6xl lg:text-[72px] lg:leading-[1.1]"
            >
                Stories from the Edge of the World
            </h1>
            <p class="mt-8 max-w-2xl text-base leading-relaxed text-[var(--color-charcoal)]/70 lg:text-xl lg:leading-[1.6]">
                Expedition chronicles, technical insights, and adventure narratives from the
                mountains, glaciers, and wilderness that shape our community.
            </p>
        </header>

<div class="mt-16 grid gap-8 lg:mt-20 lg:grid-cols-12 lg:gap-8">

<article class="reveal lg:col-span-8 flex">
                <a
                    href="{{ route('article.show', ['slug' => $featured['slug']]) }}"
                    class="card-image group relative flex h-full min-h-[560px] w-full overflow-hidden rounded-3xl border border-black/5 bg-[var(--color-charcoal)] shadow-[0_2px_20px_0_rgba(0,0,0,0.06)] sm:min-h-[640px] lg:min-h-0"
                >
                    <img
                        src="{{ $featured['image'] }}"
                        alt="{{ $featured['title'] }}"
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover"
                    >

<div aria-hidden="true" class="absolute inset-0 bg-gradient-to-r from-black/40 via-transparent to-transparent"></div>
                    <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/30 to-transparent"></div>

<span class="absolute left-6 top-6 inline-flex items-center rounded-full bg-[var(--color-orange)] px-5 py-2 text-[13px] font-semibold uppercase tracking-[0.025em] text-white shadow-[0_8px_20px_-4px_rgba(0,0,0,0.3)] sm:left-8 sm:top-8">
                        {{ $featured['badge'] }}
                    </span>

<div class="absolute inset-x-0 bottom-0 p-6 text-white sm:p-10 lg:p-12">
                        <h2 class="max-w-3xl font-display text-3xl font-bold leading-[1.1] tracking-[-0.025em] sm:text-4xl lg:text-[56px] lg:leading-[1.1]">
                            {{ $featured['title'] }}
                        </h2>
                        <p class="mt-6 max-w-2xl text-sm leading-relaxed text-white/95 sm:text-base lg:text-lg lg:leading-[1.625]">
                            {{ $featured['excerpt'] }}
                        </p>

<ul class="mt-8 flex flex-wrap items-center gap-x-8 gap-y-3 text-sm text-white/85" aria-label="Article metadata">
                            <li class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="7" r="4"/>
                                </svg>
                                <span class="font-medium">{{ $featured['author'] }}</span>
                            </li>
                            <li class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                                    <path d="M16 2v4M8 2v4M3 10h18" stroke-linecap="round"/>
                                </svg>
                                <span>{{ $featured['date'] }}</span>
                            </li>
                            <li class="inline-flex items-center gap-2">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 2" stroke-linecap="round"/>
                                </svg>
                                <span>{{ $featured['time'] }}</span>
                            </li>
                        </ul>

                        <span class="mt-8 inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3.5 text-base font-semibold text-[var(--color-forest)] shadow-[0_8px_20px_-4px_rgba(0,0,0,0.2)] transition group-hover:bg-[var(--color-stone)]">
                            Read Full Story
                        </span>
                    </div>
                </a>
            </article>

<aside class="reveal lg:col-span-4 lg:flex lg:flex-col">
                <header class="mb-8">
                    <h3 class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
                        Recent Stories
                    </h3>
                    <p class="mt-2 text-[15px] text-[var(--color-charcoal)]/60">Latest from the field</p>
                </header>

                <ul class="flex flex-col gap-6">
                    @foreach ($recent as $story)
                        <li>
                            <a
                                href="#"
                                class="group block rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_6px_rgba(0,0,0,0.04)] transition hover:-translate-y-0.5 hover:shadow-[0_8px_24px_-12px_rgba(28,28,28,0.18)]"
                            >
                                <span class="inline-flex items-center rounded-full bg-[var(--color-forest)]/5 px-3 py-1 text-[11px] font-semibold uppercase tracking-[0.025em] text-[var(--color-forest)]">
                                    {{ $story['category'] }}
                                </span>
                                <h4 class="mt-4 font-display text-xl font-bold leading-[1.25] tracking-[-0.025em] text-[var(--color-charcoal)]">
                                    {{ $story['title'] }}
                                </h4>
                                <p class="mt-3 text-[15px] leading-[1.625] text-[var(--color-charcoal)]/70">
                                    {{ $story['excerpt'] }}
                                </p>
                                <div class="mt-5 flex items-center gap-3 border-t border-black/5 pt-4 text-[13px] text-[var(--color-charcoal)]/60">
                                    <span>{{ $story['date'] }}</span>
                                    <span aria-hidden="true">·</span>
                                    <span>{{ $story['time'] }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</section>
