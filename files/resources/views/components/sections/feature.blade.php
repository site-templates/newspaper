@props([
    'anchor' => '',
    'kicker' => 'The Weekend Feature',
    'heading' => 'The Blanket Menders of the Alps',
    'excerpt' => 'Every June, a small crew hikes up to wrap a dying glacier in white. It works — a little. The question is what working means now.',
    'linkText' => 'Read the dispatch',
    'link' => '/articles/blanket-menders-of-the-alps',
    'image' => '/images/glacier.jpg',
    'imageAlt' => 'An alpine glacier partly covered in white protective blankets',
    'credit' => 'Photograph by Milo Andrade for The Newspaper',
])
<!--
    The weekend feature: an oversized centered headline, then the photograph
    running the full width of the screen — the one moment the paper breaks
    its own margins.
-->
<section id="{{ $anchor }}" class="border-b border-line">
    <div class="pt-14 sm:pt-20">

        <div class="mx-auto w-full max-w-4xl px-6 text-center" data-reveal>
            <p class="text-[11px] font-semibold tracking-[0.22em] text-muted uppercase">{{ $kicker }}</p>
            <h2 class="mt-4 font-display text-4xl font-semibold leading-[1.05] tracking-tight text-balance sm:text-5xl lg:text-6xl">
                <a href="{{ $link }}" class="headline-link">{{ $heading }}</a>
            </h2>
            <p class="mx-auto mt-5 max-w-2xl text-base/7 text-pretty text-muted sm:text-lg/8">{{ $excerpt }}</p>
            <a href="{{ $link }}" class="mt-7 inline-flex items-center gap-2 border border-ink px-5 py-2.5 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas">{{ $linkText }} →</a>
        </div>

        <a href="{{ $link }}" class="mt-12 block sm:mt-16" data-reveal>
            <span class="photo block border-y border-line">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[3/2] w-full object-cover sm:aspect-[21/9]">
            </span>
        </a>
        <div class="mx-auto w-full max-w-7xl px-6 py-3.5">
            <p class="text-xs text-faint">{{ $credit }}</p>
        </div>

    </div>
</section>
