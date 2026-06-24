
@php
    $rowA = [
        'feature' => [
            'title' => "Into the Ice: A Winter Expedition to Greenland's Glaciers",
            'excerpt' => 'Three months traversing the frozen expanse of Greenland\'s eastern ice sheet, where each day brings new tests of preparation and resolve.',
            'author' => 'Dr. Sarah Chen',
            'date' => 'Apr 28, 2026',
            'time' => '16 min',
            'image' => 'https://images.unsplash.com/photo-1454942901704-3c44c11b2ad1?auto=format&fit=crop&w=1600&q=70',
        ],
        'side' => [
            [
                'title' => 'Trail Therapy: Finding Clarity on the Pacific Crest',
                'excerpt' => 'A 2,650-mile journey through wilderness that becomes a meditation on solitude, weather, and the long view.',
                'author' => 'Marcus Reid',
                'date' => 'Apr 25, 2026',
                'time' => '14 min',
                'image' => 'https://images.unsplash.com/photo-1506260408121-e353d10b87c7?auto=format&fit=crop&w=1100&q=70',
            ],
            [
                'title' => 'Alpine Minimalism: The Art of Lightweight Camping',
                'excerpt' => 'How cutting weight transforms your mountain experience and changes the way you see the trail.',
                'author' => 'Jamie Rivers',
                'date' => 'Apr 22, 2026',
                'time' => '9 min',
                'image' => 'https://images.unsplash.com/photo-1504280390367-361c6d9f38f4?auto=format&fit=crop&w=1100&q=70',
            ],
        ],
    ];

    $rowB = [
        [
            'title' => 'Wilderness Navigation Without Technology',
            'excerpt' => 'When GPS fails and batteries die, these ancient wayfinding skills become the difference between adventure and emergency.',
            'author' => 'Elena Torres',
            'date' => 'Apr 20, 2026',
            'time' => '11 min',
            'image' => 'https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?auto=format&fit=crop&w=900&q=70',
        ],
        [
            'title' => 'The Last Silent Places: Remote Peaks of Central Asia',
            'excerpt' => 'Exploring the Pamir Mountains, where peaks remain unnamed and silence becomes its own kind of sound.',
            'author' => 'David Park',
            'date' => 'Apr 18, 2026',
            'time' => '13 min',
            'image' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=900&q=70',
        ],
        [
            'title' => 'Beyond the Summit: What Happens After You Reach the Top',
            'excerpt' => 'The descent, the return to ordinary life, and the strange weight of having stood on the high places.',
            'author' => 'Alex Morrison',
            'date' => 'Apr 15, 2026',
            'time' => '10 min',
            'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=900&q=70',
        ],
    ];
@endphp

<section
    id="articles-grid"
    aria-labelledby="articles-grid-title"
    class="bg-[var(--color-offwhite)] pb-24 lg:pb-32"
>
    <h2 id="articles-grid-title" class="sr-only">All articles</h2>

    <div class="container-x flex flex-col gap-10">

<div class="grid items-stretch gap-10 lg:grid-cols-12">
            <article class="reveal lg:col-span-7 flex">
                @include('partials.articles.article-card', [
                    'article' => $rowA['feature'],
                    'variant' => 'feature',
                ])
            </article>

            <div class="lg:col-span-5 grid gap-10 lg:grid-rows-2">
                @foreach ($rowA['side'] as $story)
                    <article class="reveal flex">
                        @include('partials.articles.article-card', ['article' => $story])
                    </article>
                @endforeach
            </div>
        </div>

<div class="grid items-stretch gap-10 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($rowB as $story)
                <article class="reveal flex">
                    @include('partials.articles.article-card', ['article' => $story])
                </article>
            @endforeach
        </div>

<div class="reveal mt-6 flex justify-center">
            <a
                href="#"
                class="inline-flex items-center gap-3 rounded-full border border-[var(--color-charcoal)]/20 px-8 py-4 text-sm font-semibold text-[var(--color-charcoal)] transition hover:border-[var(--color-charcoal)] hover:bg-[var(--color-charcoal)] hover:text-white"
            >
                Load More Stories
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M12 5v14M5 12l7 7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>
