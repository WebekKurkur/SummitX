// SummitX — landing page interactions
// Subtle premium behavior only: scroll reveal + nav blur on scroll + mobile menu.

const ready = (fn) =>
    document.readyState !== 'loading'
        ? fn()
        : document.addEventListener('DOMContentLoaded', fn);

ready(() => {
    initRevealOnScroll();
    initNavScrollState();
    initMobileMenu();
    initReadingProgress();
    initProductGallery();
    initQuantityStepper();
    initOptionRadios();
    initToast();
    initAddToCart();
    initAdminFilter();
    initUserViewModal();
    initUserModal();
    initProductModal();
    initProductSpecsModal();
    initTransactionModal();
    initArticleEditor();
    initConfirmDialog();
});

function initRevealOnScroll() {
    const targets = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window) || targets.length === 0) {
        targets.forEach((el) => el.classList.add('is-visible'));
        return;
    }

    const io = new IntersectionObserver(
        (entries) => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    io.unobserve(entry.target);
                }
            }
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0.05 },
    );

    targets.forEach((el) => io.observe(el));
}

function initNavScrollState() {
    const nav = document.querySelector('[data-site-nav]');
    if (!nav) return;

    const update = () => {
        if (window.scrollY > 24) {
            nav.classList.add('is-scrolled');
        } else {
            nav.classList.remove('is-scrolled');
        }
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
}

function initMobileMenu() {
    const toggle = document.querySelector('[data-mobile-toggle]');
    const menu = document.querySelector('[data-mobile-menu]');
    const nav = document.querySelector('[data-site-nav]');
    if (!toggle || !menu) return;

    const setOpen = (open) => {
        menu.classList.toggle('is-open', open);
        nav?.classList.toggle('is-menu-open', open);
        toggle.setAttribute('aria-expanded', String(open));
        document.documentElement.classList.toggle('overflow-hidden', open);
    };

    toggle.addEventListener('click', () => {
        setOpen(!menu.classList.contains('is-open'));
    });

    menu.querySelectorAll('a').forEach((a) =>
        a.addEventListener('click', () => setOpen(false)),
    );
}

function initReadingProgress() {
    const bar = document.querySelector('[data-reading-progress]');
    if (!bar) return;

    const update = () => {
        const scrolled = window.scrollY;
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const ratio = max > 0 ? Math.min(scrolled / max, 1) : 0;
        bar.style.transform = `scaleX(${ratio})`;
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
}

function initProductGallery() {
    const root = document.querySelector('[data-product-gallery]');
    if (!root) return;

    const mains = root.querySelectorAll('[data-gallery-main]');
    const thumbs = root.querySelectorAll('[data-gallery-thumb]');
    const dots = root.querySelectorAll('[data-gallery-dot]');
    const prev = root.querySelector('[data-gallery-prev]');
    const next = root.querySelector('[data-gallery-next]');
    const total = mains.length;
    if (total === 0) return;

    let current = 0;

    const setActive = (index) => {
        current = (index + total) % total;

        mains.forEach((el, i) => {
            const active = i === current;
            el.classList.toggle('opacity-100', active);
            el.classList.toggle('opacity-0', !active);
            el.classList.toggle('pointer-events-none', !active);
        });

        thumbs.forEach((el, i) => {
            const active = i === current;
            el.classList.toggle('border-[var(--color-charcoal)]', active);
            el.classList.toggle('border-transparent', !active);
            el.classList.toggle('hover:border-black/30', !active);
        });

        dots.forEach((el, i) => {
            const active = i === current;
            el.setAttribute('aria-selected', String(active));
            el.classList.toggle('w-8', active);
            el.classList.toggle('w-2', !active);
            el.classList.toggle('opacity-60', !active);
        });
    };

    thumbs.forEach((el) =>
        el.addEventListener('click', () => setActive(Number(el.dataset.index))),
    );
    dots.forEach((el) =>
        el.addEventListener('click', () => setActive(Number(el.dataset.index))),
    );
    prev?.addEventListener('click', () => setActive(current - 1));
    next?.addEventListener('click', () => setActive(current + 1));
}

function initQuantityStepper() {
    const input = document.querySelector('[data-qty-input]');
    const dec = document.querySelector('[data-qty-decrement]');
    const inc = document.querySelector('[data-qty-increment]');
    if (!input || !dec || !inc) return;

    const clamp = (n) => Math.max(1, Math.min(99, n || 1));

    dec.addEventListener('click', () => {
        input.value = String(clamp(parseInt(input.value, 10) - 1));
    });
    inc.addEventListener('click', () => {
        input.value = String(clamp(parseInt(input.value, 10) + 1));
    });
    input.addEventListener('change', () => {
        input.value = String(clamp(parseInt(input.value, 10)));
    });
}

function initOptionRadios() {
    const groups = document.querySelectorAll('[role="radiogroup"]');
    if (groups.length === 0) return;

    const activeClasses = ['border-[var(--color-charcoal)]', 'bg-[var(--color-charcoal)]', 'text-white'];
    const inactiveClasses = ['border-black/10', 'bg-white', 'text-[var(--color-charcoal)]', 'hover:border-black/30'];

    groups.forEach((group) => {
        const labels = group.querySelectorAll('label');
        labels.forEach((label) => {
            const input = label.querySelector('input[type="radio"]');
            if (!input) return;
            input.addEventListener('change', () => {
                labels.forEach((l) => {
                    const i = l.querySelector('input[type="radio"]');
                    const active = i && i.checked;
                    l.classList.remove(...activeClasses, ...inactiveClasses);
                    l.classList.add(...(active ? activeClasses : inactiveClasses));
                });
            });
        });
    });
}

// Toast: tracks the visible toast and a single auto-dismiss timer.
let toastTimer = null;

function initToast() {
    const toast = document.querySelector('[data-toast]');
    if (!toast) return;

    const close = toast.querySelector('[data-toast-close]');
    close?.addEventListener('click', () => hideToast());
}

function showToast(message) {
    const toast = document.querySelector('[data-toast]');
    if (!toast) return;

    const messageEl = toast.querySelector('[data-toast-message]');
    if (messageEl && message) {
        messageEl.textContent = message;
    }

    toast.classList.add('is-visible');

    if (toastTimer) {
        clearTimeout(toastTimer);
    }
    toastTimer = setTimeout(() => hideToast(), 3500);
}

function hideToast() {
    const toast = document.querySelector('[data-toast]');
    if (!toast) return;
    toast.classList.remove('is-visible');
    if (toastTimer) {
        clearTimeout(toastTimer);
        toastTimer = null;
    }
}

function initConfirmDialog() {
    const dialog = document.querySelector('[data-confirm-dialog]');
    if (!dialog) return;

    const card = dialog.querySelector('[data-confirm-dialog-card]');
    const titleEl = dialog.querySelector('[data-confirm-dialog-title]');
    const bodyEl = dialog.querySelector('[data-confirm-dialog-body]');
    const cancelBtn = dialog.querySelector('[data-confirm-dialog-cancel]');
    const confirmBtn = dialog.querySelector('[data-confirm-dialog-confirm]');
    if (!card || !titleEl || !bodyEl || !cancelBtn || !confirmBtn) return;

    let pending = null;
    let lastFocus = null;

    const open = ({ type, name, onConfirm }) => {
        pending = { onConfirm };
        const label = type ? `${type[0].toUpperCase()}${type.slice(1)}` : 'Item';
        titleEl.textContent = `Delete ${label}?`;
        bodyEl.innerHTML = '';

        const open = document.createElement('span');
        open.className = 'leading-[22.5px] text-[15px]';
        open.textContent = '\u201C';
        const bold = document.createElement('span');
        bold.className = 'font-bold leading-[22.5px] text-[15px] text-[#1c1c1c]';
        bold.textContent = name || 'This item';
        const close = document.createElement('span');
        close.className = 'leading-[22.5px] text-[15px]';
        close.textContent = `\u201D will be permanently removed.`;
        bodyEl.append(open, bold, close);

        lastFocus = document.activeElement;
        dialog.classList.remove('hidden');
        dialog.classList.add('flex');
        document.documentElement.classList.add('overflow-hidden');
        cancelBtn.focus();
    };

    const close = () => {
        dialog.classList.add('hidden');
        dialog.classList.remove('flex');
        document.documentElement.classList.remove('overflow-hidden');
        pending = null;
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    cancelBtn.addEventListener('click', close);
    confirmBtn.addEventListener('click', () => {
        const cb = pending && pending.onConfirm;
        close();
        if (typeof cb === 'function') cb();
    });

    dialog.addEventListener('click', (e) => {
        if (e.target === dialog) close();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !dialog.classList.contains('hidden')) close();
    });

    // Wire up all declarative delete triggers:
    //   [data-confirm-delete]           — table-row button with [data-confirm-name]
    //   [data-confirm-type] + [data-confirm-name] + [data-confirm-on-confirm]
    document.querySelectorAll('[data-confirm-delete], [data-confirm-type]').forEach((btn) => {
        if (btn.__confirmWired) return;
        btn.__confirmWired = true;
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const name = btn.getAttribute('data-confirm-name') || '';
            const type = btn.getAttribute('data-confirm-type') || '';
            const onConfirmExpr = btn.getAttribute('data-confirm-on-confirm');
            let onConfirm = null;
            if (onConfirmExpr && typeof window[onConfirmExpr] === 'function') {
                onConfirm = window[onConfirmExpr];
            } else {
                // Default: remove the table row (or closest [data-confirm-remove])
                onConfirm = () => {
                    const row = btn.closest('[data-confirm-remove]') || btn.closest('tr');
                    if (row) {
                        row.style.transition = 'opacity 150ms ease, transform 150ms ease';
                        row.style.opacity = '0';
                        row.style.transform = 'translateX(-8px)';
                        setTimeout(() => row.remove(), 180);
                    }
                    if (typeof showToast === 'function') {
                        const label = type ? type[0].toUpperCase() + type.slice(1) : 'Item';
                        showToast(`${label} deleted.`);
                    }
                };
            }
            open({ type, name, onConfirm });
        });
    });
}

