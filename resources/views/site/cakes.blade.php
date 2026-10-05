@php
    $cakes = trans('koba.cakes');
    $largest = fn ($key) => asset("images/koba/$key-".last(config("koba.images.$key")[2]).'.webp');
@endphp

<x-site.layout page="cakes" :title="__('koba.meta.pages.cakes')" :description="__('koba.cakes_page.lede')" image="cake-opera-caramel">
    <header class="cakes-hero">
        <div class="wrap grid cakes-hero__grid">
            <div class="cakes-hero__copy">
                <nav class="page-hero__crumbs" aria-label="Breadcrumb" data-reveal>
                    <a class="u-link" href="{{ route('home') }}">KOBA</a>
                    <span aria-hidden="true">/</span>
                    <span aria-current="page">{{ __('koba.cakes_page.eyebrow') }}</span>
                </nav>
                <x-site.heading :text="__('koba.cakes_page.title')" tag="h1" size="l" :delay="1" />
                <p class="lede" data-reveal style="--d: 4">{{ __('koba.cakes_page.lede') }}</p>
                <div class="btn-row" data-reveal style="--d: 5">
                    <a class="btn" href="{{ route('order') }}">{{ __('koba.cakes_page.cta') }} <x-site.arrow /></a>
                    <a class="link" href="#signature">{{ __('koba.cakes_feature.cta_explore') }}</a>
                </div>
            </div>
            <div class="cakes-hero__media">
                <div class="cakes-hero__main media" data-reveal="media">
                    <x-site.img src="cake-opera-chocolate" :eager="true" sizes="(min-width: 900px) 34vw, 70vw" position="50% 60%" />
                </div>
                <div class="cakes-hero__second media" data-reveal="media" style="--d: 3" data-parallax="-0.08">
                    <x-site.img src="opera-slice" sizes="(min-width: 900px) 18vw, 40vw" />
                </div>
            </div>
        </div>
    </header>

    {{-- The Signature Five — hover index --}}
    <section class="signature section is-white" id="signature" aria-labelledby="signature-title" data-feature>
        <div class="wrap">
            <header class="signature__head">
                <p class="eyebrow" data-reveal>{{ __('koba.cakes_page.featured_eyebrow') }}</p>
                <x-site.heading id="signature-title" :text="__('koba.cakes_page.featured_title')" size="l" />
            </header>

            <div class="grid signature__body">
                <ol class="list-reset signature__list">
                    @foreach ($cakes as $slug => $cake)
                        <li class="signature__item {{ $loop->first ? 'is-active' : '' }}" id="cake-{{ $slug }}" data-feature-item data-reveal style="--d: {{ $loop->index }}">
                            <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="signature__text">
                                <h3 class="signature__name">{{ $cake['name'] }}</h3>
                                <p class="signature__line">{{ $cake['line'] }}</p>
                                <div class="signature__inline media">
                                    <x-site.img :src="$cake['image']" sizes="90vw" />
                                </div>
                                <a class="link" href="{{ route('order', ['cake' => $slug]) }}">{{ __('koba.cakes_page.order_this') }} <x-site.arrow /></a>
                            </div>
                        </li>
                    @endforeach
                </ol>

                <div class="signature__frame-wrap" aria-hidden="true">
                    <div class="signature__frame media" data-reveal="media">
                        @foreach ($cakes as $cake)
                            <x-site.img :src="$cake['image']" class="{{ $loop->first ? 'is-active' : '' }}" data-feature-image alt="" sizes="(min-width: 900px) 42vw, 0px" position="50% 62%" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Occasions --}}
    <section class="occasions section--tight is-dark" aria-labelledby="occasions-title">
        <div class="wrap">
            <h2 id="occasions-title" class="eyebrow" data-reveal>{{ __('koba.cakes_page.occasions_eyebrow') }}</h2>
            <ul class="list-reset occasions__list">
                @foreach (trans('koba.cakes_page.occasions') as $occasion)
                    <li data-reveal style="--d: {{ $loop->index }}">
                        <span>{{ $occasion }}</span>
                        @unless ($loop->last)<x-site.mark />@endunless
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="gallery section" aria-labelledby="gallery-title" data-cake-dialog>
        <div class="wrap">
            <header class="grid gallery__head">
                <div class="gallery__heading">
                    <p class="eyebrow" data-reveal>{{ __('koba.cakes_page.gallery_eyebrow') }}</p>
                    <x-site.heading id="gallery-title" :text="__('koba.cakes_page.gallery_title')" size="l" />
                </div>
            </header>

            <ul class="list-reset gallery__grid">
                @foreach (trans('koba.gallery_cakes') as $item)
                    <li class="gallery__item gallery__item--{{ $loop->iteration }}">
                        <button class="gallery__button" type="button" data-lightbox data-full="{{ $largest($item['image']) }}" data-alt="{{ $item['alt'] }}" data-cursor="{{ __('koba.ui.view') }}">
                            <span class="media hover-zoom" data-reveal="media" style="--d: {{ $loop->index % 3 }}">
                                <x-site.img :src="$item['image']" :alt="$item['alt']" sizes="(min-width: 900px) 30vw, 45vw" position="50% 62%" />
                            </span>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <dialog class="lightbox" data-lightbox-dialog aria-label="{{ __('koba.cakes_page.gallery_eyebrow') }}">
            <figure class="lightbox__figure">
                <img class="lightbox__img" src="" alt="" data-lightbox-img>
                <figcaption class="lightbox__caption" data-lightbox-caption></figcaption>
            </figure>
            <div class="lightbox__controls">
                <button class="round-btn" type="button" data-lightbox-prev aria-label="{{ __('koba.ui.previous') }}"><x-site.arrow class="flip" /></button>
                <span class="index" data-lightbox-count></span>
                <button class="round-btn" type="button" data-lightbox-next aria-label="{{ __('koba.ui.next') }}"><x-site.arrow /></button>
            </div>
            <button class="lightbox__close link" type="button" data-lightbox-close>{{ __('koba.cakes_page.close') }}</button>
        </dialog>
    </section>

    {{-- Slices --}}
    <section class="slices section--tight is-white" aria-labelledby="slices-title">
        <div class="wrap grid slices__head">
            <div class="slices__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.cakes_page.slices_eyebrow') }}</p>
                <x-site.heading id="slices-title" :text="__('koba.cakes_page.slices_title')" size="m" />
            </div>
        </div>
        <ul class="list-reset wrap slices__row">
            @foreach (trans('koba.slices') as $slice)
                <li class="slices__item" data-parallax="{{ [0.03, -0.04, 0.05, -0.02, 0.04][$loop->index] }}">
                    <div class="media" data-reveal="media" style="--d: {{ $loop->index }}">
                        <x-site.img :src="$slice['image']" :alt="$slice['alt']" sizes="(min-width: 900px) 18vw, 60vw" />
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- How ordering works --}}
    <section class="steps section is-sand" aria-labelledby="steps-title">
        <div class="wrap">
            <h2 id="steps-title" class="eyebrow" data-reveal>{{ __('koba.cakes_page.steps_eyebrow') }}</h2>
            <ol class="list-reset steps__list">
                @foreach (trans('koba.cakes_page.steps') as $step)
                    <li class="steps__item" data-reveal style="--d: {{ $loop->index }}">
                        <span class="steps__no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="display display--s">{{ $step['title'] }}</h3>
                        <p>{{ $step['body'] }}</p>
                    </li>
                @endforeach
            </ol>
            <div class="steps__cta" data-reveal>
                <p class="display display--m">{{ __('koba.cakes_page.cta_title') }}</p>
                <a class="btn" href="{{ route('order') }}">{{ __('koba.cakes_page.cta') }} <x-site.arrow /></a>
            </div>
        </div>
    </section>
</x-site.layout>
