@props([
    'brand' => 'Newspaper',
    'tagline' => 'A news and magazine template for your next project',
    'edition' => 'Vol. I — No. 47',
    'dateline' => 'Saturday, July 26, 2026',
    'ctaText' => 'Subscribe',
    'ctaLink' => '/#newsletter',
    'newsletterText' => 'The Early Edition ↗',
    'socialLabel' => 'Follow',
    'megaLinkText' => 'All coverage',
    'links' => [],
    'items' => [],
])
<!--
    The masthead. An inverse service row (dateline, edition, newsletter),
    the big centered serif nameplate flanked by the sections button and the
    follow rail, then the desk navigation under a hairline rule, then the
    wire ticker. The two ears deliberately share one shape — a 48px
    hairline square that inverts to ink on hover — so the nameplate sits
    centred between them.
    Desks with stories in the articles collection grow a mega panel —
    main.js prunes the empty ones and handles hover intent. The sections
    button (and the press-bar hamburger) opens the left drawer. Links come
    from nav_links in resources/data/site.json; the layout passes them in
    along with the articles collection for the mega panels. The follow rail
    reads social_links from that same file directly — it is a site-wide
    singleton, so it needs no wiring from the layout. Each entry carries its
    own inline SVG; use fill='currentColor' so the icon inverts on hover.
