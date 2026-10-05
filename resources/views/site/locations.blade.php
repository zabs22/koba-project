<x-site.layout page="locations" :title="__('koba.meta.pages.locations')" :description="__('koba.locations_page.lede')" image="drink-iced-latte-terrace">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.locations_page.eyebrow'),
        'title' => __('koba.locations_page.title'),
        'lede' => __('koba.locations_page.lede'),
    ])

    @include('site.sections.locations', ['full' => true])

    @include('site.sections.final-cta')
</x-site.layout>
