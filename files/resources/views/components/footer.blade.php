@props([
    'brand' => 'Newspaper',
    'tagline' => 'Printed nowhere. Read everywhere.',
    'copyright' => '© 2026 The Newspaper Company',
    'note' => 'Set in Playfair Display & Inter',
    'backText' => 'Back to top ↑',
    'columns' => [],
])
<!--
    The site-wide footer: the nameplate restated, a short colophon, and link
    columns drawn from footer_links in resources/data/site.json (the layout
    passes them in). The strings here are editable from the Layout tab.
-->
<footer class="border-t-2 border-t-ink">
    <div class="mx-auto w-full max-w-7xl px-6 py-16 sm:py-20">
        <div class="grid gap-x-12 gap-y-12 lg:grid-cols-[1.6fr_1fr_1fr_1fr]">

            <div>
                <a href="/" aria-label="Homepage" class="inline-flex items-center text-ink">
                    <x-logo classes="h-5 w-auto"/>
                </a>
                <p class="mt-5 max-w-[30ch] text-sm/6 text-muted">{{ $tagline }}</p>
            </div>

            @foreach ($columns as $column)
            <nav aria-label="{{ $column->text }}">
                <p class="text-[11px] font-semibold tracking-[0.18em] text-faint uppercase">{{ $column->text }}</p>
                @if ($column->children ?? false)
                <ul role="list" class="mt-5 flex flex-col gap-3 text-sm">
                    @foreach ($column->children as $link)
                    <li><a href="{{ $link->url }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $link->text }}</a></li>
                    @endforeach
                </ul>
                @endif
            </nav>
            @endforeach

        </div>

        <div class="mt-16 flex flex-wrap items-center justify-between gap-4 border-t border-line pt-7 text-[13px] text-faint">
            <p>{{ $copyright }}</p>
            <p class="max-sm:hidden">{{ $note }}</p>
            <a href="#" class="tracking-[0.14em] uppercase transition-colors duration-200 hover:text-ink">{{ $backText }}</a>
        </div>
    </div>
</footer>
