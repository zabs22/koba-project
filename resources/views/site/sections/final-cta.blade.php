<section class="final-cta section is-dark" aria-labelledby="final-cta-title">
    <x-site.leaf class="final-cta__leaf final-cta__leaf--a" data-parallax="0.08" />
    <x-site.leaf class="final-cta__leaf final-cta__leaf--b" data-parallax="-0.06" />

    <div class="wrap grid final-cta__grid">
        <div class="final-cta__heading">
            <x-site.heading id="final-cta-title" :text="__('koba.cta.title')" size="xl" />
        </div>
        <div class="final-cta__body">
            <p class="lede" data-reveal>{{ __('koba.cta.body') }}</p>
            <div class="final-cta__actions" data-reveal style="--d: 1">
                <a class="btn btn--sand" href="{{ route('order') }}">{{ __('koba.cta.order') }} <x-site.arrow /></a>
                <a class="btn btn--ghost" href="{{ route('menu') }}">{{ __('koba.cta.menu') }}</a>
                <a class="btn btn--ghost" href="{{ route('locations') }}">{{ __('koba.cta.find') }}</a>
            </div>
        </div>
    </div>
</section>
