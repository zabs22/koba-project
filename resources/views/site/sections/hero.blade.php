<section class="hero" aria-labelledby="hero-title" data-hero>
    <div class="hero__copy">
        <p class="eyebrow" data-reveal style="--d: 1">{{ __('koba.hero.eyebrow') }}</p>

        <h1 id="hero-title" class="display hero__title" data-reveal="lines" style="--d: 2">
            @foreach (trans('koba.hero.lines') as $i => $line)
                <span class="line"><span style="--l: {{ $i }}">
                    @if ($line['weight'] === 'light')<em>{{ $line['text'] }}</em>@else{{ $line['text'] }}@endif
                </span></span>
            @endforeach
        </h1>

        <p class="lede hero__lede" data-reveal style="--d: 6">{{ __('koba.hero.sub') }}</p>

        <div class="btn-row" data-reveal style="--d: 7">
            <a class="btn" href="{{ route('menu') }}">{{ __('koba.hero.cta_menu') }} <x-site.arrow /></a>
            <a class="btn btn--ghost" href="{{ route('order') }}">{{ __('koba.hero.cta_cake') }}</a>
        </div>
    </div>

    <div class="hero__media">
        <div class="hero__frame media" data-mouse="10">
            <x-site.img src="croissant" :eager="true" sizes="(min-width: 768px) 60vw, 100vw" position="50% 54%" />
        </div>

        <figure class="hero__inset" data-mouse="-16">
            <div class="media">
                <x-site.img src="drink-flat-white" sizes="200px" position="50% 60%" />
            </div>
            <figcaption>{{ __('koba.intro.rituals.0') }}</figcaption>
        </figure>

        <p class="hero__caption">
            <span class="index">{{ __('koba.hero.caption_no') }}</span>
            <span>{{ __('koba.hero.caption') }}</span>
        </p>
    </div>

    <a class="hero__scroll" href="#intro">
        <span>{{ __('koba.ui.scroll') }}</span>
        <i aria-hidden="true"></i>
    </a>
</section>