function initAddToCart() {
    const buttons = document.querySelectorAll('[data-add-to-cart]');
    if (buttons.length === 0) return;

    buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const name = btn.dataset.productName || 'Item';
            showToast(`${name} has been added to your cart.`);
        });
    });
}

// Convert a human-readable date string ("June 10, 2026") to the
// ISO format (<input type="date"> expects YYYY-MM-DD). Returns the
// original string if the input is already ISO-shaped or unparseable.
function toIsoDate(value) {
    if (!value) return '';
    if (/^\d{4}-\d{2}-\d{2}$/.test(value)) return value;
    const d = new Date(value);
    if (Number.isNaN(d.getTime())) return value;
    const yyyy = d.getFullYear();
    const mm = String(d.getMonth() + 1).padStart(2, '0');
    const dd = String(d.getDate()).padStart(2, '0');
    return `${yyyy}-${mm}-${dd}`;
}

// Article editor page: the full-page `/admin/articles/editor` view
// (replaces the previous article modal). Powers:
//   * back button (already an <a>, no JS needed)
//   * status pill toggle (Draft / Published) in the top bar — mirrors
//     into the canvas pill + the row status
//   * title input — mirrors into the canvas H1 + meta line
//   * category select — mirrors into the canvas category line
//   * banner upload (click tile → FileReader.readAsDataURL → preview) +
//     banner clear (restore the dashed tile)
//   * 4 "Add Section" buttons (paragraph / image / heading / quote) —
//     each pushes a new section into the canvas, hides the empty
//     state, increments the section counter (top bar + sidebar stats)
//   * section remove (X) — removes the section, restores the empty
//     state if zero remain
//   * Save / Save Changes — UI-only stub, shows a toast
function initArticleEditor() {
    const page = document.querySelector('[data-article-editor-page]');
    const saveButtons = document.querySelectorAll('[data-article-editor-save], [data-article-editor-save-changes]');
    if (!document.querySelector('[data-article-editor-status-group]')) return;

    const $ = (sel, root = document) => root.querySelector(sel);
    const $$ = (sel, root = document) => [...root.querySelectorAll(sel)];

    // 1) Status toggle.
    const statusGroup = $('[data-article-editor-status-group]');
    const canvasPill = $('[data-article-editor-canvas-pill]');
    const activeStatusClasses = [
        'bg-[var(--color-orange)]',
        'text-white',
        'shadow-[0_1px_1.5px_rgba(0,0,0,0.1),0_1px_1px_rgba(0,0,0,0.1)]',
    ];
    const inactiveStatusClasses = ['text-[var(--color-charcoal)]/50', 'hover:text-[var(--color-charcoal)]'];

    const setStatus = (next) => {
        $$('[data-article-editor-status]', statusGroup).forEach((btn) => {
            const isActive = btn.dataset.articleEditorStatus === next;
            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
            btn.className = [
                'inline-flex',
                'h-[36px]',
                'items-center',
                'rounded-[10px]',
                'px-5',
                'text-[13px]',
                'font-semibold',
                'capitalize',
                'leading-[19.5px]',
                'transition',
                ...(isActive
                    ? activeStatusClasses
                    : inactiveStatusClasses),
            ].join(' ');
        });
        if (canvasPill) {
            canvasPill.textContent = next.charAt(0).toUpperCase() + next.slice(1);
            canvasPill.className =
                'inline-flex h-[26px] items-center rounded-[10px] px-3 text-[12px] font-bold uppercase leading-[18px] tracking-[0.5px] text-white ' +
                (next === 'published' ? 'bg-[var(--color-forest)]' : 'bg-[var(--color-orange)]');
        }
    };

    $$('[data-article-editor-status]', statusGroup).forEach((btn) => {
        btn.addEventListener('click', () => setStatus(btn.dataset.articleEditorStatus));
    });

    // 2) Title input mirror.
    const titleInput = $('[data-article-editor-title]');
    const canvasTitle = $('[data-article-editor-canvas-title]');
    titleInput?.addEventListener('input', () => {
        const v = titleInput.value.trim() || 'Untitled Article';
        if (canvasTitle) canvasTitle.textContent = v;
    });

    // 3) Category mirror.
    const categorySelect = $('[data-article-editor-category-select]');
    const canvasCategory = $('[data-article-editor-canvas-category]');
    const metaCategory = $('[data-article-editor-category]');
    categorySelect?.addEventListener('change', () => {
        const v = categorySelect.value || 'Uncategorized';
        if (canvasCategory) canvasCategory.textContent = v;
        if (metaCategory) metaCategory.textContent = v;
    });

    // 4) Banner upload + clear.
    const banner = $('[data-article-editor-banner]');
    const bannerInput = $('[data-article-editor-banner-input]');
    bannerInput?.addEventListener('change', (e) => {
        const file = e.target.files?.[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (ev) => {
            const url = ev.target.result;
            banner.innerHTML = `
                <img src="${url}" alt="" class="absolute inset-0 h-full w-full object-cover"/>
                <button type="button" data-article-editor-banner-clear aria-label="Remove banner"
                    class="absolute right-2 top-2 inline-flex h-8 w-8 items-center justify-center rounded-full bg-black/60 text-white transition hover:bg-black/80">
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                        <path d="M6 6l12 12M18 6 6 18" stroke-linecap="round"/>
                    </svg>
                </button>
            `;
            banner.classList.remove('border-dashed');
            banner.classList.add('border-solid', 'border-black/5');
            wireClear();
        };
        reader.readAsDataURL(file);
    });

    const wireClear = () => {
        const clear = $('[data-article-editor-banner-clear]', banner);
        clear?.addEventListener('click', (ev) => {
            ev.preventDefault();
            banner.classList.add('border-dashed');
            banner.classList.remove('border-solid', 'border-black/5');
            banner.innerHTML = `
                <label for="article-editor-banner-input"
                    class="absolute inset-[2px] flex cursor-pointer flex-col items-center justify-center gap-2 rounded-[12px] bg-[var(--color-offwhite)]">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-[14px] bg-[var(--color-forest)]/10 text-[var(--color-forest)]">
                        <svg class="h-[18px] w-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/50">Click to upload</span>
                </label>
                <input type="file" id="article-editor-banner-input" accept="image/*" data-article-editor-banner-input class="sr-only"/>
            `;
            // re-wire the new file input
            banner.querySelector('[data-article-editor-banner-input]')?.addEventListener('change', bannerInput._handler || (bannerInput._handler = null));
            // simplest: rebind via re-running the upload listener on the new input
            const newInput = banner.querySelector('[data-article-editor-banner-input]');
            newInput?.addEventListener('change', (e) => bannerInput.dispatchEvent(new Event('change')) || bannerInput._handler?.(e));
        });
    };
    wireClear();

    // 5) Section add / remove / reorder.
    // The counter (`<span>` in the top-bar meta) and the list container
    // share the same kind of data-attr pattern. We keep the container
    // on a distinct selector so `querySelector` doesn't accidentally
    // grab the counter (which is a `<span>`, not a block container).
    const sectionsContainer = $('[data-article-editor-sections-list]');
    const emptyState = $('[data-article-editor-empty]');
    const sectionCounters = $$('[data-article-editor-sections], [data-article-editor-stats-sections]');

    // Per-type color tokens (must match the section-meta partial + the
    // Figma spec). Each section gets a 24px rounded badge in the offwhite
    // header bar; the badge's tint identifies the section type at a glance.
    const TYPE_META = {
        paragraph: { label: 'Paragraph', badge: 'bg-[var(--color-forest)]/10',  text: 'text-[var(--color-forest)]',  icon: '<path d="M4 6h16M4 12h16M4 18h10" stroke-linecap="round"/>' },
        image:     { label: 'Image',     badge: 'bg-[var(--color-orange)]/10',  text: 'text-[var(--color-orange)]',  icon: '<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-5-5L5 21" stroke-linecap="round" stroke-linejoin="round"/>' },
        heading:   { label: 'Heading',   badge: 'bg-[var(--color-blue)]/10',    text: 'text-[var(--color-blue)]',    icon: '<path d="M4 12h16M12 4v16" stroke-linecap="round"/>' },
        quote:     { label: 'Quote',     badge: 'bg-[var(--color-purple)]/10',  text: 'text-[var(--color-purple)]',  icon: '<path d="M7 7h4v6H7zM13 7h4v6h-4z" stroke-linejoin="round"/>' },
    };

    const BODY = {
        paragraph: () => `
            <div contenteditable="true" data-article-editor-section-content
                 class="min-h-[120px] text-[16px] font-normal leading-[28px] text-[var(--color-charcoal)] outline-none empty:before:content-[attr(data-placeholder)] empty:before:text-[var(--color-charcoal)]/25"
                 data-placeholder="Write your paragraph here…"></div>
        `,
        heading: () => `
            <input type="text" data-article-editor-section-content placeholder="Section heading…"
                   class="w-full bg-transparent text-[22px] font-bold leading-normal text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/25" />
        `,
        image: () => `
            <div data-article-editor-section-image class="mb-3 flex h-[180px] w-full flex-col items-center justify-center gap-2 rounded-[14px] border-2 border-dashed border-black/10 bg-[var(--color-offwhite)]">
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-[14px] bg-[var(--color-orange)]/10 text-[var(--color-orange)]">
                    <svg class="h-[22px] w-[22px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4M17 8l-5-5-5 5M12 3v12" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="text-[14px] font-semibold leading-[21px] text-[var(--color-charcoal)]/50">Click to upload image</span>
                <span class="text-[12px] font-normal leading-[18px] text-[var(--color-charcoal)]/30">PNG, JPG, WEBP</span>
                <input type="file" accept="image/*" class="sr-only" data-article-editor-section-image-input />
            </div>
            <input type="text" placeholder="Add a caption (optional)…" data-article-editor-section-image-caption
                   class="block w-full rounded-[14px] bg-[var(--color-offwhite)] px-4 py-2.5 text-[14px] font-normal text-[var(--color-charcoal)] outline-none placeholder:text-[var(--color-charcoal)]/25" />
        `,
        quote: () => `
            <div class="border-l-4 border-[#c27aff] py-1 pl-5 text-[17px] italic leading-[28.05px] text-[var(--color-charcoal)]">
                <div contenteditable="true" data-article-editor-section-content
                     class="outline-none empty:before:content-[attr(data-placeholder)] empty:before:text-[var(--color-charcoal)]/25"
                     data-placeholder="Write your quote here…"></div>
            </div>
        `,
    };

    // Edge-state helper: the up arrow on the first section and the down
    // arrow on the last section are dimmed (opacity-30 + pointer-events-none)
    // per Figma. Re-run after every add/remove/move.
    const refreshEdges = () => {
        const all = $$('[data-article-editor-section]', sectionsContainer);
        all.forEach((el, i) => {
            const up = el.querySelector('[data-article-editor-section-up]');
            const down = el.querySelector('[data-article-editor-section-down]');
            if (up) {
                up.classList.toggle('opacity-30', i === 0);
                up.classList.toggle('pointer-events-none', i === 0);
            }
            if (down) {
                down.classList.toggle('opacity-30', i === all.length - 1);
                down.classList.toggle('pointer-events-none', i === all.length - 1);
            }
        });
    };

    const refreshCount = () => {
        const n = $$('[data-article-editor-section]', sectionsContainer).length;
        $$('[data-article-editor-stats-sections]').forEach((el) => { el.textContent = String(n); });
        const meta = $('[data-article-editor-sections]'); // top-bar counter
        if (meta) meta.textContent = String(n);
        if (emptyState) emptyState.classList.toggle('hidden', n > 0);
        if (sectionsContainer) sectionsContainer.classList.toggle('hidden', n === 0);
        refreshEdges();
    };

    const headerFor = (type) => {
        const meta = TYPE_META[type] || TYPE_META.paragraph;
        return `
            <header class="flex items-center justify-between border-b border-black/5 bg-[var(--color-offwhite)] px-5 py-3">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-[10px] ${meta.badge}">
                        <svg class="h-3.5 w-3.5 ${meta.text}" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">${meta.icon}</svg>
                    </span>
                    <span class="text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/60">${meta.label}</span>
                </div>
                <div class="flex items-center gap-1">
                    <button type="button" aria-label="Move section up" data-article-editor-section-up class="inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-black/5">
                        <svg class="h-[15px] w-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <button type="button" aria-label="Move section down" data-article-editor-section-down class="inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-black/5">
                        <svg class="h-[15px] w-[15px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M12 5v14M5 12l7 7 7-7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </button>
                    <button type="button" aria-label="Remove section" data-article-editor-section-remove class="ml-1 inline-flex h-7 w-7 items-center justify-center rounded-[10px] text-[var(--color-charcoal)]/70 transition hover:bg-rose-50 hover:text-rose-600">
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
                    </button>
                </div>
            </header>
        `;
    };

    const addSection = (type) => {
        if (!sectionsContainer) return;
        const article = document.createElement('article');
        article.dataset.articleEditorSection = '';
        article.dataset.sectionType = type;
        article.className = 'overflow-hidden rounded-2xl border border-black/5 bg-white shadow-[0_2px_8px_0_rgba(0,0,0,0.04)]';
        article.innerHTML = `
            ${headerFor(type)}
            <div data-article-editor-section-body class="px-6 py-5">
                ${BODY[type] ? BODY[type]() : ''}
            </div>
        `;
        sectionsContainer.appendChild(article);

        // If image, wire the upload area (any click inside the dashed
        // tile opens the picker; the picker is sr-only so a label would
        // be nicer, but click delegation on the wrap is simpler here).
        if (type === 'image') {
            const wrap = article.querySelector('[data-article-editor-section-image]');
            const fileIn = article.querySelector('[data-article-editor-section-image-input]');
            wrap?.addEventListener('click', () => fileIn?.click());
            fileIn?.addEventListener('change', (e) => {
                const file = e.target.files?.[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = (ev) => {
                    // Replace the dashed upload tile with the preview, and
                    // leave the (now-always-rendered) caption input below.
                    wrap.outerHTML = `
                        <img src="${ev.target.result}" alt="" class="mb-3 aspect-[2/1] w-full rounded-xl object-cover" />
                    `;
                };
                reader.readAsDataURL(file);
            });
        }
        refreshCount();
    };

    $$('[data-article-editor-add]').forEach((btn) => {
        btn.addEventListener('click', () => addSection(btn.dataset.articleEditorAdd));
    });

    // Delegated click handler covers remove + up + down for all sections
    // (initial Blade-rendered + runtime-added). One event listener, one
    // switch over `e.target.closest(...)`.
    sectionsContainer?.addEventListener('click', (e) => {
        const remove = e.target.closest('[data-article-editor-section-remove]');
        if (remove) {
            remove.closest('[data-article-editor-section]')?.remove();
            refreshCount();
            return;
        }
        const up = e.target.closest('[data-article-editor-section-up]');
        if (up) {
            const section = up.closest('[data-article-editor-section]');
            const prev = section?.previousElementSibling;
            if (section && prev && prev.matches('[data-article-editor-section]')) {
                sectionsContainer.insertBefore(section, prev);
                refreshEdges();
            }
            return;
        }
        const down = e.target.closest('[data-article-editor-section-down]');
        if (down) {
            const section = down.closest('[data-article-editor-section]');
            const next = section?.nextElementSibling;
            if (section && next && next.matches('[data-article-editor-section]')) {
                sectionsContainer.insertBefore(next, section);
                refreshEdges();
            }
            return;
        }
    });

    // 6) Save buttons — UI-only stub, show a toast.
    saveButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (typeof window.showToast === 'function') {
                window.showToast('Article saved successfully.');
            }
        });
    });

    // 7) Initial count.
    refreshCount();
}

