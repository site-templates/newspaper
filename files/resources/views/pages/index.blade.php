<!-- The front page — served at "/". Stories come from resources/data/collections/articles.json. -->
<x-layouts.main title="Home" description="The Newspaper — an independent record of the quiet forces shaping how we live." :menuItems="$articles">

    <x-sections.ticker :items="$ticker"/>

    <x-sections.lead :items="$articles"/>

    <x-sections.category-strip
        anchor="technology"
        heading="Technology"
        category="Technology"
        layout="list"
        :items="$articles"/>

    <x-sections.category-strip
        anchor="culture"
        heading="Culture"
        category="Culture"
        layout="grid"
        :items="$articles"/>

    <x-sections.feature anchor="climate"/>

    <x-sections.category-strip
        anchor="cities"
        heading="Cities"
        category="Cities"
        layout="list"
        :items="$articles"/>

    <x-sections.opinion :items="$opinions"/>

    <x-sections.newsletter/>

</x-layouts.main>
