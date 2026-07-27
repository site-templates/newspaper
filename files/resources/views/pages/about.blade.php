<!-- The about page — served at "/about". Staff come from resources/data/collections/staff.json. -->
<x-layouts.main title="About" description="Who makes The Newspaper, and why it reads the way it does." :menuItems="$articles">

    <x-sections.page-header
        eyebrow="About the Paper"
        heading="A newspaper, on purpose"
        body="Founded on the theory that attention is a finite resource and most of the news industry is strip-mining it."/>

    <x-sections.statement/>

    <x-sections.staff :items="$staff"/>

    <x-sections.newsletter/>

</x-layouts.main>
