
@php
    $testimonials = [
        [
            'quote' => 'The Alpine Summit Shell saved my life during an unexpected storm at 7,800 meters. Twelve hours of -40°C winds and the shell never gave. I will never climb without SummitX again.',
            'name' => 'Marcus Reid',
            'role' => 'Expedition Leader',
            'location' => 'Denali North Face, Alaska',
            'span' => 'lg:row-span-2',
            'tall' => true,
        ],
        [
            'quote' => 'After testing dozens of packs, the Expedition 65L is the only one that held up across both rock and ice over a full season.',
            'name' => 'Sarah Chen',
            'role' => 'Alpine Guide',
            'location' => 'Patagonia, Argentina',
            'tall' => false,
        ],
        [
            'quote' => 'I\'ve summited fourteen 8,000m peaks wearing SummitX. The detail in the design is what separates it.',
            'name' => 'Anders Holm',
            'role' => 'High-Altitude Mountaineer',
            'location' => 'K2 Base Camp, Pakistan',
            'tall' => false,
        ],
        [
            'quote' => 'As a wilderness photographer, I need gear that performs in silence. SummitX disappears into the work, which is the highest praise I can give it.',
            'name' => 'Elena Kovač',
            'role' => 'Wilderness Photographer',
            'location' => 'Canadian Rockies',
            'wide' => true,
        ],
    ];
@endphp

<section aria-labelledby="testimonials-title" class="bg-[var(--color-offwhite)] py-24 lg:py-32">
    <div class="container-x">
        <header class="text-center reveal">
            <span class="eyebrow">Trusted by Adventurers</span>
            <h2 id="testimonials-title" class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-5xl lg:text-6xl">
                Stories from the Field
            </h2>
        </header>

        <div class="mt-16 grid auto-rows-fr gap-6 lg:grid-cols-3 lg:gap-8">
            @foreach ($testimonials as $t)
                <figure class="reveal flex h-full flex-col rounded-3xl bg-white p-8 shadow-soft lg:p-10
                    @if(($t['tall'] ?? false)) lg:col-span-1 lg:row-span-2 @endif
                    @if(($t['wide'] ?? false)) lg:col-span-2 @endif">

<div class="flex items-center gap-1 text-[var(--color-orange)]" aria-label="Rated 5 out of 5">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path d="M12 2.5l2.92 6.32 6.58.7-4.92 4.5 1.4 6.48L12 17.27 5.02 20.5l1.4-6.48L1.5 9.52l6.58-.7L12 2.5z"/>
                            </svg>
                        @endfor
                    </div>

                    <svg class="mt-8 h-10 w-10 text-[var(--color-stone)]" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M9 7H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h2v1a3 3 0 0 1-3 3v2a5 5 0 0 0 5-5V9a2 2 0 0 0 0-2zm12 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h2v1a3 3 0 0 1-3 3v2a5 5 0 0 0 5-5V9a2 2 0 0 0 0-2z"/>
                    </svg>

                    <blockquote class="mt-5 flex-1 font-display text-lg leading-relaxed text-[var(--color-charcoal)]
                        @if(($t['tall'] ?? false)) lg:text-2xl @else lg:text-lg @endif">
                        “{{ $t['quote'] }}”
                    </blockquote>

                    <figcaption class="mt-8 border-t border-black/10 pt-6">
                        <p class="font-display text-lg font-bold text-[var(--color-charcoal)]">{{ $t['name'] }}</p>
                        <p class="mt-1 text-sm text-[var(--color-charcoal)]/70">{{ $t['role'] }}</p>
                        <p class="mt-1 text-sm text-[var(--color-charcoal)]/55">{{ $t['location'] }}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>

        <div class="mt-16 flex flex-col items-center gap-3 reveal">
            <p class="text-sm text-[var(--color-charcoal)]/65">Rated 4.9/5 by over 15,000 outdoor professionals</p>
            <div class="flex items-center gap-2">
                <div class="flex items-center gap-1 text-[var(--color-orange)]" aria-hidden="true">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.5l2.92 6.32 6.58.7-4.92 4.5 1.4 6.48L12 17.27 5.02 20.5l1.4-6.48L1.5 9.52l6.58-.7L12 2.5z"/>
                        </svg>
                    @endfor
                </div>
                <span class="font-display text-lg font-bold">4.9</span>
            </div>
        </div>
    </div>
</section>
