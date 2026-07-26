@props([
    'anchor' => '',
    'heading' => 'Technology',
    'category' => 'Technology',
    'linkText' => 'All stories',
    'linkUrl' => '/articles',
    'layout' => 'list',
    'items',
])
<!--
    A desk section: a ruled header, then every story from the articles
    collection whose desk matches the category field. Two arrangements — the
    "list" layout runs stories as ruled rows with the photograph on the
    right; "grid" sets them as two wide cards, photograph on top.
-->
<section id="{{ $anchor }}" class="border-b border-line">
    <div class="mx-auto w-full max-w-7xl px-6 py-12 sm:py-14">

        <div class="flex items-baseline justify-between gap-4 border-b-2 border-ink pb-4" data-reveal>
            <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">{{ $heading }}</h2>
            <a href="{{ $linkUrl }}" class="shrink-0 text-[11px] font-semibold tracking-[0.16em] text-muted uppercase transition-colors duration-200 hover:text-ink">{{ $linkText }} →</a>
        </div>

        @if ($layout == 'grid')
        <div class="grid gap-x-10 sm:grid-cols-2">
            @foreach ($items as $item)
            @continue($item->category != $category)
            <article class="group border-b border-line py-8 last:border-0 sm:border-0 sm:pb-0 sm:pt-10" data-reveal>
                <a href="{{ $item->link }}" class="block">
                    <span class="photo block border border-line">
                        <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
                    </span>
                    <span class="mt-5 block text-[11px] font-semibold tracking-[0.18em] text-muted uppercase">{{ $item->date }}</span>
                    <span class="headline-link mt-2.5 block font-display text-2xl font-semibold leading-snug tracking-tight text-pretty">{{ $item->title }}</span>
                    <span class="mt-3 block text-sm/6 text-muted">{{ $item->excerpt }}</span>
                    <span class="mt-4 block text-xs text-faint">By {{ $item->author }} · {{ $item->readTime }}</span>
                </a>
            </article>
            @endforeach
        </div>
        @else
        <div>
            @foreach ($items as $item)
            @continue($item->category != $category)
            <article class="group border-b border-line last:border-0" data-reveal>
                <a href="{{ $item->link }}" class="grid gap-6 py-8 sm:grid-cols-[1fr_260px] sm:items-center sm:gap-10">
                    <span class="min-w-0">
                        <span class="block text-[11px] font-semibold tracking-[0.18em] text-muted uppercase">{{ $item->date }}</span>
                        <span class="headline-link mt-2.5 block font-display text-2xl font-semibold leading-snug tracking-tight text-pretty sm:text-[1.65rem]">{{ $item->title }}</span>
                        <span class="mt-3 block max-w-2xl text-sm/6 text-muted">{{ $item->excerpt }}</span>
                        <span class="mt-4 block text-xs text-faint">By {{ $item->author }} · {{ $item->readTime }}</span>
                    </span>
                    <span class="photo block border border-line max-sm:order-first">
                        <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
                    </span>
                </a>
            </article>
            @endforeach
        </div>
        @endif

    </div>
</section>