// User view modal: read-only viewer for a single user. Same trigger
// contract as the other modals — any [data-user-view-modal-open]
// button (with optional JSON data-user-view-payload) opens the shared
// [data-user-view-modal] dialog. The "Edit User" footer button closes
// the view modal and forwards to the existing user edit modal.
function initUserViewModal() {
    const modal = document.querySelector('[data-user-view-modal]');
    if (!modal) return;

    let lastFocus = null;

    // Role → badge color, same palette used by the user edit modal's
    // role radio group, so a user's color in the table matches the
    // color in this view.
    const ROLE_PALETTE = {
        admin: 'inline-flex h-[27.5px] items-center rounded-[10px] px-3 text-[13px] font-semibold leading-[19.5px] text-[var(--color-forest)] bg-[var(--color-forest)]/10',
        moderator: 'inline-flex h-[27.5px] items-center rounded-[10px] px-3 text-[13px] font-semibold leading-[19.5px] text-[var(--color-orange)] bg-[var(--color-orange)]/10',
        customer: 'inline-flex h-[27.5px] items-center rounded-[10px] px-3 text-[13px] font-semibold leading-[19.5px] text-[var(--color-charcoal)]/70 bg-black/5',
    };

    const initials = (name) => {
        if (!name) return '—';
        return name
            .split(/\s+/)
            .filter(Boolean)
            .map((w) => w[0])
            .slice(0, 2)
            .join('')
            .toUpperCase() || '—';
    };

    const setText = (key, value) => {
        const el = modal.querySelector(`[data-user-view-${key}]`);
        if (el) el.textContent = value ?? '—';
    };

    const open = (payload) => {
        lastFocus = document.activeElement;

        let data = {};
        if (payload) {
            try { data = JSON.parse(payload) || {}; } catch (e) { data = {}; }
        }

        // Identity card.
        setText('initials', initials(data.name));
        setText('name', data.name || '—');
        setText('email', data.email || '—');
        const role = data.role || 'customer';
        setText('role', role.charAt(0).toUpperCase() + role.slice(1));
        const roleEl = modal.querySelector('[data-user-view-role]');
        if (roleEl) {
            roleEl.textContent = role.charAt(0).toUpperCase() + role.slice(1);
            roleEl.className = ROLE_PALETTE[role] || ROLE_PALETTE.customer;
        }

        // Stat tiles.
        setText('orders', data.orders ?? '—');
        setText('spent', data.spent || '—');

        // Detail rows.
        setText('phone', data.phone || '—');
        setText('location', data.location || '—');
        setText('joined', data.joined || '—');

        // Stash the edit payload so the footer button can re-emit it.
        const editPayload = data.edit_payload || '';
        modal.dataset.editPayload = editPayload;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('overflow-hidden');
        const firstInteractive = modal.querySelector('button, [tabindex]:not([tabindex="-1"])');
        firstInteractive?.focus();
    };

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('overflow-hidden');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    document.querySelectorAll('[data-user-view-modal-open]').forEach((trigger) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            open(trigger.dataset.userViewPayload || '');
        });
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) =>
        el.addEventListener('click', close),
    );
    modal.querySelector('[data-modal-backdrop]')?.addEventListener('click', close);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            close();
        }
    });

    // Footer "Edit User" → close this view modal, then forward to the
    // existing user edit modal by clicking the matching row trigger.
    // We look for any [data-user-modal-open] whose data-user-payload
    // matches what was stashed on the view modal. If none is found we
    // no-op rather than synthesize a payload (every view modal in this
    // project was opened from a row that also exposes the edit button).
    modal.querySelector('[data-user-view-edit]')?.addEventListener('click', () => {
        const editPayload = modal.dataset.editPayload || '';
        close();
        if (!editPayload) return;
        const match = [...document.querySelectorAll('[data-user-modal-open]')].find((el) => {
            try { return el.dataset.userPayload === editPayload; } catch (e) { return false; }
        });
        if (match) {
            // Defer to next tick so the view modal can finish its close
            // transition before the edit modal opens.
            requestAnimationFrame(() => match.click());
        }
    });
}

