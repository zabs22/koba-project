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

    {{-- The koba leaf band, with the croissant rising out of it in front. --}}
    <div class="hero__stage">
        <x-site.img src="hero-leaves" class="hero__leaves" :eager="true" alt="" sizes="100vw" />
        <div class="hero__subject">
            <x-site.img src="hero-croissant" :eager="true" sizes="(min-width: 900px) 52vw, 86vw" />
        </div>
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
