<!-- The not-found page, set like a correction notice. -->
<x-layouts.main title="Page not found" description="That page is not in this edition.">

    <section class="border-b border-line">
        <div class="mx-auto flex min-h-[55vh] w-full max-w-2xl flex-col items-center justify-center px-6 py-20 text-center">
            <p class="text-[11px] font-semibold tracking-[0.22em] text-muted uppercase" data-reveal>Correction · Error 404</p>
            <h1 class="reveal-1 mt-4 font-display text-4xl font-semibold tracking-tight text-balance sm:text-5xl" data-reveal>This page never ran</h1>
            <p class="reveal-2 mx-auto mt-5 max-w-md text-base/7 text-pretty text-muted" data-reveal>
                The page you are looking for was cut for space, moved to a later
                edition, or never filed. The Newspaper regrets the error.
            </p>
            <div class="reveal-3 mt-9 flex flex-wrap items-center justify-center gap-3" data-reveal>
                <a href="/" class="border border-ink bg-ink px-5 py-2.5 text-[11px] font-semibold tracking-[0.16em] text-canvas uppercase transition-opacity duration-200 hover:opacity-85">Front page</a>
                <a href="/articles" class="border border-ink px-5 py-2.5 text-[11px] font-semibold tracking-[0.16em] uppercase transition-colors duration-200 hover:bg-ink hover:text-canvas">All stories</a>
            </div>
        </div>
    </section>

</x-layouts.main>
