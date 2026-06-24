<div
    id="transaction-modal"
    data-transaction-modal
    role="dialog"
    aria-modal="true"
    aria-labelledby="transaction-modal-title"
    aria-hidden="true"
    class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/40 p-4 sm:p-6"
>
    <div class="absolute inset-0" data-modal-backdrop></div>

    <div
        class="relative flex max-h-[calc(100vh-2rem)] w-full max-w-lg flex-col overflow-hidden rounded-2xl bg-white shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] sm:max-h-[calc(100vh-3rem)]"
    >
        <header class="flex shrink-0 items-center justify-between border-b border-black/5 px-8 pb-8 pt-8">
            <div>
                <h2 id="transaction-modal-title" class="font-display text-[20px] font-bold leading-[30px] tracking-[-0.5px] text-[var(--color-charcoal)]" data-transaction-order>
                    SX-2026-0000
                </h2>
                <span
                    data-transaction-status-badge
                    class="mt-1 inline-flex items-center gap-2 rounded-[10px] bg-[var(--color-forest)]/10 px-3 py-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-forest)]"
                >
                    <span aria-hidden="true" class="inline-flex h-3.5 w-3.5 items-center justify-center">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span data-transaction-status-label>Completed</span>
                </span>
            </div>
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
        </header>

        <form
            data-transaction-form
            class="flex min-h-0 flex-1 flex-col"
            onsubmit="event.preventDefault();"
        >
            <div class="flex-1 space-y-6 overflow-y-auto p-8">
                <div class="rounded-2xl bg-[var(--color-offwhite)] p-6">
                    <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">ORDER TOTAL</p>
                    <p class="mt-1 font-display text-[32px] font-bold leading-[48px] text-[var(--color-charcoal)]" data-transaction-total>
                        Rp. 0
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">CUSTOMER</p>
                        <p class="mt-1 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]" data-transaction-customer>—</p>
                        <p class="mt-0.5 text-[13px] font-normal leading-[19.5px] text-[var(--color-charcoal)]/60" data-transaction-email>—</p>
                    </div>
                    <div>
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">PAYMENT</p>
                        <p class="mt-1 text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-transaction-payment>—</p>
                    </div>
                    <div>
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">DATE</p>
                        <p class="mt-1 text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-transaction-date>—</p>
                    </div>
                    <div>
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">ITEMS</p>
                        <p class="mt-1 text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-transaction-items>—</p>
                    </div>
                </div>

                <fieldset>
                    <legend class="text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Update Status</legend>
                    <div role="radiogroup" aria-label="Transaction status" class="mt-3 grid grid-cols-3 gap-2">
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center gap-2 rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60 transition has-[:checked]:border-[var(--color-forest)]/20 has-[:checked]:bg-[var(--color-forest)]/10 has-[:checked]:text-[var(--color-forest)] hover:bg-black/5">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M12 6v6l4 2" stroke-linecap="round"/>
                            </svg>
                            <input type="radio" name="status" value="pending" class="sr-only">
                            Pending
                        </label>
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center gap-2 rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60 transition has-[:checked]:border-[var(--color-forest)]/20 has-[:checked]:bg-[var(--color-forest)]/10 has-[:checked]:text-[var(--color-forest)] hover:bg-black/5">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <input type="radio" name="status" value="completed" class="sr-only" checked>
                            Completed
                        </label>
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center gap-2 rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60 transition has-[:checked]:border-rose-200 has-[:checked]:bg-rose-50 has-[:checked]:text-rose-600 hover:bg-black/5">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M18 6 6 18M6 6l12 12" stroke-linecap="round"/>
                            </svg>
                            <input type="radio" name="status" value="failed" class="sr-only">
                            Failed
                        </label>
                    </div>
                </fieldset>

                <div>
                    <label for="transaction-notes" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Internal Notes</label>
                    <textarea
                        id="transaction-notes"
                        name="notes"
                        rows="4"
                        placeholder="Add internal notes about this transaction..."
                        class="w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 py-3 text-[15px] leading-[22.5px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                    ></textarea>
                </div>
            </div>

            <footer class="flex shrink-0 gap-3 border-t border-black/5 px-8 py-8">
                <button
                    type="button"
                    data-transaction-delete
                    data-confirm-delete
                    data-confirm-type="transaction"
                    data-confirm-name=""
                    data-confirm-on-confirm="handleTransactionDelete"
                    class="inline-flex shrink-0 items-center justify-center gap-2 rounded-2xl border border-rose-200 px-5 py-3 text-[15px] font-semibold leading-[22.5px] text-rose-500 transition hover:bg-rose-50"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Delete
                </button>
                <button
                    type="submit"
                    data-transaction-submit
                    class="flex-1 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
                >
                    Done
                </button>
            </footer>
        </form>
    </div>
</div>
