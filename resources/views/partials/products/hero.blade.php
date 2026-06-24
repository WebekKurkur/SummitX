
<section
    aria-labelledby="catalog-hero-title"
    class="bg-[var(--color-offwhite)] pt-32 pb-12 lg:pt-40 lg:pb-16"
>
    <div class="container-x">
        <div class="reveal max-w-5xl">
            <p class="text-[13px] font-semibold uppercase tracking-[0.2em] text-[var(--color-forest)]">
                Expedition Collection 2026
            </p>

            <h1 class="mt-5 max-w-4xl font-display text-4xl font-bold leading-[1.05] tracking-[-0.025em] text-[var(--color-charcoal)] sm:text-5xl md:text-6xl lg:text-[80px] lg:leading-[1.05]">
                @if ($activeCategory === 'all')
                    Premium Outdoor Gear for Every Adventure
                @else
                    {{ $activeLabel }} for Every Adventure
                @endif
            </h1>

            <p class="mt-8 max-w-2xl text-base leading-relaxed text-[var(--color-charcoal)]/70 lg:text-xl lg:leading-[1.625]">
                Explore our curated collection of expedition-tested equipment, designed for
                climbers, hikers, and outdoor enthusiasts who demand performance without
                compromise.
            </p>
        </div>
    </div>
</section>