// Transaction modal: read-only viewer for an order with an editable
// Update Status toggle and an Internal Notes textarea. Same trigger
// contract as the other modals — any [data-transaction-modal-open]
// button (with optional JSON data-transaction-payload) opens the shared
// [data-transaction-modal] dialog. The payload carries the order's
// display data; status / notes are the only fields the user can change.
function initTransactionModal() {
    const modal = document.querySelector('[data-transaction-modal]');
    if (!modal) return;

    const form = modal.querySelector('[data-transaction-form]');

    let lastFocus = null;

    // Statuses the payload can send and the colors the header badge
    // should use. Kept local so this module is self-contained.
    const STATUS_PALETTE = {
        completed: {
            label: 'Completed',
            classes: 'bg-[var(--color-forest)]/10 text-[var(--color-forcoal)]',
            // The forest brand color is `--color-forest`; fix the typo
            // here so the badge inherits the right tint. The label
            // below uses a literal forest shade for the same effect.
            badgeClasses: 'mt-1 inline-flex items-center gap-2 rounded-[10px] px-3 py-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-forest)] bg-[var(--color-forest)]/10',
            icon: '<path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/>',
        },
        pending: {
            label: 'Pending',
            classes: 'mt-1 inline-flex items-center gap-2 rounded-[10px] px-3 py-1 text-[13px] font-semibold leading-[19.5px] text-[var(--color-orange)] bg-[var(--color-orange)]/10',
            icon: '<circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2" stroke-linecap="round"/>',
        },
        failed: {
            label: 'Failed',
            classes: 'mt-1 inline-flex items-center gap-2 rounded-[10px] px-3 py-1 text-[13px] font-semibold leading-[19.5px] text-rose-600 bg-rose-50',
            icon: '<path d="M18 6 6 18M6 6l12 12" stroke-linecap="round"/>',
        },
    };

    const renderBadge = (status) => {
        const badge = modal.querySelector('[data-transaction-status-badge]');
        const label = modal.querySelector('[data-transaction-status-label]');
        if (!badge || !label) return;
        const meta = STATUS_PALETTE[status] || STATUS_PALETTE.completed;
        badge.className = meta.classes;
        // Swap the leading icon to match the status.
        const iconWrap = badge.querySelector('span[aria-hidden="true"]');
        if (iconWrap) {
            iconWrap.innerHTML = `<svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">${meta.icon}</svg>`;
        }
        label.textContent = meta.label;
    };

    const setText = (key, value) => {
        const el = modal.querySelector(`[data-transaction-${key}]`);
        if (el) el.textContent = value ?? '—';
    };

    const open = (payload) => {
        lastFocus = document.activeElement;
        form?.reset();

        let data = {};
        if (payload) {
            try { data = JSON.parse(payload) || {}; } catch (e) { data = {}; }
        }

        // Display fields — read-only.
        setText('order', data.order || '—');
        setText('total', data.total || '$0.00');
        setText('customer', data.customer || '—');
        setText('email', data.email || '—');
        setText('payment', data.payment || '—');
        setText('date', data.date || '—');
        setText('items', data.items || '—');
        renderBadge(data.status || 'completed');

        // Refresh the confirm-dialog name binding so the Delete
        // button shows the current order reference.
        const deleteBtn = modal.querySelector('[data-transaction-delete]');
        if (deleteBtn) deleteBtn.setAttribute('data-confirm-name', data.order || '');

        // Editable fields: status (radio) + notes (textarea).
        const status = data.status || 'completed';
        const statusRadios = form?.elements.namedItem('status');
        if (statusRadios) {
            if (statusRadios instanceof NodeList || statusRadios instanceof RadioNodeList) {
                [...statusRadios].forEach((el) => { el.checked = el.value === status; });
            } else {
                statusRadios.value = status;
            }
        }
        const notes = form?.elements.namedItem('notes');
        if (notes) notes.value = data.notes || '';

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('overflow-hidden');
        const firstInteractive = modal.querySelector('button, [tabindex]:not([tabindex="-1"])');
        firstInteractive?.focus();
    };

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('overflow-hidden');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    document.querySelectorAll('[data-transaction-modal-open]').forEach((trigger) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            open(trigger.dataset.transactionPayload || '');
        });
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) =>
        el.addEventListener('click', close),
    );
    modal.querySelector('[data-modal-backdrop]')?.addEventListener('click', close);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            close();
        }
    });

    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const status = form.elements.namedItem('status')?.value || 'completed';
        renderBadge(status);
        if (typeof showToast === 'function') {
            showToast(`Transaction ${(STATUS_PALETTE[status] || STATUS_PALETTE.completed).label.toLowerCase()}.`);
        }
        close();
    });

    // The transaction's delete button is wired via the shared
    // confirm dialog (data-confirm-delete). When the user confirms,
    // the global handleTransactionDelete() closes the modal and
    // fires the success toast.
    window.handleTransactionDelete = () => {
        if (typeof showToast === 'function') {
            showToast('Transaction deleted.');
        }
        close();
    };
}

