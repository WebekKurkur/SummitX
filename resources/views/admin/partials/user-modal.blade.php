<div
    id="user-modal"
    data-user-modal
    role="dialog"
    aria-modal="true"
    aria-labelledby="user-modal-title"
    aria-hidden="true"
    class="fixed inset-0 z-50 hidden items-center justify-center overflow-y-auto bg-black/40 p-4 sm:p-6"
>
    <div class="absolute inset-0" data-modal-backdrop></div>

    <div
        class="relative flex max-h-[calc(100vh-2rem)] w-full max-w-xl flex-col overflow-hidden rounded-2xl bg-white shadow-[0_25px_50px_-12px_rgba(0,0,0,0.25)] sm:max-h-[calc(100vh-3rem)]"
    >
        <header class="flex shrink-0 items-center justify-between border-b border-black/5 px-8 pb-8 pt-8">
            <div class="flex items-center gap-3">
                <h2 id="user-modal-title" class="font-display text-[22px] font-bold leading-[33px] tracking-[-0.025em] text-[var(--color-charcoal)]">
                    New User
                </h2>
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
            data-user-form
            class="flex min-h-0 flex-1 flex-col"
            onsubmit="event.preventDefault();"
        >
            <div class="flex-1 space-y-6 overflow-y-auto p-8">
                <div>
                    <label for="user-name" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                        Full Name <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                    </label>
                    <input
                        id="user-name"
                        name="name"
                        type="text"
                        required
                        placeholder="e.g. Sarah Mitchell"
                        class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                    >
                </div>

                <div>
                    <label for="user-email" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                        Email Address <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                    </label>
                    <input
                        id="user-email"
                        name="email"
                        type="email"
                        required
                        placeholder="user@example.com"
                        class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                    >
                </div>

                <div>
                    <span class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">
                        Role <span aria-hidden="true" class="text-[var(--color-orange)]">*</span>
                    </span>
                    <div role="radiogroup" aria-label="User role" class="grid grid-cols-3 gap-2">
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center rounded-2xl bg-[var(--color-charcoal)] text-[14px] font-semibold leading-[21px] capitalize text-white transition has-[:not(:checked)]:bg-[var(--color-offwhite)] has-[:not(:checked)]:text-[var(--color-charcoal)]/70 has-[:not(:checked)]:hover:bg-black/5">
                            <input type="radio" name="role" value="customer" class="sr-only" checked>
                            Customer
                        </label>
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center rounded-2xl bg-[var(--color-offwhite)] text-[14px] font-semibold leading-[21px] capitalize text-[var(--color-charcoal)]/70 transition has-[:checked]:bg-[var(--color-charcoal)] has-[:checked]:text-white hover:bg-black/5">
                            <input type="radio" name="role" value="moderator" class="sr-only">
                            Moderator
                        </label>
                        <label class="inline-flex h-[46.5px] cursor-pointer items-center justify-center rounded-2xl bg-[var(--color-offwhite)] text-[14px] font-semibold leading-[21px] capitalize text-[var(--color-charcoal)]/70 transition has-[:checked]:bg-[var(--color-charcoal)] has-[:checked]:text-white hover:bg-black/5">
                            <input type="radio" name="role" value="admin" class="sr-only">
                            Admin
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div>
                        <label for="user-phone" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Phone</label>
                        <input
                            id="user-phone"
                            name="phone"
                            type="tel"
                            inputmode="tel"
                            placeholder="+1 (555) 000-0000"
                            class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                        >
                    </div>
                    <div>
                        <label for="user-location" class="mb-2 block text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/70">Location</label>
                        <input
                            id="user-location"
                            name="location"
                            type="text"
                            placeholder="City, State"
                            class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                        >
                    </div>
                </div>
            </div>

            <footer class="flex shrink-0 gap-3 border-t border-black/5 px-8 py-8">
                <button
                    type="button"
                    data-modal-close
                    class="flex-1 rounded-2xl border border-black/10 px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]/70 transition hover:border-black/20 hover:bg-black/5 hover:text-[var(--color-charcoal)]"
                >
                    Cancel
                </button>
                <button
                    type="submit"
                    data-user-submit
                    class="flex-1 rounded-2xl bg-[var(--color-forest)] px-6 py-3 text-[15px] font-semibold leading-[22.5px] text-white shadow-[0_10px_15px_-4px_rgba(31,58,46,0.2),0_4px_3px_rgba(31,58,46,0.2)] transition hover:bg-[var(--color-forest-deep)]"
                >
                    Create User
                </button>
            </footer>
        </form>
    </div>
</div>
