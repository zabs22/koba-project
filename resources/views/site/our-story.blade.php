<x-site.layout page="our-story" :title="__('koba.meta.pages.our-story')" :description="__('koba.story.lede')" image="craft-crumb">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.story.eyebrow'),
        'title' => __('koba.story.title'),
        'lede' => __('koba.story.lede'),
        'slides' => [['croissant', '50% 55%'], ['craft-almond', '50% 45%'], ['craft-crumb', '50% 50%'], ['opera-slice', '50% 60%']],
    ])

    {{-- Chapters --}}
    <section class="chapters section is-white" aria-label="{{ __('koba.story.eyebrow') }}">
        <div class="wrap">
            @foreach (trans('koba.story.chapters') as $i => $chapter)
                <article class="chapter grid {{ $i % 2 ? 'chapter--flip' : '' }}">
                    <p class="chapter__no" data-reveal>{{ $chapter['no'] }}</p>
                    <div class="chapter__copy">
                        <x-site.heading :text="$chapter['title']" tag="h2" size="m" />
                        <p class="body-copy" data-reveal style="--d: 2">{{ $chapter['body'] }}</p>
                    </div>
                    <figure class="chapter__media" data-parallax="{{ $i % 2 ? '-0.05' : '0.05' }}">
                        <div class="media" data-reveal="media">
                            <x-site.img :src="$chapter['image']" sizes="(min-width: 900px) 40vw, 90vw" />
                        </div>
                    </figure>
                </article>
            @endforeach
        </div>
    </section>

    {{-- The name: ኮባ --}}
    <section class="namesake section is-sand" aria-labelledby="namesake-title">
        <x-site.leaf class="namesake__leaf" data-parallax="0.08" />
        <div class="wrap grid namesake__grid">
            <div class="namesake__mark" data-reveal="draw">
                <x-site.mark />
                <span class="ethiopic namesake__glyph" aria-hidden="true">ኮባ</span>
            </div>
            <div class="namesake__copy">
                <p class="eyebrow" data-reveal>{{ __('koba.story.leaf_eyebrow') }}</p>
                <x-site.heading id="namesake-title" :text="__('koba.story.leaf_title')" size="l" />
                @foreach (trans('koba.story.leaf_body') as $paragraph)
                    <p class="body-copy" data-reveal style="--d: {{ $loop->iteration }}">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Purpose, mission, vision --}}
    <section class="statements section is-dark" aria-label="{{ __('koba.story.purpose_eyebrow') }}">
        <div class="wrap">
            @foreach (['purpose', 'mission', 'vision'] as $key)
                <div class="statement grid">
                    <p class="eyebrow statement__label" data-reveal>{{ __("koba.story.{$key}_eyebrow") }}</p>
                    <p class="statement__text" data-reveal style="--d: 1">{{ __("koba.story.$key") }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Values --}}
    <section class="values section" aria-labelledby="values-title">
        <div class="wrap">
            <header class="grid values__head">
                <div class="values__heading">
                    <p class="eyebrow" data-reveal>{{ __('koba.story.values_eyebrow') }}</p>
                    <x-site.heading id="values-title" :text="__('koba.story.values_title')" size="l" />
                </div>
            </header>
            <ol class="list-reset values__list">
                @foreach (trans('koba.story.values') as $value)
                    <li class="value grid" data-reveal>
                        <span class="index value__index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="value__name display display--m">{{ $value['name'] }}</h3>
                        <p class="value__body body-copy">{{ $value['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- The Creator --}}
    <section class="creator section--tight is-white" aria-label="{{ __('koba.story.creator_eyebrow') }}">
        <div class="wrap grid creator__grid">
            <figure class="creator__media media" data-reveal="media">
                <x-site.img src="craft-finish" sizes="(min-width: 900px) 35vw, 90vw" />
            </figure>
            <blockquote class="creator__quote">
                <p class="eyebrow" data-reveal>{{ __('koba.story.creator_eyebrow') }}</p>
                <p class="creator__text" data-reveal style="--d: 1">{{ __('koba.story.creator') }}</p>
            </blockquote>
        </div>
    </section>

    @include('site.sections.final-cta')
</x-site.layout>