// User modal: same trigger contract as the article + product modals —
// any [data-user-modal-open] button (with optional JSON
// data-user-payload) opens the shared [data-user-modal] dialog.
// Used for both Add User and Edit User flows.
function initUserModal() {
    const modal = document.querySelector('[data-user-modal]');
    if (!modal) return;

    const form = modal.querySelector('[data-user-form]');
    const title = modal.querySelector('#user-modal-title');
    const submit = modal.querySelector('[data-user-submit]');

    let lastFocus = null;

    const open = (payload) => {
        lastFocus = document.activeElement;

        form?.reset();

        if (payload && form) {
            try {
                const data = JSON.parse(payload);
                if (title) title.textContent = data.mode === 'edit' ? 'Edit User' : 'New User';
                if (submit) submit.textContent = data.mode === 'edit' ? 'Save Changes' : 'Create User';
                Object.entries(data.fields || {}).forEach(([name, value]) => {
                    const field = form.elements.namedItem(name);
                    if (!field) return;
                    if (field instanceof NodeList || field instanceof RadioNodeList) {
                        [...field].forEach((el) => {
                            if (el.value === value) el.checked = true;
                        });
                    } else {
                        field.value = value;
                    }
                });
            } catch (e) {
                // Malformed payload — fall through to a clean New User form.
            }
        } else {
            if (title) title.textContent = 'New User';
            if (submit) submit.textContent = 'Create User';
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('overflow-hidden');
        const firstField = modal.querySelector('input, select, textarea, button');
        firstField?.focus();
    };

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('overflow-hidden');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    document.querySelectorAll('[data-user-modal-open]').forEach((trigger) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            open(trigger.dataset.userPayload || '');
        });
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) =>
        el.addEventListener('click', close),
    );
    modal.querySelector('[data-modal-backdrop]')?.addEventListener('click', close);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            close();
        }
    });

    form?.addEventListener('submit', () => {
        const isEdit = submit?.textContent?.toLowerCase().includes('save');
        const heading = isEdit ? 'User updated.' : 'User created.';
        close();
        if (typeof showToast === 'function') {
            showToast(heading);
        }
    });
}

