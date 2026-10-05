<section class="experience" aria-labelledby="experience-title" data-scrub>
    <div class="experience__sticky">
        <div class="experience__frame">
            <x-site.img src="drink-iced-latte-terrace" sizes="100vw" position="50% 46%" />
        </div>

        <div class="wrap experience__copy is-dark">
            <p class="eyebrow">{{ __('koba.experience.eyebrow') }}</p>
            <x-site.heading id="experience-title" :text="__('koba.experience.title')" size="xl" />
            <p class="lede">{{ __('koba.experience.body') }}</p>
            <a class="btn btn--cream" href="{{ route('experience') }}">{{ __('koba.experience.cta') }} <x-site.arrow /></a>
        </div>
    </div>
</section>
