<x-site.layout page="experience" :title="__('koba.meta.pages.experience')" :description="__('koba.experience_page.lede')" image="drink-iced-mocha">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.experience_page.eyebrow'),
        'title' => __('koba.experience_page.title'),
        'lede' => __('koba.experience_page.lede'),
        'image' => 'drink-iced-latte',
        'position' => '50% 40%',
    ])

    {{-- A day at KOBA: morning → afternoon → evening --}}
    <div class="day" aria-label="{{ __('koba.experience_page.day_eyebrow') }}">
        @foreach (trans('koba.experience_page.day') as $i => $moment)
            <section class="moment moment--{{ $i + 1 }} section {{ ['', 'is-sand', 'is-dark'][$i] }}" aria-labelledby="moment-{{ $i }}">
                <div class="wrap grid moment__grid">
                    <div class="moment__copy">
                        <p class="moment__time" data-reveal>
                            <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} / 03</span>
                            <span>{{ $moment['time'] }}</span>
                        </p>
                        <x-site.heading id="moment-{{ $i }}" :text="$moment['title']" size="l" />
                        <p class="lede" data-reveal style="--d: 2">{{ $moment['body'] }}</p>
                    </div>
                    <div class="moment__media">
                        <div class="moment__main media" data-reveal="media">
                            <x-site.img :src="$moment['images'][0]" sizes="(min-width: 900px) 36vw, 80vw" />
                        </div>
                        <div class="moment__second media" data-reveal="media" style="--d: 3" data-parallax="-0.1">
                            <x-site.img :src="$moment['images'][1]" sizes="(min-width: 900px) 18vw, 40vw" />
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>

    {{-- Atmosphere --}}
    <section class="atmosphere section is-white" aria-labelledby="atmosphere-title">
        <div class="wrap">
            <header class="grid atmosphere__head">
                <div class="atmosphere__heading">
                    <p class="eyebrow" data-reveal>{{ __('koba.experience_page.atmosphere_eyebrow') }}</p>
                    <x-site.heading id="atmosphere-title" :text="__('koba.experience_page.atmosphere_title')" size="l" />
                </div>
                <p class="lede atmosphere__lede" data-reveal>{{ __('koba.experience_page.atmosphere_body') }}</p>
            </header>
            <ul class="list-reset atmosphere__grid">
                @foreach (['drink-iced-mocha', 'drink-layered-terrace', 'drink-iced-americano', 'drink-mocha', 'drink-pineapple-mojito', 'drink-red-juice'] as $image)
                    <li class="atmosphere__item atmosphere__item--{{ $loop->iteration }}" data-parallax="{{ [0.04, -0.06, 0.05, -0.04, 0.07, -0.03][$loop->index] }}">
                        <div class="media hover-zoom" data-reveal="media" style="--d: {{ $loop->index % 3 }}">
                            <x-site.img :src="$image" sizes="(min-width: 900px) 30vw, 45vw" />
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Hospitality --}}
    <section class="hospitality section is-cream-2" aria-label="{{ __('koba.experience_page.hospitality_eyebrow') }}">
        <div class="wrap grid">
            <p class="eyebrow hospitality__label" data-reveal>{{ __('koba.experience_page.hospitality_eyebrow') }}</p>
            <blockquote class="hospitality__quote">
                <p class="display display--l" data-reveal>“{{ __('koba.experience_page.hospitality') }}”</p>
            </blockquote>
        </div>
    </section>

    {{-- Behind the counter --}}
    <section class="counter section is-white" aria-labelledby="counter-title">
        <div class="wrap grid counter__grid">
            <div class="counter__media counter__media--a media" data-reveal="media">
                <x-site.img src="craft-lamination" sizes="(min-width: 900px) 30vw, 90vw" />
            </div>
            <div class="counter__media counter__media--b media" data-reveal="media" style="--d: 2">
                <x-site.img src="craft-glaze" sizes="(min-width: 900px) 20vw, 60vw" />
            </div>
            <div class="counter__copy">
                <p class="eyebrow" data-reveal>{{ __('koba.experience_page.craft_eyebrow') }}</p>
                <x-site.heading id="counter-title" :text="__('koba.experience_page.craft_title')" size="l" />
                <p class="lede" data-reveal>{{ __('koba.experience_page.craft_body') }}</p>
                <a class="link" href="{{ route('menu') }}" data-reveal>{{ __('koba.creations.cta') }} <x-site.arrow /></a>
            </div>
        </div>
    </section>

    @include('site.sections.voices')
    @include('site.sections.final-cta')
</x-site.layout>
