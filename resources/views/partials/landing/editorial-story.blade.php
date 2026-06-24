
@php
    $stats = [
        ['value' => '8,000m', 'label' => 'Tested at extreme altitudes'],
        ['value' => '-40°C', 'label' => 'Proven in harsh winters'],
        ['value' => '350+', 'label' => 'Expeditions equipped'],
        ['value' => '100%', 'label' => 'Lifetime warranty'],
    ];
@endphp

<section id="story" aria-label="Our story" class="bg-[var(--color-offwhite)] py-24 lg:py-32">
    <div class="container-x">

<div class="grid gap-12 lg:grid-cols-2 lg:items-center lg:gap-20">
            <div class="reveal">
                <span class="eyebrow">Our Philosophy</span>
                <h2 class="mt-4 font-display text-4xl font-bold leading-[1.05] tracking-tight md:text-5xl lg:text-6xl">
                    Built for Those Who<br>
                    <span class="italic font-medium text-[var(--color-forest)]">Seek the Summit</span>
                </h2>

                <div class="mt-8 space-y-5 text-base leading-relaxed text-[var(--color-charcoal)]/75 lg:text-lg">
                    <p>
                        Every piece of gear we create is tested in the harshest environments on
                        earth. From frozen Himalayan ridges to wind-swept Patagonian steppes, our
                        equipment earns its place in your kit one expedition at a time.
                    </p>
                    <p>
                        We believe the wilderness demands respect, preparation, and uncompromising
                        equipment. That's not marketing. It's the principle every product is
                        designed against.
                    </p>
                </div>

                <dl class="mt-12 grid grid-cols-2 gap-x-8 gap-y-10">
                    @foreach ($stats as $stat)
                        <div>
                            <dt class="font-display text-3xl font-bold text-[var(--color-charcoal)] lg:text-4xl">
                                {{ $stat['value'] }}
                            </dt>
                            <dd class="mt-2 text-sm text-[var(--color-charcoal)]/65">{{ $stat['label'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>

            <figure class="card-image relative aspect-[4/5] overflow-hidden rounded-3xl bg-[var(--color-stone)]/40 reveal">
                <img
                    src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=1400&q=70"
                    alt="Climber on a snowy ridge at first light"
                    loading="lazy"
                    class="absolute inset-0 h-full w-full object-cover"
                >
            </figure>
        </div>

<article class="relative mt-24 overflow-hidden rounded-3xl bg-[var(--color-forest)] text-[var(--color-offwhite)] lg:mt-32 reveal">
            <div class="grid gap-0 lg:grid-cols-2">
                <div class="p-10 sm:p-14 lg:p-20">
                    <span class="text-xs font-semibold tracking-[0.22em] uppercase text-[var(--color-stone)]">
                        Sustainability Commitment
                    </span>
                    <h3 class="mt-4 font-display text-3xl font-bold leading-tight md:text-4xl lg:text-5xl">
                        Protecting the Peaks We Climb
                    </h3>
                    <p class="mt-6 max-w-lg text-base text-white/75 lg:text-lg">
                        We're committed to leaving no trace. From recycled technical fabrics to
                        carbon-neutral shipping and a lifetime repair program, we design for the
                        long haul, not the landfill.
                    </p>
                    <a
                        href="#"
                        class="mt-10 inline-flex items-center gap-3 rounded-full border border-white/40 px-7 py-4 text-sm font-medium transition hover:border-white hover:bg-white/10"
                    >
                        Learn Our Impact
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

                <div class="relative min-h-[320px] lg:min-h-full">
                    <img
                        src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=1400&q=70"
                        alt="Foggy mountain valley at dawn"
                        loading="lazy"
                        class="absolute inset-0 h-full w-full object-cover"
                    >
                </div>
            </div>
        </article>
    </div>
</section>
