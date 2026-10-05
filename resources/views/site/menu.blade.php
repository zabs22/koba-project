@php($sections = trans('koba.menu_page.sections'))

<x-site.layout page="menu" :title="__('koba.meta.pages.menu')" :description="__('koba.menu_page.lede')" image="almond-croissant">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.menu_page.eyebrow'),
        'title' => __('koba.menu_page.title'),
        'lede' => __('koba.menu_page.lede'),
    ])

    <div class="menu-bar" data-menu-bar>
        <div class="wrap menu-bar__inner">
            <nav class="menu-bar__nav" aria-label="{{ __('koba.menu_page.eyebrow') }}">
                <ul class="list-reset">
                    @foreach ($sections as $key => $section)
                        <li><a class="menu-bar__link" href="#{{ $key }}" data-spy="{{ $key }}">{{ $section['label'] }}</a></li>
                    @endforeach
                    <li><a class="menu-bar__link" href="#drinks" data-spy="drinks">{{ trans('koba.creations.categories.drinks.label') }}</a></li>
                </ul>
            </nav>
            <div class="menu-search" data-menu-search data-msg-results="{{ __('koba.menu_page.results') }}">
                <label class="sr-only" for="menu-search">{{ __('koba.menu_page.search') }}</label>
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><circle cx="11" cy="11" r="6.5" /><path d="m16 16 4.5 4.5" stroke-linecap="round" /></svg>
                <input id="menu-search" type="search" placeholder="{{ __('koba.menu_page.search_placeholder') }}" autocomplete="off" data-menu-input>
            </div>
        </div>
    </div>

    <p class="sr-only" role="status" aria-live="polite" data-menu-status></p>

    <div class="menu-sections">
        @foreach ($sections as $key => $section)
            <section class="menu-section section--tight {{ $loop->even ? 'is-white' : '' }}" id="{{ $key }}" aria-labelledby="menu-{{ $key }}" data-menu-section>
                <div class="wrap grid">
                    <div class="menu-section__aside">
                        <p class="index menu-section__no" data-reveal>{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                        <h2 id="menu-{{ $key }}" class="display display--l" data-reveal>{{ $section['label'] }}</h2>
                        <p class="menu-section__line" data-reveal>{{ $section['line'] }}</p>
                        <p class="menu-section__count" data-reveal>{{ trans_choice('koba.menu_page.count', count($section['items'])) }}</p>
                        @if ($section['image'])
                            <div class="menu-section__media media" data-reveal="media">
                                <x-site.img :src="$section['image']" sizes="(min-width: 900px) 28vw, 80vw" />
                            </div>
                        @else
                            <x-site.mark class="menu-section__mark" />
                        @endif
                    </div>

                    <ol class="list-reset menu-list">
                        @foreach ($section['items'] as $item)
                            <li class="menu-item" data-menu-item data-name="{{ \Illuminate\Support\Str::lower(\Illuminate\Support\Str::ascii($item)) }}">
                                <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="menu-item__name">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </section>
        @endforeach

        <p class="menu-empty wrap" hidden data-menu-empty>{{ __('koba.menu_page.empty') }}</p>
    </div>

    {{-- From the bar --}}
    <section class="drinks section is-dark" id="drinks" aria-labelledby="drinks-title" data-menu-section>
        <div class="wrap">
            <header class="grid drinks__head">
                <div class="drinks__heading">
                    <p class="eyebrow" data-reveal>{{ __('koba.menu_page.drinks_eyebrow') }}</p>
                    <x-site.heading id="drinks-title" :text="__('koba.menu_page.drinks_title')" size="l" />
                </div>
                <p class="lede drinks__lede" data-reveal>{{ __('koba.menu_page.drinks_line') }}</p>
            </header>

            <ul class="list-reset drinks__grid">
                @foreach (trans('koba.menu_page.drinks') as $drink)
                    <li class="drink" data-menu-item data-name="{{ \Illuminate\Support\Str::lower($drink['label']) }}" data-cursor="{{ __('koba.ui.view') }}">
                        <figure>
                            <div class="media hover-zoom" data-reveal="media" style="--d: {{ $loop->index % 5 }}">
                                <x-site.img :src="$drink['image']" sizes="(min-width: 900px) 20vw, 45vw" />
                            </div>
                            <figcaption>{{ $drink['label'] }}</figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="band is-sand" aria-label="{{ __('koba.menu_page.cake_cta_title') }}">
        <div class="wrap band__inner">
            <p class="display display--m" data-reveal>{{ __('koba.menu_page.cake_cta_title') }}</p>
            <a class="btn" href="{{ route('order') }}" data-reveal>{{ __('koba.menu_page.cake_cta') }} <x-site.arrow /></a>
        </div>
    </section>
</x-site.layout>