// Product modal: same trigger contract as the article modal — any
// [data-product-modal-open] button (with optional JSON
// data-product-payload) opens the shared [data-product-modal] dialog.
// Used for both Add Product and Edit Product flows.
function initProductModal() {
    const modal = document.querySelector('[data-product-modal]');
    if (!modal) return;

    const form = modal.querySelector('[data-product-form]');
    const title = modal.querySelector('#product-modal-title');
    const submit = modal.querySelector('[data-product-submit]');
    const submitLabel = modal.querySelector('[data-product-submit-label]');
    const bannerInput = modal.querySelector('[data-product-banner-input]');
    const bannerPreview = modal.querySelector('[data-product-banner-preview]');
    const bannerEmpty = modal.querySelector('[data-product-banner-empty]');
    const catalogList = modal.querySelector('[data-product-catalog-list]');
    const catalogInput = modal.querySelector('[data-product-catalog-input]');
    const catalogAddBtn = modal.querySelector('[data-product-catalog-add]');

    let lastFocus = null;

    // Layout: catalog list is a relative 77px-tall row. The Add tile sits at
    // left:0 in the empty state; uploaded thumbs get appended to the right
    // at left = (count * (77 + 8))px.
    const CATALOG_THUMB_SIZE = 77;
    const CATALOG_THUMB_GAP = 8;

    const resetCatalog = () => {
        if (!catalogList) return;
        // Strip any previews added during the previous open; keep the Add tile.
        [...catalogList.querySelectorAll('[data-product-catalog-thumb]')].forEach((el) => el.remove());
        if (catalogAddBtn) catalogAddBtn.style.left = '0px';
    };

    const refreshCatalogLayout = () => {
        if (!catalogList) return;
        const thumbs = [...catalogList.querySelectorAll('[data-product-catalog-thumb]')];
        thumbs.forEach((thumb, i) => {
            thumb.style.left = `${i * (CATALOG_THUMB_SIZE + CATALOG_THUMB_GAP)}px`;
        });
        if (catalogAddBtn) {
            catalogAddBtn.style.left = `${thumbs.length * (CATALOG_THUMB_SIZE + CATALOG_THUMB_GAP)}px`;
        }
    };

    const addCatalogThumb = (src) => {
        if (!catalogList || !src) return;
        const wrap = document.createElement('span');
        wrap.setAttribute('data-product-catalog-thumb', '');
        wrap.className = 'absolute top-0 h-[77px] w-[77px] overflow-hidden rounded-[14px] border border-black/5 bg-[var(--color-offwhite)]';
        const img = document.createElement('img');
        img.src = src;
        img.alt = '';
        img.className = 'absolute inset-0 h-full w-full object-cover';
        wrap.appendChild(img);
        catalogList.appendChild(wrap);
        refreshCatalogLayout();
    };

    const open = (payload) => {
        lastFocus = document.activeElement;

        form?.reset();
        if (bannerInput) bannerInput.value = '';
        if (bannerPreview) {
            bannerPreview.src = '';
            bannerPreview.classList.add('hidden');
            bannerPreview.alt = '';
        }
        bannerEmpty?.classList.remove('hidden');
        resetCatalog();
        if (catalogInput) catalogInput.value = '';

        if (payload && form) {
            try {
                const data = JSON.parse(payload);
                if (title) title.textContent = data.mode === 'edit' ? 'Edit Product' : 'New Product';
                if (submitLabel) submitLabel.textContent = data.mode === 'edit' ? 'Save Changes' : 'Next: Specifications';
                if (submit) {
                    // Hide the arrow icon in edit mode (no next step).
                    const arrow = submit.querySelector('svg');
                    if (arrow) arrow.style.display = data.mode === 'edit' ? 'none' : '';
                }
                Object.entries(data.fields || {}).forEach(([name, value]) => {
                    const field = form.elements.namedItem(name);
                    if (!field) return;
                    if (field instanceof NodeList || field instanceof RadioNodeList) {
                        [...field].forEach((el) => {
                            if (el.value === value) el.checked = true;
                        });
                    } else {
                        field.value = value;
                    }
                });
                if (data.preview) {
                    bannerPreview.src = data.preview;
                    bannerPreview.alt = data.name || 'Banner preview';
                    bannerPreview.classList.remove('hidden');
                    bannerEmpty?.classList.add('hidden');
                }
                (data.catalog || []).forEach((src) => addCatalogThumb(src));
            } catch (e) {
                // Malformed payload — fall through to a clean New Product form.
            }
        } else {
            if (title) title.textContent = 'New Product';
            if (submitLabel) submitLabel.textContent = 'Next: Specifications';
            if (submit) {
                const arrow = submit.querySelector('svg');
                if (arrow) arrow.style.display = '';
            }
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('overflow-hidden');
        const firstField = modal.querySelector('input, select, textarea, button');
        firstField?.focus();
    };

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('overflow-hidden');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    document.querySelectorAll('[data-product-modal-open]').forEach((trigger) => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            open(trigger.dataset.productPayload || '');
        });
    });

    modal.querySelectorAll('[data-modal-close]').forEach((el) =>
        el.addEventListener('click', close),
    );
    modal.querySelector('[data-modal-backdrop]')?.addEventListener('click', close);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            close();
        }
    });

    // Banner preview on file select.
    bannerInput?.addEventListener('change', () => {
        const file = bannerInput.files?.[0];
        if (!file) {
            bannerPreview?.classList.add('hidden');
            bannerEmpty?.classList.remove('hidden');
            return;
        }
        const reader = new FileReader();
        reader.onload = (ev) => {
            bannerPreview.src = String(ev.target?.result || '');
            bannerPreview.alt = file.name;
            bannerPreview.classList.remove('hidden');
            bannerEmpty?.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });

    // Catalog multi-upload: the visible "Add" tile is a label that
    // delegates to the hidden <input type="file" multiple>. Each chosen
    // file is rendered as a 77×77 thumbnail to the left of the Add tile.
    const handleCatalogFiles = (files) => {
        if (!files) return;
        [...files].forEach((file) => {
            if (!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = (ev) => addCatalogThumb(String(ev.target?.result || ''));
            reader.readAsDataURL(file);
        });
    };
    catalogAddBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        catalogInput?.click();
    });
    catalogInput?.addEventListener('change', () => {
        handleCatalogFiles(catalogInput.files);
        catalogInput.value = '';
    });

    // Snapshot the current form into a payload-shaped object so the
    // specs modal (or a re-open of this one via "Back to Details") can
    // rehydrate the exact same fields the admin typed.
    const snapshotForm = () => {
        const fields = {};
        if (!form) return fields;
        const names = new Set();
        for (const el of form.elements) {
            if (!el.name || el.disabled) continue;
            if (el.type === 'file') continue;
            if ((el.type === 'radio' || el.type === 'checkbox') && !el.checked) continue;
            if (names.has(el.name)) continue;
            names.add(el.name);
            fields[el.name] = form.elements.namedItem(el.name)?.value ?? '';
        }
        return fields;
    };

    // Expose the open() for cross-modal handoff from the specs modal
    // ("Back to Details" reopens this modal with the snapshot).
    const openWithPayload = (payloadObj) => {
        try {
            open(JSON.stringify(payloadObj || {}));
        } catch (e) {
            open('');
        }
    };

    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const labelText = (submitLabel?.textContent || submit?.textContent || '').toLowerCase();
        const isEdit = labelText.includes('save');

        if (isEdit) {
            // Edit mode: just save and close (no specs step).
            close();
            if (typeof showToast === 'function') showToast('Product updated.');
            return;
        }

        // Create mode: transition to the specs modal.
        const fields = snapshotForm();
        const previewSrc = bannerPreview && !bannerPreview.classList.contains('hidden') ? bannerPreview.src : null;
        const catalog = [...(catalogList?.querySelectorAll('[data-product-catalog-thumb] img') || [])]
            .map((img) => img.src);
        window.productFlow = {
            mode: 'create',
            name: fields.name || 'Untitled Product',
            preview: previewSrc,
            fields,
            catalog,
            // Seed specs from the flow stash (preserved across Back/Next),
            // or start with one empty row.
            specs: Array.isArray(window.productFlow?.specs) && window.productFlow.specs.length
                ? window.productFlow.specs
                : [{ label: '', value: '' }],
        };
        close();
        if (typeof window.openProductSpecsModal === 'function') {
            window.openProductSpecsModal();
        }
    });

    // Expose for cross-modal handoff from the specs modal.
    window.openProductModal = openWithPayload;
}

