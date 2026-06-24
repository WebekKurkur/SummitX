{{--
    Generic delete-confirm dialog — Figma 98:741.
    448px modal, 56×56 rose-bg icon container with trash icon,
    "Delete {Type}?" heading, body with bolded item name, Cancel + Delete buttons.
    Opened via openConfirm({ title, name, type, onConfirm }) from initConfirmDialog().
    Included once in the admin layout, so always present in the DOM.
--}}
<div
    data-confirm-dialog
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 p-4"
    role="dialog"
    aria-modal="true"
    aria-labelledby="confirm-dialog-title"
>
    <div
        data-confirm-dialog-card
        class="w-full max-w-[448px] rounded-2xl bg-white p-8 shadow-[0_25px_25px_rgba(0,0,0,0.25)]"
    >
        <div class="flex justify-center">
            <div
                class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#fef2f2]"
                aria-hidden="true"
            >
                <svg
                    class="h-6 w-6 text-[#fb2c36]"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.8"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M6 6l12 12M18 6 6 18"/>
                </svg>
            </div>
        </div>

        <h2
            id="confirm-dialog-title"
            data-confirm-dialog-title
            class="mt-6 text-center font-display text-[20px] font-bold leading-[30px] text-[var(--color-charcoal)]"
        >
            Delete?
        </h2>

        <p
            data-confirm-dialog-body
            class="mt-2 text-center text-[15px] leading-[22.5px] text-[var(--color-charcoal)]/60"
        >
            This item will be permanently removed.
        </p>

        <div class="mt-8 flex gap-3">
            <button
                type="button"
                data-confirm-dialog-cancel
                class="flex-1 rounded-[14px] border border-[var(--color-charcoal)]/10 py-3 text-[15px] font-semibold leading-[22.5px] text-[var(--color-charcoal)]/70 transition hover:bg-black/[0.02]"
            >
                Cancel
            </button>
            <button
                type="button"
                data-confirm-dialog-confirm
                class="flex-1 rounded-[14px] bg-[#fb2c36] py-3 text-[15px] font-semibold leading-[22.5px] text-white transition hover:bg-[#e0242e]"
            >
                Delete
            </button>
        </div>
    </div>
</div>
