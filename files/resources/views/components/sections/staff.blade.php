@props([
    'heading' => 'The Masthead',
    'subheading' => 'The people who argue over every sentence',
    'items',
])
<!--
    The staff grid — the paper's masthead as people. Rows come from
    resources/data/collections/staff.json.
-->
<section class="border-b border-line">
    <div class="mx-auto w-full max-w-7xl px-6 py-12 sm:py-14">

        <div class="flex items-baseline justify-between gap-4 border-b-2 border-ink pb-4" data-reveal>
            <h2 class="font-display text-2xl font-semibold tracking-tight sm:text-3xl">{{ $heading }}</h2>
            <p class="shrink-0 text-[11px] font-semibold tracking-[0.16em] text-muted uppercase max-sm:hidden">{{ $subheading }}</p>
        </div>

        <div class="grid grid-cols-2 gap-x-8 gap-y-10 pt-10 sm:grid-cols-3 lg:grid-cols-4">
            @foreach ($items as $item)
            <div class="flex items-center gap-4" data-reveal>
                <img src="{{ $item->avatar }}" alt="Portrait of {{ $item->name }}" class="size-13 shrink-0 rounded-full object-cover" loading="lazy">
                <div class="min-w-0">
                    <p class="truncate font-display text-lg font-semibold text-ink">{{ $item->name }}</p>
                    <p class="mt-0.5 text-xs tracking-[0.08em] text-muted uppercase">{{ $item->role }}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
