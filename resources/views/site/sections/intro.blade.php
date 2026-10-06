<section class="intro section is-white" id="intro" aria-labelledby="intro-title">
    <x-site.leaf class="intro__leaf" data-parallax="-0.08" />

    <div class="wrap grid intro__grid">
        <p class="intro__label vertical-label" data-reveal>
            <span class="eyebrow eyebrow--plain">{{ __('koba.intro.eyebrow') }}</span>
            <span class="intro__est">{{ __('koba.intro.founded') }}</span>
        </p>

        <div class="intro__statement">
            <span class="intro__glyph ethiopic" aria-hidden="true" data-reveal="fade">ኮባ</span>
            <x-site.heading id="intro-title" :text="__('koba.intro.title')" size="mega" />
        </div>

        <figure class="intro__figure" data-parallax="0.06">
            <div class="media" data-reveal="media">
                <x-site.img src="drink-tea-pour" sizes="(min-width: 900px) 30vw, 80vw" />
            </div>
            <figcaption class="caption">{{ __('koba.intro.rituals.1') }}</figcaption>
        </figure>

        <div class="intro__body">
            <p class="lede" data-reveal>{{ __('koba.intro.body') }}</p>

            <ul class="intro__rituals list-reset">
                @foreach (trans('koba.intro.rituals') as $i => $ritual)
                    <li data-reveal style="--d: {{ $i + 1 }}"><x-site.mark /> {{ $ritual }}</li>
                @endforeach
            </ul>

            <a class="link" href="{{ route('our-story') }}" data-reveal style="--d: 4">{{ __('koba.nav.our-story') }} <x-site.arrow /></a>
        </div>
    </div>
</section>
