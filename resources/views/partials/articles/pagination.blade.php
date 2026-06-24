
@php
    $current = 1;
    $total = 12;
    $pages = [1, 2, 3, 4, 5, '...', 12];
@endphp

<nav
    aria-label="Pagination"
    class="bg-[var(--color-offwhite)] pb-24 lg:pb-32"
>
    <div class="container-x">
        <div class="flex flex-col items-center gap-6">

<div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">

                <a
                    href="#"
                    rel="prev"
                    aria-disabled="true"
                    class="pointer-events-none inline-flex items-center gap-2 rounded-2xl border border-black/10 bg-white px-5 py-3 text-sm font-semibold text-[var(--color-charcoal)]/40"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Previous
                </a>

                <ol class="flex items-center gap-2">
                    @foreach ($pages as $page)
                        <li>
                            @if ($page === '...')
                                <span class="inline-flex h-11 w-11 items-center justify-center text-sm text-[var(--color-charcoal)]/40" aria-hidden="true">…</span>
                            @else
                                <a
                                    href="#"
                                    @if ($page === $current) aria-current="page" @endif
                                    class="
                                        inline-flex h-11 w-11 items-center justify-center rounded-full text-sm font-semibold transition
                                        @if ($page === $current)
                                            bg-[var(--color-charcoal)] text-white
                                        @else
                                            text-[var(--color-charcoal)] hover:bg-black/5
                                        @endif
                                    "
                                >
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ol>

                <a
                    href="#"
                    rel="next"
                    class="inline-flex items-center gap-2 rounded-2xl border border-black/10 bg-white px-5 py-3 text-sm font-semibold text-[var(--color-charcoal)] transition hover:border-black/30 hover:bg-black/5"
                >
                    Next
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>

            <p class="text-sm text-[var(--color-charcoal)]/60">
                Page {{ $current }} of {{ $total }}
            </p>
        </div>
    </div>
</nav>
