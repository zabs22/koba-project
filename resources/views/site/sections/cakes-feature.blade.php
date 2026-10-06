@php($cakes = trans('koba.cakes'))

<section class="cakes-feature section is-sand" aria-labelledby="cakes-feature-title">
    <x-site.leaf class="cakes-feature__leaf" data-parallax="0.1" />

    <div class="wrap">
        <header class="grid cakes-feature__head">
            <div class="cakes-feature__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.cakes_feature.eyebrow') }}</p>
                <x-site.heading id="cakes-feature-title" :text="__('koba.cakes_feature.title')" size="l" />
            </div>
            <div class="cakes-feature__intro">
                <p class="lede" data-reveal>{{ __('koba.cakes_feature.body') }}</p>
                <div class="btn-row" data-reveal style="--d: 1">
                    <a class="btn" href="{{ route('order') }}">{{ __('koba.cakes_feature.cta_order') }} <x-site.arrow /></a>
                    <a class="link" href="{{ route('cakes') }}">{{ __('koba.cakes_feature.cta_explore') }}</a>
                </div>
            </div>
        </header>
    </div>

    <div class="carousel" data-carousel>
        <ul class="carousel__track list-reset" tabindex="0" aria-label="{{ __('koba.cakes_page.featured_eyebrow') }}" data-carousel-track>
            @foreach ($cakes as $slug => $cake)
                <li class="carousel__slide">
                    <a class="cake-card" href="{{ route('cakes') }}#cake-{{ $slug }}" data-cursor="{{ __('koba.ui.discover') }}" draggable="false">
                        <div class="cake-card__media media hover-zoom">
                            <x-site.img :src="$cake['image']" sizes="(min-width: 900px) 30vw, 78vw" draggable="false" />
                        </div>
                        <div class="cake-card__meta">
                            <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }} / {{ str_pad(count($cakes), 2, '0', STR_PAD_LEFT) }}</span>
                            <h3 class="display display--s">{{ $cake['name'] }}</h3>
                            <p>{{ $cake['line'] }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="wrap carousel__controls">
            <div class="carousel__progress" aria-hidden="true"><span data-carousel-progress></span></div>
            <p class="carousel__hint">{{ __('koba.cakes_feature.drag') }}</p>
            <div class="carousel__buttons">
                <button class="round-btn" type="button" data-carousel-prev aria-label="{{ __('koba.ui.previous') }}"><x-site.arrow class="flip" /></button>
                <button class="round-btn" type="button" data-carousel-next aria-label="{{ __('koba.ui.next') }}"><x-site.arrow /></button>
            </div>
        </div>
    </div>
</section>
