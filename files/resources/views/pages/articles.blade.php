<!-- The archive — served at "/articles". Rows come from resources/data/collections/articles.json. -->
<x-layouts.main title="All Stories" description="Every story The Newspaper has published, newest first." :menuItems="$articles">

    <x-sections.page-header
        eyebrow="The Archive"
        heading="All Stories"
        body="Everything we have published, newest first. Eight stories so far — each one reported until it held up."/>

    <x-sections.archive :items="$articles"/>

    <x-sections.newsletter/>

</x-layouts.main>
