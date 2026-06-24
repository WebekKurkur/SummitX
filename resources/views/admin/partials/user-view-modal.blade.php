<div
    id="user-view-modal"
    data-user-view-modal
    role="dialog"
    aria-modal="true"
    aria-labelledby="user-view-modal-title"
    aria-hidden="true"
    class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/40 p-4 sm:p-6"
>
    <div class="absolute inset-0" data-modal-backdrop></div>

    <div
        class="relative flex max-h-[calc(100vh-2rem)] w-full max-w-lg flex-col overflow-hidden rounded-2xl bg-white shadow-[0_25px_25px_0_rgba(0,0,0,0.25)] sm:max-h-[calc(100vh-3rem)]"
    >
        <header class="flex shrink-0 items-center justify-between border-b border-black/5 px-8 pb-8 pt-8">
            <h2 id="user-view-modal-title" class="font-display text-[20px] font-bold leading-[30px] tracking-[-0.5px] text-[var(--color-charcoal)]">
                User Profile
            </h2>
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

        <div class="flex min-h-0 flex-1 flex-col">
            <div class="flex-1 space-y-8 overflow-y-auto p-8">
                <div class="flex items-center gap-4 border-b border-black/5 pb-8">
                    <span
                        data-user-view-initials
                        class="inline-flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-[var(--color-forest)]/10 text-[20px] font-bold leading-[30px] text-[var(--color-forest)]"
                    >
                        —
                    </span>
                    <div>
                        <p class="text-[18px] font-bold leading-[27px] text-[var(--color-charcoal)]" data-user-view-name>—</p>
                        <div class="mt-1 flex flex-wrap items-center gap-3">
                            <p class="text-[14px] font-normal leading-[21px] text-[var(--color-charcoal)]/60" data-user-view-email>—</p>
                            <span
                                data-user-view-role
                                class="inline-flex h-[27.5px] items-center rounded-[10px] bg-[var(--color-forest)]/10 px-3 text-[13px] font-semibold leading-[19.5px] text-[var(--color-forest)]"
                            >
                                —
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-[14px] bg-[var(--color-offwhite)] p-4">
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">TOTAL ORDERS</p>
                        <p class="mt-1 text-[24px] font-bold leading-[36px] text-[var(--color-charcoal)]" data-user-view-orders>—</p>
                    </div>
                    <div class="rounded-[14px] bg-[var(--color-offwhite)] p-4">
                        <p class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">TOTAL SPENT</p>
                        <p class="mt-1 text-[24px] font-bold leading-[36px] text-[var(--color-charcoal)]" data-user-view-spent>—</p>
                    </div>
                </div>

                <dl class="space-y-4">
                    <div class="flex items-center gap-3">
                        <dt class="w-20 shrink-0 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">PHONE</dt>
                        <dd class="text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-user-view-phone>—</dd>
                    </div>
                    <div class="flex items-center gap-3 pt-4">
                        <dt class="w-20 shrink-0 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">LOCATION</dt>
                        <dd class="text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-user-view-location>—</dd>
                    </div>
                    <div class="flex items-center gap-3 pt-4">
                        <dt class="w-20 shrink-0 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">JOINED</dt>
                        <dd class="text-[15px] font-normal leading-[22.5px] text-[var(--color-charcoal)]" data-user-view-joined>—</dd>
                    </div>
                </dl>
            </div>

            <footer class="flex shrink-0 border-t border-black/5 px-8 py-8">
                <button
                    type="button"
                    data-user-view-edit
                    class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
                >
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                        <path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Edit User
                </button>
            </footer>
        </div>
    </div>
</div>