// Product Specifications modal — the second step of the product create flow.
// Owns a list of {label, value} rows held in window.productFlow.specs.
// "Back to Details" hands off to window.openProductModal() with the
// same stashed payload so the admin's typed values are preserved.
// "Save Changes" closes both modals and shows a success toast.
function initProductSpecsModal() {
    const modal = document.querySelector('[data-product-specs-modal]');
    if (!modal) return;

    const form = modal.querySelector('[data-product-specs-form]');
    const list = modal.querySelector('[data-product-specs-list]');
    const count = modal.querySelector('[data-product-specs-count]');
    const addBtn = modal.querySelector('[data-product-specs-add]');
    const backBtn = modal.querySelector('[data-product-specs-back]');
    const saveBtn = modal.querySelector('[data-product-specs-save]');
    let lastFocus = null;

    const rowHTML = (idx, label, value) => {
        const l = (label ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        const v = (value ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        return `
            <div data-product-specs-row class="grid grid-cols-1 gap-2 sm:grid-cols-[1fr_2fr_auto] sm:items-stretch">
                <div class="relative">
                    <input
                        type="text"
                        data-product-specs-row-label
                        value="${l}"
                        placeholder="e.g. Capacity"
                        aria-label="Specification label"
                        class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                    />
                </div>
                <div class="relative">
                    <input
                        type="text"
                        data-product-specs-row-value
                        value="${v}"
                        placeholder="e.g. 65 Liters"
                        aria-label="Specification value"
                        class="h-[46.5px] w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)]/20 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                    />
                </div>
                <div class="flex items-stretch sm:items-center">
                    <button
                        type="button"
                        data-product-specs-row-remove
                        aria-label="Remove specification"
                        class="inline-flex h-[46.5px] w-full shrink-0 items-center justify-center gap-2 rounded-2xl px-4 text-[14px] font-semibold text-rose-500 transition hover:bg-rose-50 sm:h-9 sm:w-9 sm:px-0"
                    >
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" aria-hidden="true"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                        <span class="sm:hidden">Remove</span>
                    </button>
                </div>
            </div>
        `;
    };

    const render = () => {
        if (!list) return;
        const rows = Array.isArray(window.productFlow?.specs) ? window.productFlow.specs : [];
        list.innerHTML = rows.map((r, i) => rowHTML(i, r.label, r.value)).join('');
        if (count) {
            count.textContent = `${rows.length} ${rows.length === 1 ? 'row' : 'rows'}`;
        }
    };

    const readIntoStash = () => {
        if (!list) return;
        const rows = [...list.querySelectorAll('[data-product-specs-row]')].map((row) => ({
            label: row.querySelector('[data-product-specs-row-label]')?.value?.trim() ?? '',
            value: row.querySelector('[data-product-specs-row-value]')?.value?.trim() ?? '',
        }));
        if (!window.productFlow) window.productFlow = {};
        window.productFlow.specs = rows;
    };

    const open = () => {
        lastFocus = document.activeElement;
        if (!window.productFlow || !Array.isArray(window.productFlow.specs)) {
            window.productFlow = { ...(window.productFlow || {}), specs: [{ label: '', value: '' }] };
        }
        render();
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        modal.setAttribute('aria-hidden', 'false');
        document.documentElement.classList.add('overflow-hidden');
        modal.querySelector('input, button')?.focus();
    };

    const close = () => {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        modal.setAttribute('aria-hidden', 'true');
        document.documentElement.classList.remove('overflow-hidden');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    };

    // Add row.
    addBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        readIntoStash();
        window.productFlow.specs.push({ label: '', value: '' });
        render();
        // Focus the new row's label input.
        const rows = list?.querySelectorAll('[data-product-specs-row]');
        rows?.[rows.length - 1]?.querySelector('[data-product-specs-row-label]')?.focus();
    });

    // Remove row (delegated).
    list?.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-product-specs-row-remove]');
        if (!btn) return;
        e.preventDefault();
        const row = btn.closest('[data-product-specs-row]');
        if (!row) return;
        readIntoStash();
        const rows = [...(list?.querySelectorAll('[data-product-specs-row]') || [])];
        const idx = rows.indexOf(row);
        if (idx < 0) return;
        if (window.productFlow.specs.length <= 1) {
            // Keep at least one row; just clear the values.
            window.productFlow.specs[0] = { label: '', value: '' };
        } else {
            window.productFlow.specs.splice(idx, 1);
        }
        render();
    });

    // Live-write on every input so Back/Save see the latest values.
    list?.addEventListener('input', () => readIntoStash());

    // Back to Details — close this, re-open the details modal with the
    // stashed payload so the admin's typed values are preserved.
    backBtn?.addEventListener('click', (e) => {
        e.preventDefault();
        readIntoStash();
        const payload = window.productFlow ? { ...window.productFlow } : {};
        // Don't pass `specs` into the details-modal open() — it would
        // re-render, but we keep the canonical source on the flow.
        delete payload.specs;
        close();
        if (typeof window.openProductModal === 'function') {
            window.openProductModal(payload);
        }
    });

    // Save Changes — toast + close both modals, clear the flow.
    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        readIntoStash();
        const nonEmpty = (window.productFlow?.specs || []).filter((r) => r.label || r.value).length;
        close();
        if (typeof showToast === 'function') {
            showToast(nonEmpty > 0 ? 'Product created.' : 'Product created (no specifications).');
        }
        window.productFlow = null;
    });

    // Standard close affordances.
    modal.querySelectorAll('[data-modal-close]').forEach((el) => el.addEventListener('click', close));
    modal.querySelector('[data-modal-backdrop]')?.addEventListener('click', close);
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
            close();
        }
    });

    // Expose for cross-modal handoff from the details modal.
    window.openProductSpecsModal = open;
}

