<div
    id="product-specs-modal"
    data-product-specs-modal
    role="dialog"
    aria-modal="true"
    aria-labelledby="product-specs-modal-title"
    aria-hidden="true"
    class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/40 p-4 sm:p-6"
>
    <div class="absolute inset-0" data-modal-backdrop></div>

    <div
        class="relative flex max-h-[calc(100vh-2rem)] w-full max-w-4xl flex-col overflow-hidden rounded-2xl bg-white shadow-[0_25px_25px_0_rgba(0,0,0,0.25)] sm:max-h-[calc(100vh-3rem)]"
    >
        {{-- Header: icon badge + title (left) + step indicator (center) + close (right). --}}
        <header class="flex shrink-0 items-center justify-between border-b border-black/5 px-8 pt-6 pb-[25px]">
            <div class="flex items-center gap-3">
                <span class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" stroke-linejoin="round"/>
                        <path d="M3.27 6.96 12 12.01l8.73-5.05M12 22.08V12" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
                <h2 id="product-specs-modal-title" class="font-display text-[22px] font-bold leading-[33px] tracking-[-0.025em] text-[var(--color-charcoal)]">
                    Product Specifications
                </h2>
            </div>

            <div class="flex items-center gap-4">
                {{-- Step indicator: 1 Details (inactive) → 2 Specifications (active). --}}
                <div
                    data-product-specs-step-indicator
                    class="flex items-center gap-3"
                    role="list"
                    aria-label="Form progress"
                >
                    <div class="flex items-center gap-1.5" role="listitem">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--color-offwhite)] text-[12px] font-bold leading-[18px] text-[var(--color-charcoal)]/40">1</span>
                        <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/40">Details</span>
                    </div>
                    <span class="block h-px w-8 bg-[var(--color-forest)]" aria-hidden="true"></span>
                    <div class="flex items-center gap-1.5" role="listitem" aria-current="step">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--color-forest)] text-[12px] font-bold leading-[18px] text-white">2</span>
                        <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]">Specifications</span>
                    </div>
                </div>

                <div class="pl-2">
                    <button
                        type="button"
                        data-modal-close
                        aria-label="Close dialog"
                        class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-[var(--color-offwhite)] text-[var(--color-charcoal)]/70 transition hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                    >
                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M6 6l12 12M18 6 6 18" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        {{-- Body: scrollable spec rows + add button at the bottom. No left rail. --}}
        <div class="flex min-h-0 flex-1 flex-col">
            <form
                data-product-specs-form
                class="flex min-h-0 flex-1 flex-col"
                onsubmit="event.preventDefault();"
            >
                <div class="flex-1 overflow-y-auto px-6 pt-6 pb-2">
                    <div class="mb-4 flex items-baseline justify-between gap-4">
                        <div>
                            <h3 class="font-display text-[18px] font-bold leading-[27px] tracking-[-0.025em] text-[var(--color-charcoal)]">Specifications</h3>
                            <p class="mt-1 text-[13px] leading-[19.5px] text-[var(--color-charcoal)]/50">List the technical details that shoppers compare when choosing this product.</p>
                        </div>
                        <span data-product-specs-count class="shrink-0 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/40">0 rows</span>
                    </div>

                    <div data-product-specs-list class="space-y-3">
                        {{-- Rows are injected by JS. No pre-rendered rows in the partial so JS owns the lifecycle. --}}
                    </div>

                    {{-- Add Specification: full-width dashed pill that spans the row track. --}}
                    <div class="pt-3">
                        <button
                            type="button"
                            data-product-specs-add
                            class="flex w-full items-center justify-center gap-2 rounded-2xl border-2 border-dashed border-black/10 bg-transparent px-6 py-3 text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/60 transition hover:border-black/20 hover:bg-black/[0.02] hover:text-[var(--color-charcoal)]/80"
                        >
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                            </svg>
                            Add Specification
                        </button>
                    </div>
                </div>

                {{-- Footer: Back to Details (left) + spacer + Save Changes (right). --}}
                <footer class="flex shrink-0 items-start gap-3 border-t border-black/5 px-6 pt-[25px] pb-6">
                    <button
                        type="button"
                        data-product-specs-back
                        class="inline-flex items-center gap-2 rounded-2xl border border-black/10 px-5 py-3 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]/70 transition hover:border-black/20 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M19 12H5M12 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Back to Details
                    </button>
                    <span class="flex-1" aria-hidden="true"></span>
                    <button
                        type="submit"
                        data-product-specs-save
                        class="inline-flex items-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white transition hover:bg-[var(--color-forest-deep)]"
                    >
                        <svg class="h-[17px] w-[17px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                        Save Changes
                    </button>
                </footer>
            </form>
        </div>
    </div>
</div>
