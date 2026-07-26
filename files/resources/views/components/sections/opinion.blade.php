@props([
    'anchor' => 'opinion',
    'heading' => 'Opinion',
    'subheading' => 'Columns from the desks',
    'items',
])
<!--
    The opinion row: three columnists' pull-quotes on a tinted band, divided
    by hairlines. Quotes come from resources/data/collections/opinions.json;
    each links to the column it is drawn from.
-->
<section id="{{ $anchor }}" class="border-b border-line bg-panel">
    <div class="mx-auto w-full max-w-7xl px-6 py-12 sm:py-14">

        <div class="flex items-baseline justify-between gap-4 border-b-2 border-ink pb-4" data-reveal>
            <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">{{ $heading }}</h2>
            <p class="shrink-0 text-[11px] font-semibold tracking-[0.16em] text-muted uppercase max-sm:hidden">{{ $subheading }}</p>
        </div>

        <div class="grid lg:grid-cols-3 lg:divide-x lg:divide-line max-lg:divide-y max-lg:divide-line">
            @foreach ($items as $item)
            <a href="{{ $item->link }}" class="group flex flex-col py-9 lg:px-9 lg:first:pl-0 lg:last:pr-0" data-reveal>
                <span aria-hidden="true" class="font-display text-5xl leading-none text-faint">“</span>
                <span class="mt-3 font-display text-xl leading-relaxed text-pretty text-ink">{{ $item->quote }}</span>
                <span class="mt-auto flex items-center gap-3 pt-7">
                    <img src="{{ $item->avatar }}" alt="" class="size-9 rounded-full object-cover" loading="lazy">
                    <span class="text-[13px]">
                        <span class="block font-medium text-ink">{{ $item->author }}</span>
                        <span class="block text-faint">{{ $item->role }}</span>
                    </span>
                    <span class="ml-auto text-xs text-faint transition-transform duration-200 group-hover:translate-x-0.5">→</span>
                </span>
            </a>
            @endforeach
        </div>

    </div>
</section>
