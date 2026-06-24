@php
    $id = request()->query('id');
    $article = null;
    if ($id) {
        foreach ($articles as $a) {
            if (\Illuminate\Support\Str::slug($a['title']) === $id) {
                $article = $a;
                break;
            }
        }
    }

    $isEdit = $article !== null;
    $title  = $article['title']    ?? 'Untitled Article';
    $author = $article['author']   ?? '';
    $category = $article['category'] ?? '';
    $date   = $article['date']     ?? now()->format('F j, Y');
    $status = $article['status']   ?? 'draft';
    $views  = $article['views']    ?? '0';
    $preview = $article['image']   ?? null;
    $excerpt = $article['excerpt']
        ?? "A 19-day journey on one of climbing's most demanding routes, where every move is calculated, every pitch tests the limits of human endurance, and the granite wall becomes both obstacle and teacher.";
@endphp

@extends('admin.layouts.admin')

@section('title', $isEdit ? 'Edit Article' : 'New Article')
@section('description', 'Compose and publish an article.')

{{-- Tell the layout to skip its main padding so the editor chrome owns the edges. --}}
@section('main_padding', '')

@section('content')
    <div class="flex min-h-[calc(100vh-0px)] flex-col">
        <div
            class="flex items-center gap-4 border-b border-black/5 bg-white px-8 py-4 shadow-[0_2px_4px_0_rgba(0,0,0,0.04)]"
        >
            <a
                href="{{ route('admin.articles') }}"
                aria-label="Back to Articles"
                class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-2xl bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
            >
                <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <div class="min-w-0 flex-1">
                <input
                    type="text"
                    name="title"
                    value="{{ $title }}"
                    data-article-editor-title
                    placeholder="Untitled Article"
                    aria-label="Article title"
                    class="w-full truncate bg-transparent text-[18px] font-bold leading-[27px] text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/40"
                />
                <p class="mt-0.5 text-[13px] font-normal leading-[19.5px] text-[var(--color-charcoal)]/40" data-article-editor-meta>
                    <span data-article-editor-sections>0</span> sections
                    @if ($category)
                        · <span data-article-editor-category>{{ $category }}</span>
                    @endif
                </p>
            </div>

            <div
                data-article-editor-status-group
                class="flex shrink-0 items-center gap-1 rounded-2xl bg-[var(--color-offwhite)] p-1"
                role="tablist"
                aria-label="Article status"
            >
                <button
                    type="button"
                    role="tab"
                    data-article-editor-status="draft"
                    aria-selected="{{ $status === 'draft' ? 'true' : 'false' }}"
                    class="inline-flex h-[36px] items-center rounded-[10px] px-5 text-[13px] font-semibold capitalize leading-[19.5px] transition
                        @if ($status === 'draft')
                            bg-[var(--color-orange)] text-white shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)]
                        @else
                            text-[var(--color-charcoal)]/50 hover:text-[var(--color-charcoal)]
                        @endif
                    "
                >
                    Draft
                </button>
                <button
                    type="button"
                    role="tab"
                    data-article-editor-status="published"
                    aria-selected="{{ $status === 'published' ? 'true' : 'false' }}"
                    class="inline-flex h-[36px] items-center rounded-[10px] px-5 text-[13px] font-semibold capitalize leading-[19.5px] transition
                        @if ($status === 'published')
                            bg-[var(--color-orange)] text-white shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)]
                        @else
                            text-[var(--color-charcoal)]/50 hover:text-[var(--color-charcoal)]
                        @endif
                    "
                >
                    Published
                </button>
            </div>

            <button
                type="button"
                data-article-editor-save
                class="inline-flex shrink-0 items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-5 py-2.5 text-[15px] font-semibold leading-[22.5px] text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
            >
                <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                    <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Save
            </button>
        </div>

        <div class="flex min-h-0 flex-1">
            <aside
                class="flex w-[288px] shrink-0 flex-col overflow-y-auto border-r border-black/5 bg-white"
            >
                <div class="p-6">
                    <p class="text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                        Banner image
                    </p>
                    <div
                        data-article-editor-banner
                        class="relative mt-2 aspect-[243/139] w-full overflow-hidden rounded-[14px] border-2 border-dashed border-black/10
                            {{ $preview ? 'border-solid border-black/5' : '' }}
                        "
                    >
                        @if ($preview)
                            <img
                                src="{{ $preview }}"
                                alt=""
                                class="absolute inset-0 h-full w-full object-cover"
                            />
                            <button
                                type="button"
                                data-article-editor-banner-clear
                                aria-label="Remove banner"
                                class="absolute right-2 top-2 inline-flex h-8 w-8 items-center justify-center rounded-full bg-black/60 text-white transition hover:bg-black/80"
                            >
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                    <path d="M6 6l12 12M18 6 6 18" stroke-linecap="round"/>
                                </svg>
                            </button>
                        @else
                            <label
                                for="article-editor-banner-input"
                                class="absolute inset-[2px] flex cursor-pointer flex-col items-center justify-center gap-2 rounded-[12px] bg-[var(--color-offwhite)]"
                            >
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-[14px] bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">Click to upload</span>
                            </label>
                            <input
                                type="file"
                                id="article-editor-banner-input"
                                accept="image/*"
                                data-article-editor-banner-input
                                class="sr-only"
                            />
                        @endif
                    </div>

                    <div class="mt-6">
                        <label for="article-editor-author" class="mb-2 block text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                            Author
                        </label>
                        <input
                            id="article-editor-author"
                            type="text"
                            data-article-editor-author
                            value="{{ $author }}"
                            placeholder="Author name"
                            class="h-[42px] w-full rounded-[14px] bg-[var(--color-offwhite)] px-3 text-[15px] text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/50 focus:bg-white focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                        />
                    </div>

                    <div class="mt-6">
                        <label for="article-editor-category" class="mb-2 block text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                            Category
                        </label>
                        <div class="relative">
                            <select
                                id="article-editor-category"
                                data-article-editor-category-select
                                class="h-[42px] w-full appearance-none rounded-[14px] bg-[var(--color-offwhite)] px-3 pr-9 text-[15px] text-[var(--color-charcoal)] outline-none focus:bg-white focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                                style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2216%22 height=%2216%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231c1c1c%22 stroke-width=%221.6%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22/></svg>'); background-repeat: no-repeat; background-position: right 12px center; background-size: 16px;"
                            >
                                <option value="">Select category</option>
                                @foreach (['Climbing', 'Mountaineering', 'Training', 'Photography', 'Gear'] as $c)
                                    <option value="{{ $c }}" @selected($category === $c)>{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="article-editor-date" class="mb-2 block text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                            Publish date
                        </label>
                        <input
                            id="article-editor-date"
                            type="date"
                            data-article-editor-date
                            value="{{ \Illuminate\Support\Str::contains($date, '-') ? date('Y-m-d', strtotime($date)) : date('Y-m-d', strtotime($date)) }}"
                            class="h-[42px] w-full rounded-[14px] bg-[var(--color-offwhite)] px-3 text-[15px] text-[var(--color-charcoal)] outline-none focus:bg-white focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                        />
                    </div>

                    <div class="mt-6">
                        <label for="article-editor-excerpt" class="mb-2 block text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                            Excerpt
                        </label>
                        <textarea
                            id="article-editor-excerpt"
                            data-article-editor-excerpt
                            rows="5"
                            placeholder="Short summary for listings…"
                            class="block w-full resize-none rounded-[14px] bg-[var(--color-offwhite)] px-3 py-2.5 text-[14px] leading-[21px] text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/50 focus:bg-white focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                        >{{ $excerpt }}</textarea>
                    </div>

                    <div class="mt-6 border-t border-black/5 pt-5">
                        <p class="text-[12px] font-bold uppercase leading-[18px] tracking-[0.72px] text-[var(--color-charcoal)]/50">
                            Stats
                        </p>
                        <dl class="mt-3 space-y-2">
                            <div class="flex items-center justify-between text-[13px]">
                                <dt class="font-normal text-[var(--color-charcoal)]/50">Views</dt>
                                <dd class="font-semibold text-[var(--color-charcoal)]" data-article-editor-views>{{ $views }}</dd>
                            </div>
                            <div class="flex items-center justify-between pt-2 text-[13px]">
                                <dt class="font-normal text-[var(--color-charcoal)]/50">Sections</dt>
                                <dd class="font-semibold text-[var(--color-charcoal)]" data-article-editor-stats-sections>0</dd>
                            </div>
                        </dl>
                    </div>

                </div>
            </aside>

            <section class="flex-1 overflow-y-auto">
                <div class="mx-auto w-full max-w-[672px] px-8 py-10">
                    <div class="flex items-center gap-2">
                        <span
                            data-article-editor-canvas-pill
                            class="inline-flex h-[26px] items-center rounded-[10px] px-3 text-[12px] font-bold uppercase leading-[18px] tracking-[0.5px]
                                @if ($status === 'published') bg-[var(--color-forest)] text-white
                                @else bg-[var(--color-orange)] text-white
                                @endif
                            "
                        >
                            {{ ucfirst($status) }}
                        </span>
                        <span class="text-[13px] font-normal leading-[19.5px] text-[var(--color-charcoal)]/40" data-article-editor-canvas-category>
                            {{ $category ?: 'Uncategorized' }}
                        </span>
                    </div>

                    <h1
                        data-article-editor-canvas-title
                        class="mt-4 font-display text-[32px] font-bold leading-[38.4px] tracking-[-0.8px] text-[var(--color-charcoal)]"
                    >
                        {{ $title }}
                    </h1>

                    <div
                        data-article-editor-empty
                        class="mt-8 rounded-2xl border-2 border-dashed border-black/10 px-2 py-[66px] text-center
                            {{ $isEdit ? 'hidden' : '' }}
                        "
                    >
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[var(--color-offwhite)]">
                            <svg class="h-6 w-6 text-[var(--color-charcoal)]/40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <p class="mt-4 text-[16px] font-semibold leading-6 text-[var(--color-charcoal)]/40">No content yet</p>
                        <p class="mt-1 text-[14px] font-normal leading-[21px] text-[var(--color-charcoal)]/30">
                            Add a paragraph or image section below to start building your article
                        </p>
                    </div>

                    <div
                        data-article-editor-sections-list
                        class="mt-8 space-y-4
                            {{ $isEdit ? '' : 'hidden' }}
                        "
                    >
                        @if ($isEdit)
                            @php
                                $sectionMeta = [
                                    'paragraph' => ['label' => 'Paragraph', 'badge' => 'bg-[var(--color-forest)]/10',  'text'  => 'text-[var(--color-forest)]'],
                                    'image'     => ['label' => 'Image',     'badge' => 'bg-[var(--color-orange)]/10',  'text'  => 'text-[var(--color-orange)]'],
                                    'heading'   => ['label' => 'Heading',   'badge' => 'bg-[var(--color-blue)]/10',    'text'  => 'text-[var(--color-blue)]'],
                                    'quote'     => ['label' => 'Quote',     'badge' => 'bg-[var(--color-purple)]/10',  'text'  => 'text-[var(--color-purple)]'],
                                ];
                                $typeIcons = [
                                    'paragraph' => '<path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round"/>',
                                    'image'     => '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-5-5L5 21" stroke-linecap="round" stroke-linejoin="round"/>',
                                    'heading'   => '<path d="M4 12h16M12 4v16" stroke-linecap="round"/>',
                                    'quote'     => '<path d="M7 7h4v6H7zM13 7h4v6h-4z" stroke-linejoin="round"/>',
                                ];
                                $sections = [
                                    ['type' => 'paragraph', 'body' => "The alarm cuts through the darkness at 4:30 AM. Nothing about this morning feels ordinary. We've been on the wall for nineteen days, and the granite has begun to feel less like rock and more like a partner in conversation — patient, unyielding, indifferent to our trembling fingertips and the long road still above us."],
                                    ['type' => 'paragraph', 'body' => "Day 19. The final push. Pitch 32 looms above us — the dyno, the move that has ended more attempts on this wall than every other obstacle combined. Five-hundred feet below: the meadow where we started. Two-thousand feet below that: the ground we left behind on Day 1, when this still felt like a question rather than an answer."],
                                    ['type' => 'paragraph', 'body' => "This is the Dawn Wall — El Capitan's southeast face, named for the way first light paints it gold while the rest of Yosemite still sleeps. Three thousand feet of granite that has humbled the world's strongest climbers for half a century."],

                                    ['type' => 'heading',   'body' => 'The Preparation'],
                                    ['type' => 'paragraph', 'body' => "You don't wake up one morning and decide to climb the Dawn Wall. The route exists in a language only a handful of people on earth speak fluently — pitches measured in microscopic crystals, holds smaller than a pencil eraser, sequences that demand muscle memory built over months of failed attempts."],
                                    ['type' => 'paragraph', 'body' => "The training regimen was obsessive. Hangboard sessions every other day for two years. Weighted pull-ups in our kitchen at midnight. Endless laps on the Cookie Cliff and Pat and Jack practicing fall after fall after fall — because the Dawn Wall doesn't reward people who fear falling. It rewards people who have made peace with it."],
                                    ['type' => 'image',     'preview' => 'https://images.unsplash.com/photo-1522163182402-834f871fd851?auto=format&fit=crop&w=1400&q=70', 'caption' => 'The Dawn Wall demands absolute precision — every hand placement calculated, every shift in weight a question of survival.'],

                                    ['type' => 'heading',   'body' => 'The Ascent'],
                                    ['type' => 'paragraph', 'body' => "Each pitch is a puzzle written in stone. Pitch 14 — a sustained 5.14 traverse where the holds are so small that chalk barely sticks — took us three days to complete. Three days hanging in our portaledges, eating cold ramen and studying the face like cartographers mapping a country no one has ever named."],
                                    ['type' => 'paragraph', 'body' => "But Pitch 15 — my personal demon — was worse. A blank slab of granite where the only feature is a half-inch crystalline edge that has to be loaded with your full weight while you stand on a smear of nothing. I fell on it eleven times. On the twelfth, I didn't."],
                                    ['type' => 'quote',     'body' => "“On the wall, time collapses. Days blur into a single long present tense. The only thing that matters is the next move, and the next, and the next.”"],
                                    ['type' => 'paragraph', 'body' => "The weather window was narrowing. January in Yosemite is a season of margins — clear cold mornings followed by storms that can pin you to the wall for days. We had maybe seventy-two hours before the next system arrived. Pitch 32 wasn't going to wait."],

                                    ['type' => 'heading',   'body' => 'The Final Pitch'],
                                    ['type' => 'paragraph', 'body' => "Dawn breaks on Day 19. The Traverse — Pitch 32 — glows pale gold in the early light. I have rehearsed this sequence a thousand times in my head. The first undercling. The drop-knee. The dynamic move to the sloper. The mantel. The exit."],
                                    ['type' => 'paragraph', 'body' => "I tie in. Kevin feeds rope. The first hold is a razor-thin crimp barely wider than a credit card edge. I weight it. I move."],
                                    ['type' => 'paragraph', 'body' => "Seventy-five feet out. Halfway. My left foot smears against a polished slab. My right hand floats out toward the dyno. I don't think. I jump."],
                                    ['type' => 'paragraph', 'body' => "And then, somehow, impossibly, the finishing holds are in my fingers and I'm pulling onto the ledge and Kevin is screaming from forty feet below and the granite, after nineteen days, lets us go."],

                                    ['type' => 'heading',   'body' => 'What the Wall Teaches'],
                                    ['type' => 'paragraph', 'body' => "The Dawn Wall taught me that limits are more flexible than they appear from the ground. That fear is information, not a verdict. That the difference between a climber and a person who has tried climbing is mostly how many times you have been willing to fall."],
                                    ['type' => 'paragraph', 'body' => "But mostly, it taught me that the summit isn't really the point. The point is the eighteen days that came before it. The point is the language of granite and rope and trust that you only learn by living inside it long enough for the world below to feel like a rumor."],
                                    ['type' => 'paragraph', 'body' => "That's what El Capitan does. It doesn't care about your résumé, your training cycle, or your sponsorship deal. It only cares whether you can return to the wall tomorrow with the same patience you brought today. And if you can, eventually, it lets you up."],
                                ];
                            @endphp
                            @foreach ($sections as $i => $s)
                                <article
                                    data-article-editor-section
                                    data-section-type="{{ $s['type'] }}"
                                    class="overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_8px_0_rgba(0,0,0,0.04)]"
                                >
                                    <header class="flex items-center justify-between border-b border-black/5 bg-[var(--color-offwhite)] px-5 py-3">
                                        <div class="flex items-center gap-2">
                                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-[10px] {{ $sectionMeta[$s['type']]['badge'] }}">
                                                <svg class="h-3.5 w-3.5 {{ $sectionMeta[$s['type']]['text'] }}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                    {!! $typeIcons[$s['type']] !!}
                                                </svg>
                                            </span>
                                            <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60">{{ $sectionMeta[$s['type']]['label'] }}</span>
                                        </div>
                                        <div class="flex items-center gap-1">
                                            <button type="button" aria-label="Move section up" data-article-editor-section-up class="inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 {{ $i === 0 ? 'opacity-30 pointer-events-none' : '' }}">
                                                <svg class="h-[15px] w-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </button>
                                            <button type="button" aria-label="Move section down" data-article-editor-section-down class="inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 {{ $i === count($sections) - 1 ? 'opacity-30 pointer-events-none' : '' }}">
                                                <svg class="h-[15px] w-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            </button>
                                            <button type="button" aria-label="Remove section" data-article-editor-section-remove class="ml-1 inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-rose-50 hover:text-rose-600">
                                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
                                            </button>
                                        </div>
                                    </header>

                                    <div data-article-editor-section-body class="px-6 py-5">
                                        @if ($s['type'] === 'paragraph')
                                            <div contenteditable="true" data-article-editor-section-content class="min-h-[120px] text-[16px] font-normal leading-[28px] text-[var(--color-charcoal)] outline-none" data-placeholder="Write your paragraph here…">{{ $s['body'] }}</div>
                                        @elseif ($s['type'] === 'heading')
                                            <input type="text" value="{{ $s['body'] }}" data-article-editor-section-content placeholder="Section heading…" class="w-full bg-transparent text-[22px] font-bold leading-normal text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/25" />
                                        @elseif ($s['type'] === 'image')
                                            <div data-article-editor-section-image class="mb-3 flex h-[180px] w-full flex-col items-center justify-center gap-2 rounded-[14px] border-2 border-dashed border-black/10 bg-[var(--color-offwhite)]">
                                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-[14px] bg-[var(--color-orange)]/10 text-[var(--color-orange)]">
                                                    <svg class="h-[22px] w-[22px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                                </span>
                                                <span class="text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/50">Click to upload image</span>
                                                <span class="text-[12px] font-normal leading-[18px] text-[var(--color-charcoal)]/30">PNG, JPG, WEBP</span>
                                                <input type="file" accept="image/*" class="sr-only" data-article-editor-section-image-input />
                                            </div>
                                            @if (!empty($s['preview']))
                                                <img src="{{ $s['preview'] }}" alt="" class="mb-3 aspect-[2/1] w-full rounded-xl object-cover" />
                                            @endif
                                            <input type="text" value="{{ $s['caption'] ?? '' }}" placeholder="Add a caption (optional)…" data-article-editor-section-image-caption class="block w-full rounded-[14px] bg-[var(--color-offwhite)] px-4 py-2.5 text-[14px] font-normal text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/25" />
                                        @elseif ($s['type'] === 'quote')
                                            <div class="border-l-4 border-[#c27aff] py-1 pl-5 text-[17px] italic leading-[28.05px] text-[var(--color-charcoal)]">
                                                <div contenteditable="true" data-article-editor-section-content class="outline-none" data-placeholder="Write your quote here…">{{ $s['body'] }}</div>
                                            </div>
                                        @endif
                                    </div>
                                </article>
                            @endforeach
                        @endif
                    </div>

                    <div class="mt-8 flex items-center gap-3 pb-2 pt-8">
                        <div class="h-px flex-1 bg-black/5"></div>
                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                data-article-editor-add="paragraph"
                                class="inline-flex items-center gap-2 rounded-[14px] border border-black/8 bg-white px-[17px] py-[9px] text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70 shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)] transition hover:border-black/15 hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round"/>
                                </svg>
                                Add Paragraph
                            </button>
                            <button
                                type="button"
                                data-article-editor-add="image"
                                class="inline-flex items-center gap-2 rounded-[14px] border border-black/8 bg-white px-[17px] py-[9px] text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70 shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)] transition hover:border-black/15 hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                                    <circle cx="9" cy="9" r="2"/>
                                    <path d="m21 15-5-5L5 21" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Add Image
                            </button>
                            <button
                                type="button"
                                data-article-editor-add="heading"
                                class="inline-flex items-center gap-2 rounded-[14px] border border-black/8 bg-white px-[17px] py-[9px] text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70 shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)] transition hover:border-black/15 hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M4 12h16M12 4v16" stroke-linecap="round"/>
                                </svg>
                                Add Heading
                            </button>
                            <button
                                type="button"
                                data-article-editor-add="quote"
                                class="inline-flex items-center gap-2 rounded-[14px] border border-black/8 bg-white px-[17px] py-[9px] text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70 shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)] transition hover:border-black/15 hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <path d="M7 7h4v6H7zM13 7h4v6h-4z" stroke-linejoin="round"/>
                                </svg>
                                Add Quote
                            </button>
                        </div>
                        <div class="h-px flex-1 bg-black/5"></div>
                    </div>

                    {{-- Bottom save bar — Figma 92:258: 40px top padding,
                         1px top border + 33px inner top padding, right-aligned
                         forest button with 17px save icon + Save Changes label. --}}
                    <div
                        data-article-editor-save-bar
                        class="mt-10 flex items-start justify-end border-t border-[#ebe3d4] pt-[48px]"
                    >
                        <button
                            type="button"
                            data-article-editor-save-changes
                            class="inline-flex items-center gap-2 rounded-[14px] bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white transition hover:bg-[var(--color-forest-deep)]"
                        >
                            <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M5 13l4 4L19 7"/>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
