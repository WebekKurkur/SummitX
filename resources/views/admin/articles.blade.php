@php
    $articles = [
        [
            'title' => "Vertical Dreams: Ascending El Capitan's Dawn Wall",
            'author' => 'Tommy Caldwell',
            'category' => 'Climbing',
            'status' => 'published',
            'date' => 'May 8, 2026',
            'views' => '12,453',
            'image' => 'https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Summit Strategies: Planning Your First 8000m Peak',
            'author' => 'Sarah Mitchell',
            'category' => 'Mountaineering',
            'status' => 'published',
            'date' => 'May 5, 2026',
            'views' => '8,921',
            'image' => 'https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Expedition Nutrition: Fueling Multi-Day Adventures',
            'author' => 'David Chen',
            'category' => 'Training',
            'status' => 'draft',
            'date' => 'May 3, 2026',
            'views' => '0',
            'image' => 'https://images.unsplash.com/photo-1505672678657-cc7037095e60?auto=format&fit=crop&w=160&h=160&q=70',
        ],
        [
            'title' => 'Alpine Photography: Capturing the Wilderness',
            'author' => 'Emma Rodriguez',
            'category' => 'Photography',
            'status' => 'published',
            'date' => 'April 28, 2026',
            'views' => '15,678',
            'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&w=160&h=160&q=70',
        ],
    ];

    $filters = ['All', 'Climbing', 'Mountaineering', 'Training', 'Photography', 'Gear'];
    $activeFilter = 'All';
@endphp

@extends('admin.layouts.admin')

@section('title', 'Articles')
@section('description', 'Manage expedition stories and editorial content.')