-->
<header data-masthead>

    <!-- The compact press bar — fixed, hidden until the masthead scrolls away -->
    <div id="pressbar" class="fixed inset-x-0 top-0 z-50 bg-canvas/95 backdrop-blur-md">
        <div class="mx-auto flex h-14 w-full max-w-7xl items-center justify-between gap-6 px-6">
            <div class="flex min-w-0 items-center gap-2">
                <button
                    type="button"
                    data-drawer-toggle
                    aria-expanded="false"
                    aria-label="Open sections menu"
                    class="-ml-2 flex size-9 shrink-0 cursor-pointer items-center justify-center text-ink">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current" aria-hidden="true">
                        <path stroke-linecap="round" d="M3.75 8h16.5M3.75 16h16.5"/>
                    </svg>
                </button>
                <a href="/" aria-label="Homepage" class="flex shrink-0 items-center text-ink">
                    <x-logo classes="h-4 w-auto"/>
                </a>
            </div>

            <nav class="max-lg:hidden" aria-label="Main">
                <ul role="list" class="flex items-center gap-6 text-[11px] font-semibold tracking-[0.16em] uppercase">
                    @foreach ($links as $link)
                    <li><a href="{{ $link->url }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $link->text }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <a href="{{ $ctaLink }}" class="hidden shrink-0 border border-ink px-3.5 py-1.5 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas sm:inline-flex">{{ $ctaText }}</a>
        </div>
    </div>

    <!-- The service row — set in reverse, ink behind the type -->
    <div class="bg-ink">
        <div class="mx-auto flex h-10 w-full max-w-7xl items-center justify-between gap-4 px-6 text-[11px] tracking-[0.14em] uppercase">
            <p class="truncate text-canvas/70">{{ $dateline }}</p>
            <p class="text-canvas/70 max-sm:hidden">{{ $edition }}</p>
            <div class="flex items-center gap-4">
                <a href="{{ $ctaLink }}" class="text-canvas/70 transition-colors duration-200 hover:text-canvas max-md:hidden">{{ $newsletterText }}</a>
                <button
                    type="button"
                    data-drawer-toggle
                    aria-expanded="false"
                    aria-label="Open sections menu"
                    class="flex cursor-pointer items-center gap-2 text-canvas md:hidden">
                    Menu
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-4 stroke-current" aria-hidden="true">
                        <path stroke-linecap="round" d="M3.75 8h16.5M3.75 16h16.5"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- The nameplate, flanked by the menu box and the follow rail -->
    <div class="mx-auto w-full max-w-7xl px-6 py-6 md:py-2">
        <div class="grid items-center md:grid-cols-[1fr_auto_1fr] md:gap-x-10">

            <div class="max-md:hidden">
                <button
                    type="button"
                    data-drawer-toggle
                    aria-expanded="false"
                    aria-label="Open sections menu"
                    class="flex size-12 cursor-pointer items-center justify-center border border-line text-ink transition-colors duration-200 hover:bg-ink hover:text-canvas">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current" aria-hidden="true">
                        <path stroke-linecap="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/>
                    </svg>
                </button>
            </div>

            <div class="min-w-0 py-4 text-center">
                <a href="/" aria-label="Homepage" class="inline-flex text-ink">
                    <x-logo classes="h-8 w-auto sm:h-10.5"/>
                </a>
                <p class="mt-2.5 truncate text-[9px] tracking-[0.12em] text-muted uppercase sm:text-[11px] sm:tracking-[0.22em]">{{ $tagline }}</p>
            </div>

            <div class="flex items-center gap-4 justify-self-end max-lg:hidden">
                <span class="text-[10px] font-semibold tracking-[0.18em] text-faint uppercase">{{ $socialLabel }}</span>
                <ul role="list" class="flex items-center gap-2">
                    @foreach ($site->social_links as $item)
                    <li>
                        <a href="{{ $item->url }}" aria-label="{{ $item->text }}" class="flex size-12 items-center justify-center border border-line text-ink transition-colors duration-200 hover:bg-ink hover:text-canvas">
                            {!! $item->icon !!}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

    <!-- The desk navigation — each desk with stories opens a mega panel -->
    <nav data-desknav class="relative border-y border-line max-md:hidden" aria-label="Desks">
        <ul role="list" class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-center px-6 text-[12px] font-semibold tracking-[0.16em] uppercase">
            @foreach ($links as $link)
            <li>
                <a href="{{ $link->url }}" data-mega-trigger="{{ $link->text }}" class="flex px-4.5 py-3.5 text-ink decoration-1 underline-offset-4 hover:underline">{{ $link->text }}</a>
            </li>
            @endforeach
        </ul>

        @foreach ($links as $link)
        <div data-mega-panel="{{ $link->text }}" class="mega-panel absolute inset-x-0 top-full z-40 bg-canvas">
            <div class="mx-auto grid w-full max-w-7xl gap-x-12 gap-y-8 px-6 py-10 lg:grid-cols-[240px_1fr]">
                <div class="max-lg:hidden lg:border-r lg:border-line lg:pr-12">
                    <p class="font-display text-3xl font-semibold tracking-tight text-ink">{{ $link->text }}</p>
                    <a href="{{ $link->url }}" class="mt-4 inline-flex items-center gap-1.5 text-[11px] font-semibold tracking-[0.16em] text-muted uppercase transition-colors duration-200 hover:text-ink">{{ $megaLinkText }} →</a>
                </div>
                <div class="grid grid-cols-2 gap-8 lg:grid-cols-3">
                    @foreach ($items as $item)
                    @continue($item->category != $link->text)
                    <article>
                        <a href="{{ $item->link }}" class="group block">
                            <span class="photo block border border-line">
                                <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
                            </span>
                            <span class="headline-link mt-3.5 block font-display text-lg font-semibold leading-snug tracking-tight text-pretty text-ink">{{ $item->title }}</span>
                            <span class="mt-2 block text-xs text-faint">By {{ $item->author }} · {{ $item->readTime }}</span>
                        </a>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </nav>
    <div class="border-t border-line md:hidden"></div>

    <!-- The wire — headlines drift under the masthead on every page.
         Items come from resources/data/collections/ticker.json, which binds
         globally, so no page has to pass them in. -->
    <x-sections.ticker :items="$ticker"/>

    <!-- The left drawer — every sections button folds this out -->
    <div data-drawer-backdrop class="fixed inset-0 z-60 bg-ink/45" aria-hidden="true"></div>
    <aside data-drawer class="fixed inset-y-0 left-0 z-70 flex w-full max-w-xs flex-col border-r border-line bg-canvas sm:max-w-sm" aria-label="Sections">
        <div class="flex h-14 shrink-0 items-center justify-between border-b border-line pr-4 pl-6">
            <a href="/" aria-label="Homepage" class="flex items-center text-ink">
                <x-logo classes="h-3.5 w-auto"/>
            </a>
            <button
                type="button"
                data-drawer-toggle
                aria-expanded="false"
                aria-label="Close menu"
                class="flex size-9 cursor-pointer items-center justify-center text-ink">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5" class="size-5 stroke-current" aria-hidden="true">
                    <path stroke-linecap="round" d="M6 18 18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto px-6 py-5" aria-label="Sections">
            <ul role="list" class="flex flex-col">
                @foreach ($links as $link)
                <li class="border-b border-line/70 last:border-0">
                    <a href="{{ $link->url }}" class="group flex items-baseline justify-between py-3.5">
                        <span class="font-display text-xl text-ink">{{ $link->text }}</span>
                        <span aria-hidden="true" class="text-xs text-faint transition-transform duration-200 group-hover:translate-x-0.5">→</span>
                    </a>
                </li>
                @endforeach
            </ul>
            <a href="{{ $ctaLink }}" class="mt-6 flex items-center justify-center border border-ink px-4 py-3 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas">{{ $ctaText }}</a>
        </nav>
        <div class="shrink-0 border-t border-line px-6 py-4">
            <p class="text-[10px] tracking-[0.18em] text-faint uppercase">{{ $edition }} · {{ $dateline }}</p>
        </div>
    </aside>
</header>
