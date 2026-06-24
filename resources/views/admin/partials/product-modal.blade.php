<div
    id="product-modal"
    data-product-modal
    role="dialog"
    aria-modal="true"
    aria-labelledby="product-modal-title"
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
                <h2 id="product-modal-title" class="font-display text-[22px] font-bold leading-[33px] tracking-[-0.025em] text-[var(--color-charcoal)]">
                    New Product
                </h2>
            </div>

            <div class="flex items-center gap-4">
                {{-- Step indicator: 1 Details (active) → 2 Specifications (inactive). --}}
                <div data-product-step-indicator
                    class="flex items-center gap-3"
                    role="list"
                    aria-label="Form progress"
                >
                    <div class="flex items-center gap-1.5" role="listitem" aria-current="step">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--color-forest)] text-[12px] font-bold leading-[18px] text-white">1</span>
                        <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]">Details</span>
                    </div>
                    <span class="block h-px w-8 bg-black/15" aria-hidden="true"></span>
                    <div class="flex items-center gap-1.5" role="listitem">
                        <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[var(--color-offwhite)] text-[12px] font-bold leading-[18px] text-[var(--color-charcoal)]/40">2</span>
                        <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/40">Specifications</span>
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

        <form
            data-product-form
            class="flex min-h-0 flex-1 flex-col"
            onsubmit="event.preventDefault();"
        >
            <div class="flex min-h-0 flex-1 flex-col sm:flex-row">
                {{-- Left rail: banner upload + catalog thumbs. 288px fixed width. --}}
                <div class="flex shrink-0 flex-col gap-5 overflow-y-auto border-b border-black/5 pl-5 pr-[21px] py-5 sm:w-72 sm:border-b-0 sm:border-r">
                    <div>
                        <span class="text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Banner Image</span>
                        <p class="mt-1 text-[12px] leading-[18px] text-[var(--color-charcoal)]/40">
                            Full-width hero on product page (16:9)
                        </p>
                        <div class="relative pt-2">
                            <input
                                id="product-banner"
                                name="banner"
                                type="file"
                                accept="image/png,image/jpeg,image/webp"
                                class="absolute inset-0 z-10 cursor-pointer opacity-0"
                                data-product-banner-input
                            >
                            <div
                                data-product-banner-empty
                                class="flex aspect-[243/139] w-full flex-col items-center justify-center gap-2 overflow-hidden rounded-[14px] border-2 border-dashed border-black/10 bg-[var(--color-offwhite)]"
                            >
                                <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                                    <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M7 10l5 5 5-5M12 15V3" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <div class="text-center">
                                    <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60">Click to upload</p>
                                    <p class="mt-1 text-[12px] leading-[18px] text-[var(--color-charcoal)]/40">PNG, JPG, WEBP</p>
                                </div>
                            </div>
                            <img
                                data-product-banner-preview
                                src=""
                                alt=""
                                class="hidden w-full rounded-[14px] object-cover"
                            >
                        </div>
                    </div>

                    <div class="border-t border-black/5 pt-[21px]">
                        <span class="text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Catalog Images</span>
                        <p class="mt-1 text-[12px] leading-[18px] text-[var(--color-charcoal)]/40">
                            Product gallery shown on the listing page
                        </p>
                        <div class="pt-2">
                            <div class="relative h-[77px] w-full" data-product-catalog-list>
                                <button
                                    type="button"
                                    data-product-catalog-add
                                    class="absolute left-0 top-0 flex h-[77px] w-[77px] flex-col items-center justify-center gap-1.5 rounded-[14px] border-2 border-dashed border-black/10 bg-[var(--color-offwhite)] p-0.5 text-[var(--color-charcoal)]/50 transition hover:border-black/30 hover:bg-black/5 hover:text-[var(--color-charcoal)]/70"
                                    aria-label="Add catalog image"
                                >
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-[10px] bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                            <path d="M12 5v14M5 12h14" stroke-linecap="round"/>
                                        </svg>
                                    </span>
                                    <span class="text-[11.2px] font-semibold leading-[16.8px]">Add</span>
                                </button>
                            </div>
                            <input
                                type="file"
                                accept="image/png,image/jpeg,image/webp"
                                multiple
                                class="sr-only"
                                data-product-catalog-input
                            >
                        </div>
                    </div>
                </div>

                {{-- Right: form fields. 24px padding, 16px gap between fields. --}}
                <div class="flex min-h-0 flex-1 flex-col">
                    <div class="flex-1 overflow-y-auto p-6">
                        <div>
                            <label for="product-name" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                                Product Name <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                            </label>
                            <input
                                id="product-name"
                                name="name"
                                type="text"
                                required
                                placeholder="e.g. Alpine Summit Pack 65L"
                                class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                            >
                        </div>

                        <div class="grid grid-cols-1 gap-4 pt-4 sm:grid-cols-2">
                            <div>
                                <label for="product-category" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                                    Category <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                                </label>
                                <select
                                    id="product-category"
                                    name="category"
                                    required
                                    class="h-[46.5px] w-full appearance-none rounded-2xl border border-transparent bg-[var(--color-offwhite)] bg-[length:14px_14px] bg-[right_1rem_center] bg-no-repeat px-4 pr-10 text-[15px] text-[var(--color-charcoal)] focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                                    style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2216%22 height=%2216%22 viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231c1c1c%22 stroke-width=%221.6%22 stroke-linecap=%22round%22 stroke-linejoin=%22round%22><polyline points=%226 9 12 15 18 9%22/></svg>')"
                                >
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="Backpacks">Backpacks</option>
                                    <option value="Climbing">Climbing</option>
                                    <option value="Footwear">Footwear</option>
                                    <option value="Camping">Camping</option>
                                    <option value="Apparel">Apparel</option>
                                    <option value="Accessories">Accessories</option>
                                </select>
                            </div>
                            <div>
                                <label for="product-price" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                                    Price (USD) <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                                </label>
                                <input
                                    id="product-price"
                                    name="price"
                                    type="number"
                                    min="0"
                                    step="0.01"
                                    required
                                    inputmode="decimal"
                                    placeholder="0.00"
                                    class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                                >
                            </div>
                        </div>

                        <div class="pt-4">
                            <label for="product-stock" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                                Stock Quantity <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                            </label>
                            <input
                                id="product-stock"
                                name="stock"
                                type="number"
                                min="0"
                                step="1"
                                required
                                inputmode="numeric"
                                placeholder="0"
                                class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                            >
                        </div>

                        <div class="pt-4">
                            <label for="product-description" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Description</label>
                            <textarea
                                id="product-description"
                                name="description"
                                rows="6"
                                placeholder="Brief product description..."
                                class="block h-[142.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 py-3 text-[15px] leading-[22.5px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                            ></textarea>
                        </div>

                        {{-- Info banner: hint about the next step. Forest-tinted. --}}
                        <div class="pt-4">
                            <div
                                data-product-specs-hint
                                class="flex w-full items-center gap-2 rounded-2xl border border-[var(--color-forest)]/10 bg-[var(--color-forest)]/5 p-[13px]"
                                role="status"
                            >
                                <svg class="h-[15px] w-[15px] shrink-0 text-[var(--color-forest)]/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                    <circle cx="12" cy="12" r="10"/>
                                    <path d="M12 16v-4M12 8h.01" stroke-linecap="round"/>
                                </svg>
                                <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-forest)]/80">
                                    <span data-product-specs-hint-count>8</span> specifications added — edit on next step
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Footer: small Cancel (left) + spacer + green Next: Specifications (right). --}}
                    <footer class="flex shrink-0 items-start gap-3 border-t border-black/5 px-6 pt-[25px] pb-6">
                        <button
                            type="button"
                            data-modal-close
                            class="rounded-2xl border border-black/10 px-5 py-3 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]/70 transition hover:border-black/20 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                        >
                            Cancel
                        </button>
                        <span class="flex-1" aria-hidden="true"></span>
                        <button
                            type="submit"
                            data-product-submit
                            class="inline-flex items-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white transition hover:bg-[var(--color-forest-deep)]"
                        >
                            <span data-product-submit-label>Next: Specifications</span>
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M5 12h14M12 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </footer>
                </div>
            </div>
        </form>
    </div>
</div>
