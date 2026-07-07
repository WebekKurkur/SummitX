@php
    /** @var array $items */
    /** @var array $iconPaths */
    /** @var string $active */
@endphp
<nav aria-label="Admin navigation" class="flex-1 px-6">
    <ul class="flex flex-col gap-1">
        @foreach ($items as $item)
            @php $isActive = $item['route'] === $active; @endphp
            <li>
                <a
                    href="{{ $item['href'] }}"
                    @if ($isActive) aria-current="page" @endif
                    class="
                        flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                        @if ($isActive)
                            bg-[var(--color-charcoal)] text-white
                        @else
                            text-[var(--color-charcoal)]/70 hover:bg-black/5 hover:text-[var(--color-charcoal)]
                        @endif
                    "
                >
                    <svg class="h-5 w-5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        {!! $iconPaths[$item['icon']] !!}
                    </svg>
                    {{ $item['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
