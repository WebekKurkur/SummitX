
<section
    aria-labelledby="shipping-title"
    class="rounded-2xl border border-black/5 bg-white p-7 shadow-[0_2px_20px_0_rgba(0,0,0,0.04)] sm:p-10"
>
    <h2 id="shipping-title" class="font-display text-2xl font-bold tracking-[-0.025em] text-[var(--color-charcoal)]">
        Shipping Information
    </h2>

    <div class="mt-8 grid gap-6 sm:grid-cols-2">
        <div>
            <label for="ship-first" class="text-sm font-semibold text-[var(--color-charcoal)]">First Name</label>
            <input
                id="ship-first"
                name="first_name"
                type="text"
                placeholder="John"
                autocomplete="given-name"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>
        <div>
            <label for="ship-last" class="text-sm font-semibold text-[var(--color-charcoal)]">Last Name</label>
            <input
                id="ship-last"
                name="last_name"
                type="text"
                placeholder="Doe"
                autocomplete="family-name"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div>
            <label for="ship-email" class="text-sm font-semibold text-[var(--color-charcoal)]">Email Address</label>
            <input
                id="ship-email"
                name="email"
                type="email"
                placeholder="john.doe@example.com"
                autocomplete="email"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>
        <div>
            <label for="ship-phone" class="text-sm font-semibold text-[var(--color-charcoal)]">Phone Number</label>
            <input
                id="ship-phone"
                name="phone"
                type="tel"
                placeholder="+1 (555) 123-4567"
                autocomplete="tel"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div class="sm:col-span-2">
            <label for="ship-address" class="text-sm font-semibold text-[var(--color-charcoal)]">Street Address</label>
            <input
                id="ship-address"
                name="address"
                type="text"
                placeholder="123 Summit Trail"
                autocomplete="street-address"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div>
            <label for="ship-city" class="text-sm font-semibold text-[var(--color-charcoal)]">City</label>
            <input
                id="ship-city"
                name="city"
                type="text"
                placeholder="Boulder"
                autocomplete="address-level2"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>
        <div>
            <label for="ship-state" class="text-sm font-semibold text-[var(--color-charcoal)]">State / Province</label>
            <input
                id="ship-state"
                name="state"
                type="text"
                placeholder="Colorado"
                autocomplete="address-level1"
                class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
            >
        </div>

        <div class="sm:col-span-2 grid gap-6 sm:grid-cols-2">
            <div>
                <label for="ship-postal" class="text-sm font-semibold text-[var(--color-charcoal)]">Postal Code</label>
                <input
                    id="ship-postal"
                    name="postal"
                    type="text"
                    placeholder="80302"
                    autocomplete="postal-code"
                    class="mt-3 w-full rounded-2xl border border-transparent bg-[var(--color-offwhite)] px-5 py-4 text-[15px] text-[var(--color-charcoal)] placeholder:text-[var(--color-charcoal)]/50 focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                >
            </div>
            <div>
                <label for="ship-country" class="text-sm font-semibold text-[var(--color-charcoal)]">Country</label>
                <select
                    id="ship-country"
                    name="country"
                    autocomplete="country"
                    class="mt-3 w-full appearance-none rounded-2xl border border-transparent bg-[var(--color-offwhite)] bg-no-repeat px-5 py-4 pr-12 text-[15px] text-[var(--color-charcoal)] focus:border-[var(--color-charcoal)] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-charcoal)]/15"
                >
                    <option>United States</option>
                    <option>Canada</option>
                    <option>United Kingdom</option>
                    <option>Australia</option>
                    <option>Germany</option>
                    <option>France</option>
                </select>
            </div>
        </div>
    </div>
</section>
