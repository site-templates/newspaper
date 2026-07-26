@props(['items'])
<!--
    The full archive: every story from the articles collection as a ruled
    row — desk and date in the margin column, headline and standfirst in the
    middle, the photograph on the right.
-->
<section class="border-b border-line">
    <div class="mx-auto w-full max-w-7xl px-6 pb-16">
        @foreach ($items as $item)
        <article class="group border-b border-line last:border-0" data-reveal>
            <a href="{{ $item->link }}" class="grid gap-5 py-9 lg:grid-cols-[150px_1fr_280px] lg:gap-10">
                <span class="text-[11px] font-semibold tracking-[0.18em] uppercase">
                    <span class="block text-ink">{{ $item->category }}</span>
                    <span class="mt-1.5 block text-faint">{{ $item->date }}</span>
                </span>
                <span class="min-w-0 lg:pr-6">
                    <span class="headline-link block font-display text-2xl font-semibold leading-snug tracking-tight text-pretty sm:text-[1.75rem]">{{ $item->title }}</span>
                    <span class="mt-3 block max-w-2xl text-sm/6 text-muted">{{ $item->excerpt }}</span>
                    <span class="mt-4 flex items-center gap-2.5 text-xs text-faint">
                        <img src="{{ $item->authorImage }}" alt="" class="size-5 rounded-full object-cover" loading="lazy">
                        By {{ $item->author }} · {{ $item->readTime }}
                    </span>
                </span>
                <span class="photo block self-center border border-line max-lg:order-first">
                    <img src="{{ $item->image }}" alt="{{ $item->imageAlt }}" class="aspect-[3/2] w-full object-cover" loading="lazy">
                </span>
            </a>
        </article>
        @endforeach
    </div>
</section>
