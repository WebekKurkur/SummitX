
<section
    aria-label="Hero"
    class="relative isolate min-h-[100svh] overflow-hidden bg-[var(--color-charcoal)] text-[var(--color-offwhite)]"
>

    <img
        src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=2400&q=70"
        alt=""
        aria-hidden="true"
        loading="eager"
        fetchpriority="high"
        class="absolute inset-0 h-full w-full object-cover opacity-80"
    >

<div
        aria-hidden="true"
        class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/30 to-[var(--color-charcoal)]/95"
    ></div>
    <div
        aria-hidden="true"
        class="absolute inset-0 bg-gradient-to-r from-black/55 via-transparent to-transparent"
    ></div>

    <div class="container-x relative flex min-h-[100svh] flex-col justify-end pt-32 pb-20 lg:pt-40 lg:pb-28">
        <div class="max-w-3xl reveal">
            <span class="inline-flex items-center gap-2 rounded-full border border-white/25 px-4 py-1.5 text-[11px] tracking-[0.22em] uppercase">
                <span class="h-1.5 w-1.5 rounded-full bg-[var(--color-orange)]" aria-hidden="true"></span>
                New Season Collection
            </span>

            <h1 class="mt-6 font-display text-[clamp(3rem,8vw,7rem)] font-bold leading-[0.95] tracking-tight">
                Conquer the<br>
                <span class="italic font-medium text-[var(--color-stone)]">Wild Unknown</span>
            </h1>

            <p class="mt-8 max-w-xl text-base text-white/75 lg:text-lg">
                Premium outdoor gear engineered for adventurers who refuse to compromise. Tested in
                the harshest environments on earth, built for the journeys that define us.
            </p>

            <div class="mt-10 flex flex-wrap items-center gap-4">
                <a
                    href="#products"
                    class="inline-flex items-center gap-3 rounded-full bg-[var(--color-offwhite)] px-7 py-4 text-sm font-medium text-[var(--color-charcoal)] transition hover:bg-[var(--color-stone)]"
                >
                    Explore Collection
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <a
                    href="#story"
                    class="inline-flex items-center gap-3 rounded-full border border-white/30 px-7 py-4 text-sm font-medium text-white transition hover:bg-white/10"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                    Watch Film
                </a>
            </div>
        </div>

<dl class="mt-16 grid grid-cols-3 gap-px border-t border-white/15 pt-10 lg:mt-24 reveal">
            @foreach ([
                ['500+', 'Premium Products'],
                ['15K+', 'Happy Adventurers'],
                ['4.9★', 'Customer Rating'],
            ] as [$value, $label])
                <div class="px-1 sm:px-6 first:pl-0 last:pr-0">
                    <dt class="font-display text-3xl font-bold sm:text-5xl">{{ $value }}</dt>
                    <dd class="mt-2 text-xs uppercase tracking-[0.18em] text-white/60 sm:text-sm">{{ $label }}</dd>
                </div>
            @endforeach
        </dl>
    </div>

<div class="pointer-events-none absolute inset-x-0 bottom-6 hidden justify-center lg:flex" aria-hidden="true">
        <span class="flex h-10 w-6 items-start justify-center rounded-full border border-white/30 p-1.5">
            <span class="h-2 w-1 animate-pulse rounded-full bg-white/70"></span>
        </span>
    </div>
</section>