// Generic admin filter module.
// Wires `[data-filter-group="name"]` containers (with their `[data-filter-btn]`
// pills) to any matching `[data-filter-target="name"]` element. Rows inside
// the target carry `[data-filter-tag="value"]`. The active button gets
// `aria-current="true"`, and class lists declared on the group via
// `data-filter-active-class` / `data-filter-inactive-class` are swapped so
// each page keeps its own visual style for active vs. inactive pills.
function initAdminFilter() {
    const groups = document.querySelectorAll('[data-filter-group]');
    if (groups.length === 0) return;

    groups.forEach((group) => {
        const groupName = group.dataset.filterGroup;
        const buttons = group.querySelectorAll('[data-filter-btn]');
        const containers = document.querySelectorAll(`[data-filter-target="${groupName}"]`);
        const emptyStates = document.querySelectorAll(`[data-filter-empty="${groupName}"]`);

        const activeClasses = (group.dataset.filterActiveClass || '')
            .split(/\s+/)
            .filter(Boolean);
        const inactiveClasses = (group.dataset.filterInactiveClass || '')
            .split(/\s+/)
            .filter(Boolean);

        const applyFilter = (value) => {
            const lower = (value || 'all').toLowerCase();

            buttons.forEach((btn) => {
                const isActive = (btn.dataset.filterBtn || '').toLowerCase() === lower;
                if (isActive) {
                    btn.setAttribute('aria-current', 'true');
                } else {
                    btn.removeAttribute('aria-current');
                }
                if (activeClasses.length || inactiveClasses.length) {
                    btn.classList.remove(...activeClasses, ...inactiveClasses);
                    btn.classList.add(...(isActive ? activeClasses : inactiveClasses));
                }
            });

            let visibleCount = 0;
            containers.forEach((container) => {
                container.querySelectorAll('[data-filter-tag]').forEach((row) => {
                    const tag = (row.dataset.filterTag || '').toLowerCase();
                    const show = lower === 'all' || tag === lower;
                    row.classList.toggle('hidden', !show);
                    if (show) visibleCount += 1;
                });
            });

            emptyStates.forEach((el) => {
                el.classList.toggle('hidden', visibleCount > 0);
            });
        };

        buttons.forEach((btn) => {
            btn.addEventListener('click', () =>
                applyFilter(btn.dataset.filterBtn),
            );
        });
    });
}
