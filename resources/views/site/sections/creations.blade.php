@php($categories = trans('koba.creations.categories'))

<section class="creations section" aria-labelledby="creations-title" data-tabs>
    <div class="wrap">
        <header class="grid creations__head">
            <div class="creations__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.creations.eyebrow') }}</p>
                <x-site.heading id="creations-title" :text="__('koba.creations.title')" size="l" />
            </div>
            <a class="link creations__more" href="{{ route('menu') }}" data-reveal>{{ __('koba.creations.cta') }} <x-site.arrow /></a>
        </header>

        <div class="tabs" role="tablist" aria-label="{{ __('koba.creations.eyebrow') }}" data-reveal>
            @foreach ($categories as $key => $category)
                <button class="tabs__tab" type="button" role="tab" id="tab-{{ $key }}" aria-controls="panel-{{ $key }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                    <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    {{ $category['label'] }}
                </button>
            @endforeach
            <span class="tabs__indicator" aria-hidden="true"></span>
        </div>

        <div class="creations__panels">
            @foreach ($categories as $key => $category)
                <div class="cpanel grid {{ $loop->first ? 'is-active' : '' }} {{ $category['images'] ? '' : 'cpanel--type' }}"
                     role="tabpanel" id="panel-{{ $key }}" aria-labelledby="tab-{{ $key }}" tabindex="0" @unless ($loop->first) hidden @endunless>

                    @if ($category['images'])
                        <a class="cpanel__feature media hover-zoom" href="{{ route($key === 'cakes' ? 'cakes' : 'menu') }}" data-cursor="{{ __('koba.ui.view') }}" tabindex="-1" aria-hidden="true">
                            <x-site.img :src="$category['images'][0]" sizes="(min-width: 900px) 55vw, 92vw" />
                        </a>
                    @else
                        <div class="cpanel__feature cpanel__poster is-dark">
                            <span class="cpanel__poster-label">{{ $category['label'] }}</span>
                            <ul class="list-reset cpanel__poster-list">
                                @foreach (array_slice($category['items'], 0, 4) as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                            <x-site.mark class="cpanel__poster-mark" />
                        </div>
                    @endif

                    <div class="cpanel__aside">
                        <p class="cpanel__no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</p>
                        <h3 class="display display--m">{{ $category['label'] }}</h3>
                        <p class="body-copy">{{ $category['line'] }}</p>
                        <ul class="list-reset cpanel__items">
                            @foreach ($category['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>

                        @if (count($category['images']) > 1)
                            <div class="cpanel__support media">
                                <x-site.img :src="$category['images'][1]" sizes="(min-width: 900px) 22vw, 60vw" />
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
