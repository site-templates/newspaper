@props([
    'anchor' => 'top',
    'mostReadHeading' => 'Most Read',
    'items',
])
<!--
    The front-page lead package, set like a broadsheet: a secondary column on
    the left, the lead story wide in the center, and the Most Read list on the
    right, separated by hairline column rules. Stories come from
    resources/data/collections/articles.json — the first item is the lead,
    the next two fill the left column, the rest are Most Read.
-->
<section id="{{ $anchor }}" class="border-b border-line">
    <div class="mx-auto w-full max-w-7xl px-6 py-10 sm:py-12">
        <div class="grid gap-10 lg:grid-cols-12 lg:gap-0">

            {{-- The secondary column --}}
            <div class="max-lg:order-2 max-lg:border-t max-lg:border-line max-lg:pt-8 lg:col-span-3 lg:border-r lg:border-line lg:pr-8">
                @foreach ($items as $item)
                @continue($loop->first)
                <article class="mb-7 border-b border-line pb-7 last:mb-0 last:border-0 last:pb-0">
                    <a href="{{ $item->link }}" class="photo block border border-line">
                        <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
                    </a>
                    <p class="mt-4 text-[11px] font-semibold tracking-[0.18em] text-muted uppercase">{{ $item->category }}</p>
                    <h3 class="mt-2 font-display text-xl font-semibold leading-snug text-pretty">
                        <a href="{{ $item->link }}" class="headline-link">{{ $item->title }}</a>
                    </h3>
                    <p class="mt-2.5 text-sm/6 text-muted">{{ $item->excerpt }}</p>
                    <p class="mt-3.5 text-xs text-faint">By {{ $item->author }} · {{ $item->readTime }}</p>
                </article>
                @break($loop->iteration == 3)
                @endforeach
            </div>

            {{-- The lead story --}}
            <div class="max-lg:order-1 lg:col-span-6 lg:px-10">
                @foreach ($items as $item)
                @continue(!$loop->first)
                <article data-reveal>
                    <a href="{{ $item->link }}" class="block">
                        <span class="photo block border border-line">
                            <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[16/10] w-full object-cover">
                        </span>
                        <span class="mt-2.5 block text-xs text-faint">{{ $item->imageAlt }}</span>
                    </a>
                    <p class="mt-5 text-[11px] font-semibold tracking-[0.18em] uppercase">
                        <a href="{{ $item->categoryUrl }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $item->category }}</a>
                    </p>
                    <h2 class="mt-3 font-display text-3xl font-semibold leading-[1.08] tracking-tight text-balance sm:text-4xl lg:text-[2.75rem]">
                        <a href="{{ $item->link }}" class="headline-link">{{ $item->title }}</a>
                    </h2>
                    <p class="mt-4 text-base/7 text-pretty text-muted">{{ $item->excerpt }}</p>
                    <div class="mt-5 flex items-center gap-2.5 text-[13px]">
                        <img src="{{ $item->authorImage }}" alt="" class="size-6 rounded-full object-cover" loading="lazy">
                        <p class="text-muted">By <span class="font-medium text-ink">{{ $item->author }}</span> <span class="text-faint">· {{ $item->date }} · {{ $item->readTime }}</span></p>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Most Read --}}
            <div class="max-lg:order-3 max-lg:border-t max-lg:border-line max-lg:pt-8 lg:col-span-3 lg:border-l lg:border-line lg:pl-8">
                <p class="border-b-2 border-ink pb-3 text-[11px] font-semibold tracking-[0.18em] text-ink uppercase">{{ $mostReadHeading }}</p>
                <ol role="list" class="most-read">
                    @foreach ($items as $item)
                    @continue($loop->iteration <= 3)
                    <li class="border-b border-line/70 last:border-0">
                        <a href="{{ $item->link }}" class="group flex gap-4 py-4.5">
                            <span class="min-w-0">
                                <span class="headline-link block font-display text-[17px] font-semibold leading-snug text-ink">{{ $item->title }}</span>
                                <span class="mt-1.5 block text-xs text-faint">{{ $item->author }} · {{ $item->readTime }}</span>
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</section>
