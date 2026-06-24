
@php
    $categories = [
        ['name' => 'All Stories', 'active' => true],
        ['name' => 'Expedition'],
        ['name' => 'Hiking'],
        ['name' => 'Survival'],
        ['name' => 'Gear Guide'],
        ['name' => 'Mountain Stories'],
        ['name' => 'Adventure Journal'],
        ['name' => 'Outdoor Culture'],
    ];
@endphp

<section
    aria-labelledby="category-nav-title"
    class="bg-[var(--color-offwhite)] py-16 lg:py-20"
>
    <div class="container-x">
        <div class="flex items-center justify-between">
            <h2 id="category-nav-title" class="text-sm font-semibold tracking-[0.025em] text-[var(--color-charcoal)]">
                Browse by Category
            </h2>
            <p class="text-sm text-[var(--color-charcoal)]/60">147 Articles</p>
        </div>

<nav
            aria-label="Article categories"
            class="mt-8 -mx-4 overflow-x-auto px-4 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden lg:mx-0 lg:px-0 lg:overflow-visible"
        >
            <ul class="flex w-max gap-3 lg:w-auto lg:flex-wrap">
                @foreach ($categories as $cat)
                    <li>
                        <a
                            href="#"
                            @if (! empty($cat['active'])) aria-current="page" @endif
                            class="
                                inline-flex h-[46px] items-center rounded-2xl border px-6 text-[15px] font-semibold transition
                                @if (! empty($cat['active']))
                                    border-[var(--color-charcoal)] bg-[var(--color-charcoal)] text-white
                                @else
                                    border-black/10 bg-white text-[var(--color-charcoal)] hover:border-black/30 hover:bg-black/5
                                @endif
                            "
                        >
                            {{ $cat['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</section>
