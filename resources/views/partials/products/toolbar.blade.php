
<form
    role="search"
    aria-label="Filter products"
    class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-4"
    onsubmit="event.preventDefault();"
>
    <label for="product-search" class="sr-only">Search products</label>
    <div class="relative flex-1">
        <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-5 flex items-center text-[var(--color-charcoal)]/50">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <circle cx="11" cy="11" r="7"/>
                <path d="m20 20-3.5-3.5" stroke-linecap="round"/>
            </svg>
        </span>
        <input
            id="product-search"
            name="q"
            type="search"
            placeholder="Search products..."
            class="w-full rounded-2xl border border-black/10 bg-white py-4 pl-14 pr-5 text-base text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
        >
    </div>

    <label for="product-sort" class="sr-only">Sort products</label>
    <div class="relative sm:w-56">
        <select
            id="product-sort"
            name="sort"
            class="w-full appearance-none rounded-2xl border border-black/10 bg-white py-4 pl-5 pr-12 text-base font-medium text-[var(--color-charcoal)] focus:border-[var(--color-charcoal)] focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
        >
            <option value="featured">Featured</option>
            <option value="newest">Newest</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="name">Name A–Z</option>
        </select>
        <span aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-5 flex items-center text-[var(--color-charcoal)]/60">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                <path d="m6 9 6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </div>
</form>
