@props([
    'anchor' => 'newsletter',
    'kicker' => 'The Early Edition',
    'heading' => 'The morning, already read for you',
    'body' => 'One email at six. The three stories worth your coffee, chosen by the editors — never by the feed.',
    'placeholder' => 'you@example.com',
    'buttonText' => 'Sign up',
    'note' => 'Free forever. Unsubscribe any morning.',
])
<!--
    The newsletter band. The form is presentation-ready markup — point its
    action at your email provider when you wire one up.
-->
<section id="{{ $anchor }}" class="border-b border-line">
    <div class="mx-auto w-full max-w-2xl px-6 py-16 text-center sm:py-24" data-reveal>
        <p class="text-[11px] font-semibold tracking-[0.22em] text-muted uppercase">{{ $kicker }}</p>
        <h2 class="mt-4 font-display text-3xl font-semibold tracking-tight text-balance sm:text-4xl">{{ $heading }}</h2>
        <p class="mx-auto mt-4 max-w-md text-base/7 text-pretty text-muted">{{ $body }}</p>

        <form action="#" class="mx-auto mt-8 flex max-w-md items-stretch border border-ink p-1">
            <label for="newsletter-email" class="sr-only">Email address</label>
            <input
                id="newsletter-email"
                type="email"
                required
                placeholder="{{ $placeholder }}"
                class="min-w-0 flex-1 bg-transparent px-4 text-sm text-ink outline-none placeholder:text-faint">
            <button type="submit" class="shrink-0 cursor-pointer bg-ink px-5 py-3 text-[11px] font-semibold tracking-[0.16em] text-canvas uppercase transition-opacity duration-200 hover:opacity-85">{{ $buttonText }}</button>
        </form>

        <p class="mt-4 text-xs text-faint">{{ $note }}</p>
    </div>
</section>
