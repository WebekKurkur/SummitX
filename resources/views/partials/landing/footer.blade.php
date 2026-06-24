
<footer id="contact" class="bg-[var(--color-charcoal)] text-[var(--color-offwhite)]">
    <div class="container-x py-20 lg:py-24">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-12">

<div class="lg:col-span-4">
                <a href="/" class="font-display text-3xl font-bold tracking-tight lg:text-4xl">SummitX</a>
                <p class="mt-6 max-w-sm text-sm text-white/65 leading-relaxed">
                    Premium outdoor gear engineered for adventurers who refuse to compromise.
                </p>
                <ul class="mt-8 flex items-center gap-4" aria-label="Social media">
                    @foreach ([
                        ['Instagram', 'M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm5 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z'],
                        ['Facebook', 'M13 22v-9h3l1-4h-4V6.5C13 5.4 13.4 4.6 15 4.6h2V1.1C16.7 1 15.4 1 14 1c-3 0-5 1.8-5 5v3H6v4h3v9h4z'],
                        ['YouTube', 'M21.6 7.2a2.8 2.8 0 0 0-2-2C17.9 4.8 12 4.8 12 4.8s-5.9 0-7.6.4a2.8 2.8 0 0 0-2 2C2 8.9 2 12 2 12s0 3.1.4 4.8a2.8 2.8 0 0 0 2 2c1.7.4 7.6.4 7.6.4s5.9 0 7.6-.4a2.8 2.8 0 0 0 2-2c.4-1.7.4-4.8.4-4.8s0-3.1-.4-4.8zM10 15V9l5 3-5 3z'],
                        ['Twitter', 'M22 5.8a8.5 8.5 0 0 1-2.4.7 4.2 4.2 0 0 0 1.8-2.3 8.4 8.4 0 0 1-2.6 1A4.2 4.2 0 0 0 11.5 9a11.9 11.9 0 0 1-8.6-4.4 4.2 4.2 0 0 0 1.3 5.6 4.2 4.2 0 0 1-1.9-.5v.1a4.2 4.2 0 0 0 3.4 4.1 4.2 4.2 0 0 1-1.9.1 4.2 4.2 0 0 0 3.9 2.9A8.4 8.4 0 0 1 2 18.4 11.9 11.9 0 0 0 8.5 20c7.7 0 12-6.4 12-12v-.6A8.6 8.6 0 0 0 22 5.8z'],
                    ] as [$name, $path])
                        <li>
                            <a
                                href="#"
                                aria-label="{{ $name }}"
                                class="flex h-11 w-11 items-center justify-center rounded-full border border-white/15 text-white/85 transition hover:border-white hover:bg-white hover:text-[var(--color-charcoal)]"
                            >
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="{{ $path }}"/>
                                </svg>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

<nav aria-labelledby="footer-shop" class="lg:col-span-2">
                <h3 id="footer-shop" class="font-display text-lg font-bold">Shop</h3>
                <ul class="mt-6 flex flex-col gap-4 text-base text-white/70 lg:gap-3 lg:text-sm">
                    @foreach (['Apparel', 'Backpacks', 'Camping', 'Climbing', 'Footwear'] as $item)
                        <li><a href="#" class="transition hover:text-white">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </nav>

<nav aria-labelledby="footer-company" class="lg:col-span-2">
                <h3 id="footer-company" class="font-display text-lg font-bold">Company</h3>
                <ul class="mt-6 flex flex-col gap-4 text-base text-white/70 lg:gap-3 lg:text-sm">
                    @foreach (['About Us', 'Journal', 'Sustainability', 'Careers', 'Store Locator'] as $item)
                        <li><a href="#" class="transition hover:text-white">{{ $item }}</a></li>
                    @endforeach
                </ul>
            </nav>

<div class="lg:col-span-4">
                <h3 class="font-display text-lg font-bold">Join the Summit Community</h3>
                <p class="mt-4 text-base text-white/70 lg:text-sm">
                    Get expedition stories, gear guides, and exclusive launches in your inbox.
                </p>

<form
                    class="mt-6 flex flex-col gap-3 sm:flex-row sm:gap-2"
                    action="#"
                    method="post"
                    novalidate
                >
                    <label for="newsletter-email" class="sr-only">Email address</label>
                    <input
                        id="newsletter-email"
                        type="email"
                        name="email"
                        required
                        autocomplete="email"
                        placeholder="Enter your email"
                        class="w-full flex-1 rounded-full border border-white/20 bg-white/5 px-5 py-3.5 text-sm text-white placeholder:text-white/50 focus:border-white focus:outline-none focus:ring-2 focus:ring-white/30"
                    >
                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-full bg-[var(--color-offwhite)] px-6 py-3 text-sm font-medium text-[var(--color-charcoal)] transition hover:bg-[var(--color-stone)] sm:w-auto"
                    >
                        Subscribe
                    </button>
                </form>

                <ul class="mt-8 space-y-3 text-sm text-white/70">
                    <li class="flex items-center gap-3">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M3 7l9 6 9-6M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="mailto:hello@summitx.com" class="transition hover:text-white">hello@summitx.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.8 19.8 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:+12345678901" class="transition hover:text-white">+1 (234) 567-890</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 1 1 18 0z" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>Seattle, Washington</span>
                    </li>
                </ul>
            </div>
        </div>

<div class="mt-16 flex flex-col items-center gap-6 border-t border-white/10 pt-8 text-sm text-white/55 lg:flex-row lg:items-center lg:justify-between lg:gap-4">
            <p class="text-center lg:text-left">© {{ date('Y') }} SummitX. All rights reserved.</p>
            <ul class="flex flex-wrap items-center justify-center gap-x-8 gap-y-3 lg:justify-end lg:gap-6">
                <li><a href="#" class="transition hover:text-white">Privacy Policy</a></li>
                <li><a href="#" class="transition hover:text-white">Terms of Service</a></li>
                <li class="basis-full text-center lg:basis-auto"><a href="#" class="transition hover:text-white">Accessibility</a></li>
            </ul>
        </div>
    </div>
</footer>
