
<header
    data-site-nav
    class="
        fixed inset-x-0 top-0 z-50 transition-colors duration-300
        bg-[var(--color-offwhite)]/55 backdrop-blur-xl backdrop-saturate-150
        border-b border-white/30 shadow-[0_1px_0_0_rgb(255_255_255_/_0.25)_inset,0_8px_24px_-12px_rgb(28_28_28_/_0.18)]
        supports-[backdrop-filter]:bg-[var(--color-offwhite)]/45

        max-lg:[&.is-scrolled]:bg-transparent
        max-lg:[&.is-scrolled]:backdrop-blur-none
        max-lg:[&.is-scrolled]:backdrop-saturate-100
        max-lg:[&.is-scrolled]:border-transparent
        max-lg:[&.is-scrolled]:shadow-none

        max-lg:[&.is-menu-open]:!bg-white
        max-lg:[&.is-menu-open]:!backdrop-blur-none
        max-lg:[&.is-menu-open]:!backdrop-saturate-100
        max-lg:[&.is-menu-open]:!border-black/10
        max-lg:[&.is-menu-open]:!shadow-none
    "
>
    <div class="container-x flex items-center justify-between py-5 lg:py-6">
        <a href="/" class="font-display text-2xl font-bold tracking-tight text-[var(--color-charcoal)]">
            SummitX
        </a>

        <nav aria-label="Primary" class="hidden lg:block">
            <ul class="flex items-center gap-10 text-sm font-medium text-[var(--color-charcoal)]/80">
                <li><a href="{{ route('products') }}" class="link-arrow">Products</a></li>
                <li><a href="{{ route('articles') }}" class="link-arrow">Articles</a></li>
                <li><a href="#contact" class="link-arrow">Contact</a></li>
            </ul>
        </nav>

        <div class="flex items-center gap-3">
            @if (request()->routeIs('products') || request()->routeIs('products.*') || request()->routeIs('product.*') || request()->routeIs('cart'))
                <a
                    href="{{ route('cart') }}"
                    aria-label="View cart"
                    class="hidden sm:inline-flex items-center gap-2 rounded-full bg-[var(--color-charcoal)] px-6 py-2.5 text-sm font-medium text-[var(--color-offwhite)] transition hover:bg-[var(--color-forest)]"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <circle cx="9" cy="20" r="1.5"/>
                        <circle cx="17" cy="20" r="1.5"/>
                        <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.5L21 8H6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Cart
                </a>
            @else
                <a
                    href="{{ route('products') }}"
                    class="hidden sm:inline-flex items-center gap-2 rounded-full bg-[var(--color-charcoal)] px-6 py-2.5 text-sm font-medium text-[var(--color-offwhite)] transition hover:bg-[var(--color-forest)]"
                >
                    Shop Now
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M5 12h14M13 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            @endif

            <button
                type="button"
                data-mobile-toggle
                aria-controls="mobile-menu"
                aria-expanded="false"
                aria-label="Open menu"
                class="lg:hidden inline-flex h-10 w-10 items-center justify-center rounded-full border border-black/15 bg-white/40 backdrop-blur text-[var(--color-charcoal)]"
            >
                <svg class="h-5 w-5 max-lg:[[data-site-nav].is-menu-open_&]:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                </svg>
                <svg class="hidden h-5 w-5 max-lg:[[data-site-nav].is-menu-open_&]:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<div
    id="mobile-menu"
    data-mobile-menu
    class="
        lg:hidden fixed inset-x-0 top-0 bottom-0 z-40
        pointer-events-none opacity-0 transition-opacity duration-300
        [&.is-open]:pointer-events-auto [&.is-open]:opacity-100
    "
>

    <div class="absolute inset-0 bg-white" aria-hidden="true"></div>

    <nav
        aria-label="Mobile"
        class="container-x relative flex flex-col gap-1 pt-24 pb-8"
    >
        <a href="{{ route('products') }}" class="border-b border-black/10 py-4 font-display text-2xl text-[var(--color-charcoal)]">Products</a>
        <a href="{{ route('articles') }}" class="border-b border-black/10 py-4 font-display text-2xl text-[var(--color-charcoal)]">Articles</a>
        <a href="#contact" class="border-b border-black/10 py-4 font-display text-2xl text-[var(--color-charcoal)]">Contact</a>

        @if (request()->routeIs('products') || request()->routeIs('products.*') || request()->routeIs('product.*') || request()->routeIs('cart'))
            <a href="{{ route('cart') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-full bg-[var(--color-charcoal)] px-6 py-4 font-medium text-[var(--color-offwhite)]">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                    <circle cx="9" cy="20" r="1.5"/>
                    <circle cx="17" cy="20" r="1.5"/>
                    <path d="M3 4h2l2.4 11.2a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.5L21 8H6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Cart
            </a>
        @else
            <a href="{{ route('products') }}" class="mt-6 inline-flex items-center justify-center gap-2 rounded-full bg-[var(--color-charcoal)] px-6 py-4 font-medium text-[var(--color-offwhite)]">
                Shop Now
            </a>
        @endif
    </nav>
</div>
