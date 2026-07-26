@props([
    'kicker' => 'Our Mission',
    'heading' => 'Slow the news down until it is true',
    'body1' => 'The Newspaper is an independent publication with one deadline: when the story is ready. We cover the quiet forces that actually shape how people live — housing, infrastructure, climate, culture, the machines humming behind everything — and we skip the outrage cycle entirely.',
    'body2' => 'No trackers, no autoplay, no twelve-part push alerts. Just reported stories, edited hard, published when they hold up. If a piece is on this front page, at least three people argued about every sentence in it.',
    'image' => '/images/newsroom.jpg',
    'imageAlt' => 'The newsroom in late afternoon light',
    'credit' => 'The newsroom, photographed on an ordinary Tuesday',
])
<!--
    The mission statement: the manifesto on the left, the newsroom photograph
    on the right. Used on the about page.
-->
<section class="border-b border-line">
    <div class="mx-auto grid w-full max-w-7xl gap-12 px-6 py-14 sm:py-16 lg:grid-cols-2 lg:items-center lg:gap-20">

        <div data-reveal>
            <p class="text-[11px] font-semibold tracking-[0.22em] text-muted uppercase">{{ $kicker }}</p>
            <h2 class="mt-4 font-display text-3xl font-semibold leading-[1.12] tracking-tight text-balance sm:text-4xl">{{ $heading }}</h2>
            <p class="mt-6 text-base/8 text-pretty text-muted">{{ $body1 }}</p>
            <p class="mt-5 text-base/8 text-pretty text-muted">{{ $body2 }}</p>
        </div>

        <figure class="reveal-1" data-reveal>
            <div class="photo border border-line">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
            </div>
            <figcaption class="mt-3 text-xs text-faint">{{ $credit }}</figcaption>
        </figure>

    </div>
</section>
