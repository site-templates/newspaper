@props([
    'title' => '',
    'standfirst' => '',
    'category' => 'News',
    'categoryUrl' => '/articles',
    'author' => '',
    'authorRole' => '',
    'authorImage' => '',
    'date' => '',
    'readTime' => '',
    'image' => '',
    'imageAlt' => '',
    'credit' => '',
    'dropcap' => '1',
    'related' => [],
])
<!--
    The shared chrome for a story: desk kicker, a big centered serif
    headline, the standfirst, the byline, the photograph with its credit,
    then your words. Write the body as plain HTML in the slot;
    resources/css/site.css styles it via the .prose class. Bind the articles
    collection to related and the same-desk stories appear underneath.
-->
<x-layouts.main :title="$title" :description="$standfirst">

    <article class="pt-12 pb-20 sm:pt-16">
        <div class="mx-auto w-full max-w-7xl px-6">

            <header class="mx-auto max-w-3xl text-center">
                <p class="text-[11px] font-semibold tracking-[0.22em] uppercase" data-reveal>
                    <a href="{{ $categoryUrl }}" class="text-muted transition-colors duration-200 hover:text-ink">{{ $category }}</a>
                </p>
                <h1 class="reveal-1 mt-4 font-display text-4xl font-semibold leading-[1.08] tracking-tight text-balance sm:text-5xl" data-reveal>{{ $title }}</h1>
                <p class="reveal-2 mx-auto mt-5 max-w-2xl text-lg/8 text-pretty text-muted" data-reveal>{{ $standfirst }}</p>

                <div class="reveal-3 mt-7 flex flex-wrap items-center justify-center gap-x-3 gap-y-2 text-[13px]" data-reveal>
                    @if ($authorImage)
                    <img src="{{ $authorImage }}" alt="" class="size-7 rounded-full object-cover">
                    @endif
                    <p class="text-muted">By <span class="font-medium text-ink">{{ $author }}</span>@if ($authorRole)<span class="text-faint">, {{ $authorRole }}</span>@endif</p>
                    <span aria-hidden="true" class="text-faint">·</span>
                    <p class="text-faint">{{ $date }}</p>
                    @if ($readTime)
                    <span aria-hidden="true" class="text-faint">·</span>
                    <p class="text-faint">{{ $readTime }}</p>
                    @endif
                </div>
            </header>

            @if ($image)
            <figure class="reveal-3 mx-auto mt-10 max-w-5xl sm:mt-14" data-reveal>
                <div class="photo border border-line">
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[3/2] w-full object-cover">
                </div>
                <figcaption class="mt-3 flex flex-wrap items-baseline justify-between gap-2 text-xs text-faint">
                    <span>{{ $imageAlt }}</span>
                    <span class="tracking-[0.08em] uppercase">{{ $credit }}</span>
                </figcaption>
            </figure>
            @endif

            @if ($dropcap == '1')
            <div class="prose prose-dropcap reveal-4 mx-auto mt-12 max-w-2xl sm:mt-14" data-reveal>{{ $slot }}</div>
            @else
            <div class="prose reveal-4 mx-auto mt-12 max-w-2xl sm:mt-14" data-reveal>{{ $slot }}</div>
            @endif

            @if ($related)
            <footer class="mx-auto mt-16 max-w-3xl border-t-2 border-ink pt-6 sm:mt-20">
                <p class="text-[11px] font-semibold tracking-[0.18em] text-muted uppercase">More from {{ $category }}</p>
                <div>
                    @foreach ($related as $item)
                    @continue($item->category != $category)
                    @continue($item->title == $title)
                    <a href="{{ $item->link }}" class="group flex items-baseline justify-between gap-6 border-b border-line/70 py-5 last:border-0">
                        <span class="min-w-0">
                            <span class="headline-link block font-display text-xl font-semibold leading-snug text-pretty">{{ $item->title }}</span>
                            <span class="mt-1.5 block text-xs text-faint">By {{ $item->author }} · {{ $item->date }} · {{ $item->readTime }}</span>
                        </span>
                        <span class="shrink-0 text-xs text-faint transition-transform duration-200 group-hover:translate-x-0.5">→</span>
                    </a>
                    @endforeach
                </div>
                <a href="/" class="mt-8 inline-flex items-center gap-2 border border-ink px-5 py-2.5 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas">← Back to the front page</a>
            </footer>
            @endif

        </div>
    </article>

</x-layouts.main>
