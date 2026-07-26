@props([
    'label' => 'The Wire',
    'items',
])
<!--
    The wire ticker: a labeled hairline band whose headlines drift left in a
    seamless loop (the run is rendered twice; site.css animates the track).
    Headlines come from resources/data/collections/ticker.json.
-->
<section class="border-b border-line" aria-label="Latest headlines">
    <div class="mx-auto flex w-full max-w-7xl items-center px-6">
        <p class="shrink-0 border-r border-line py-3 pr-5 text-[11px] font-semibold tracking-[0.18em] text-ink uppercase">{{ $label }}</p>
        <div class="relative min-w-0 flex-1 overflow-hidden py-3 pl-5 [mask-image:linear-gradient(to_right,transparent,black_5%,black_95%,transparent)]">
            <div class="ticker-track">
                <div class="flex items-center pr-10">
                    @foreach ($items as $item)
                    <a href="{{ $item->url }}" class="flex items-center whitespace-nowrap text-[13px] text-muted transition-colors duration-200 hover:text-ink">
                        {{ $item->text }}
                        <span aria-hidden="true" class="px-5 text-faint">///</span>
                    </a>
                    @endforeach
                </div>
                <div class="flex items-center pr-10" aria-hidden="true">
                    @foreach ($items as $item)
                    <a href="{{ $item->url }}" tabindex="-1" class="flex items-center whitespace-nowrap text-[13px] text-muted transition-colors duration-200 hover:text-ink">
                        {{ $item->text }}
                        <span aria-hidden="true" class="px-5 text-faint">///</span>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
