@props([
    'brand' => 'The Newspaper',
    'tagline' => 'An independent record of the quiet forces shaping how we live',
    'edition' => 'Vol. I — No. 47',
    'dateline' => 'Saturday, July 26, 2026',
    'ctaText' => 'Subscribe',
    'ctaLink' => '/#newsletter',
    'newsletterText' => 'The Early Edition ↗',
    'links' => [],
])
<!--
    The masthead. A hairline service row (dateline, edition, newsletter),
    the big centered serif nameplate, then the desk navigation between a
    thick rule and a hairline. Once the masthead scrolls away, main.js slides
    in the compact press bar. Links come from nav_links in
    resources/data/site.json; the layout passes them in.
-->
<header data-masthead>

    <!-- The compact press bar — fixed, hidden until the masthead scrolls away -->
    <div id="pressbar" class="fixed inset-x-0 top-0 z-50 bg-canvas/95 backdrop-blur-md">
        <div class="mx-auto flex h-14 w-full max-w-7xl items-center justify-between gap-6 px-6">
            <a href="/" aria-label="Homepage" class="flex shrink-0 items-center gap-2.5 text-ink">
                <svg viewBox="0 0 24 24" class="size-4 shrink-0" aria-hidden="true">
                    <path fill="currentColor" fill-rule="evenodd" d="M3 3h18v18H3V3Zm2.5 2.5v6h13v-6h-13Zm0 8.5v1.5h13V14h-13Zm0 3.5V19h9v-1.5h-9Z"/>
                </svg>
                <span class="font-display text-lg font-semibold tracking-tight">{{ $brand }}</span>
            </a>

            <nav class="max-lg:hidden" aria-label="Main">
                <ul role="list" class="flex items-center gap-6 text-[11px] font-semibold tracking-[0.16em] uppercase">
                    @foreach ($links as $link)
                    <li><a href="{{ $link->url }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $link->text }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <div class="flex items-center gap-3">
                <a href="{{ $ctaLink }}" class="hidden border border-ink px-3.5 py-1.5 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas sm:inline-flex">{{ $ctaText }}</a>
                <button
                    type="button"
                    data-mobile-toggle
                    aria-expanded="false"
                    aria-label="Open menu"
                    class="flex size-9 cursor-pointer items-center justify-center text-ink lg:hidden">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current" aria-hidden="true">
                        <path stroke-linecap="round" d="M3.75 8h16.5M3.75 16h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- The service row -->
    <div class="border-b border-line">
        <div class="mx-auto flex h-10 w-full max-w-7xl items-center justify-between gap-4 px-6 text-[11px] tracking-[0.14em] text-muted uppercase">
            <p class="truncate">{{ $dateline }}</p>
            <p class="max-sm:hidden">{{ $edition }}</p>
            <div class="flex items-center gap-4">
                <a href="{{ $ctaLink }}" class="transition-colors duration-200 hover:text-ink max-md:hidden">{{ $newsletterText }}</a>
                <button
                    type="button"
                    data-mobile-toggle
                    aria-expanded="false"
                    aria-label="Open menu"
                    class="flex cursor-pointer items-center gap-2 text-ink md:hidden">
                    Menu
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-4 stroke-current" aria-hidden="true">
                        <path stroke-linecap="round" d="M3.75 8h16.5M3.75 16h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- The nameplate -->
    <div class="px-6 pt-10 pb-8 text-center sm:pt-14 sm:pb-10">
        <a href="/" class="font-display text-[2.6rem] leading-none font-semibold tracking-tight text-ink sm:text-6xl lg:text-7xl">{{ $brand }}</a>
        <p class="mx-auto mt-5 max-w-md text-[10px] leading-relaxed tracking-[0.28em] text-muted uppercase sm:text-[11px]">{{ $tagline }}</p>
    </div>

    <!-- The desk navigation -->
    <nav class="border-t-2 border-b border-line border-t-ink max-md:hidden" aria-label="Desks">
        <ul role="list" class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-center gap-x-9 gap-y-2 px-6 py-3.5 text-[12px] font-semibold tracking-[0.16em] uppercase">
            @foreach ($links as $link)
            <li><a href="{{ $link->url }}" class="text-ink decoration-1 underline-offset-4 transition-colors duration-200 hover:underline">{{ $link->text }}</a></li>
            @endforeach
        </ul>
    </nav>
    <div class="border-t-2 border-t-ink md:hidden"></div>

    <!-- The mobile sheet -->
    <div data-mobile-panel class="fixed inset-x-0 top-0 z-[70] border-b border-line bg-canvas lg:hidden">
        <div class="flex h-12 items-center justify-between border-b border-line px-6">
            <a href="/" class="font-display text-lg font-semibold tracking-tight text-ink">{{ $brand }}</a>
            <button
                type="button"
                data-mobile-toggle
                aria-expanded="false"
                aria-label="Close menu"
                class="flex size-9 cursor-pointer items-center justify-center text-ink">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current" aria-hidden="true">
                    <path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <nav class="px-6 py-4" aria-label="Mobile">
            <ul role="list" class="flex flex-col">
                @foreach ($links as $link)
                <li class="border-b border-line/70 last:border-0">
                    <a href="{{ $link->url }}" class="group flex items-baseline justify-between py-3.5">
                        <span class="font-display text-xl text-ink">{{ $link->text }}</span>
                        <span class="text-xs text-faint transition-transform duration-200 group-hover:translate-x-0.5">→</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <a href="{{ $ctaLink }}" class="mt-5 mb-2 flex items-center justify-center border border-ink px-4 py-3 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas">{{ $ctaText }}</a>
        </nav>
    </div>
</header>