@section('content')
    <header class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">
        <div>
            <h1 class="font-display text-3xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)] md:text-4xl lg:text-[40px]">
                Articles
            </h1>
            <p class="mt-3 text-base text-[var(--color-charcoal)]/60">
                Manage expedition stories and editorial content
            </p>
        </div>

        <a
            href="{{ route('admin.articles.editor') }}"
            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[var(--color-charcoal)] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[var(--color-forest)]"
        >
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
            </svg>
            New Article
        </a>
    </header>

    <section
        aria-label="Filter articles"
        class="mt-10 rounded-2xl border border-black/5 bg-white p-6 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-7"
    >
        <form role="search" aria-label="Search articles" class="relative" onsubmit="event.preventDefault();">
            <label for="article-search" class="sr-only">Search articles</label>
            <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-5 flex items-center text-[var(--color-charcoal)]/50">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="m20 20-3.5-3.5" stroke-linecap="round"/>
                </svg>
            </span>
            <input
                id="article-search"
                type="search"
                name="q"
                placeholder="Search articles..."
                class="w-full rounded-2xl border border-black/10 bg-[var(--color-offwhite)] py-3.5 pl-14 pr-5 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </form>

        <nav
            aria-label="Article categories"
            class="mt-5 -mx-2 overflow-x-auto px-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
            data-filter-group="article-category"
            data-filter-active-class="border-[var(--color-charcoal)] bg-[var(--color-charcoal)] text-white"
            data-filter-inactive-class="border-black/10 bg-white text-[var(--color-charcoal)]/80 hover:border-black/30 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
        >
            <ul class="flex w-max gap-2 sm:flex-wrap sm:w-auto">
                @foreach ($filters as $filter)
                    @php
                        $isActive = $filter === $activeFilter;
                        $value = strtolower($filter);
                        $base = 'inline-flex h-9 items-center rounded-full border px-4 text-sm font-semibold transition';
                        $state = $isActive
                            ? 'border-[var(--color-charcoal)] bg-[var(--color-charcoal)] text-white'
                            : 'border-black/10 bg-white text-[var(--color-charcoal)]/80 hover:border-black/30 hover:bg-black/5 hover:text-[var(--color-charcoal)]';
                    @endphp
                    <li>
                        <button
                            type="button"
                            data-filter-btn="{{ $value }}"
                            @if ($isActive) aria-current="true" @endif
                            class="{{ $base }} {{ $state }}"
                        >
                            {{ $filter }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </nav>
    </section>

    <section
        aria-labelledby="articles-table-title"
        class="mt-8 overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_20px_0_rgba(0,0,0,0.04)]"
    >
        <h2 id="articles-table-title" class="sr-only">Articles</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-[var(--color-offwhite)] text-xs font-semibold uppercase tracking-[0.08em] text-[var(--color-charcoal)]/60">
                    <tr>
                        <th scope="col" class="px-6 py-4">Title</th>
                        <th scope="col" class="px-6 py-4">Category</th>
                        <th scope="col" class="px-6 py-4">Status</th>
                        <th scope="col" class="px-6 py-4">Date</th>
                        <th scope="col" class="px-6 py-4">Views</th>
                        <th scope="col" class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-black/5" data-filter-target="article-category">
                    @foreach ($articles as $a)
                        @php
                            $statusClasses = $a['status'] === 'published'
                                ? 'bg-[var(--color-forest)]/10 text-[var(--color-forest)]'
                                : 'bg-amber-50 text-amber-700';
                            $statusLabel = ucfirst($a['status']);
                            $articleSlug = \Illuminate\Support\Str::slug($a['title']);
                        @endphp
                        <tr
                            data-filter-tag="{{ strtolower($a['category']) }}"
                            data-confirm-remove
                            class="bg-white transition hover:bg-[var(--color-offwhite)]/60"
                        >
                            <td class="px-6 py-5 align-middle">
                                <div class="flex items-center gap-3">
                                    <div class="h-12 w-12 shrink-0 overflow-hidden rounded-2xl bg-[var(--color-offwhite)]">
                                        <img
                                            src="{{ $a['image'] }}"
                                            alt=""
                                            loading="lazy"
                                            class="h-full w-full object-cover"
                                        >
                                    </div>
                                    <div class="min-w-0">
                                        <p class="truncate text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]">
                                            {{ $a['title'] }}
                                        </p>
                                        <p class="mt-0.5 text-[13px] font-medium leading-[19.5px] text-[var(--color-charcoal)]/60">
                                            by {{ $a['author'] }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="inline-flex h-6 items-center rounded-[10px] bg-[var(--color-offwhite)] px-3 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70">
                                    {{ $a['category'] }}
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="inline-flex h-6 items-center rounded-[10px] px-3 text-[13px] font-semibold leading-[19.5px] {{ $statusClasses }}">
                                    {{ $statusLabel }}
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle text-[15px] leading-[22.5px] text-[var(--color-charcoal)]">
                                {{ $a['date'] }}
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <span class="inline-flex items-center gap-2 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]">
                                    <svg class="h-4 w-4 text-[var(--color-charcoal)]/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke-linecap="round" stroke-linejoin="round"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    {{ $a['views'] }}
                                </span>
                            </td>
                            <td class="px-6 py-5 align-middle">
                                <div class="flex items-center justify-end gap-2">
                                    <a
                                        href="{{ route('admin.articles.editor', ['id' => $articleSlug]) }}"
                                        aria-label="Edit {{ $a['title'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-[var(--color-charcoal)]/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <a
                                        href="/articles/{{ $articleSlug }}"
                                        aria-label="View {{ $a['title'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-[var(--color-charcoal)]/5 hover:text-[var(--color-charcoal)]"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" stroke-linecap="round" stroke-linejoin="round"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </a>
                                    <button
                                        type="button"
                                        aria-label="Delete {{ $a['title'] }}"
                                        data-confirm-delete
                                        data-confirm-type="article"
                                        data-confirm-name="{{ $a['title'] }}"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-[10px] bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-rose-50 hover:text-rose-600"
                                    >
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div
                data-filter-empty="article-category"
                class="hidden px-6 py-16 text-center text-sm text-[var(--color-charcoal)]/60"
            >
                No articles in this category yet.
            </div>
        </div>
    </section>
@endsection
