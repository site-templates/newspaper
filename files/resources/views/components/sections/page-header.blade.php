@props([
    'eyebrow' => '',
    'heading' => 'All Stories',
    'body' => '',
])
<!--
    A centered page opener: small-caps eyebrow, a big serif heading, and an
    optional standfirst. Used by the archive and about pages.
-->
<section>
    <div class="mx-auto w-full max-w-3xl px-6 pt-14 pb-12 text-center sm:pt-20 sm:pb-16" data-reveal>
        @if ($eyebrow)
        <p class="text-[11px] font-semibold tracking-[0.22em] text-muted uppercase">{{ $eyebrow }}</p>
        @endif
        <h1 class="mt-4 font-display text-4xl font-semibold tracking-tight text-balance sm:text-5xl">{{ $heading }}</h1>
        @if ($body)
        <p class="mx-auto mt-5 max-w-xl text-base/7 text-pretty text-muted sm:text-lg/8">{{ $body }}</p>
        @endif
    </div>
</section>
