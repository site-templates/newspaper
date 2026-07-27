{{-- Dynamic page: one URL per entry of resources/data/collections/articles.json, matched on `slug` — $articles is the entry. Add an entry there to publish; its `content` HTML is the body. --}}
<x-layouts.article
    :title="$articles->title"
    :standfirst="$articles->excerpt"
    :category="$articles->category"
    :categoryUrl="$articles->categoryUrl"
    :author="$articles->author"
    :authorRole="$articles->authorRole"
    :authorImage="$articles->authorImage"
    :date="$articles->date"
    :readTime="$articles->readTime"
    :image="$articles->image"
    :imageAlt="$articles->imageAlt"
    :credit="$articles->credit"
    :related="$entries">

    {!! $articles->content !!}

</x-layouts.article>
