@php($sections = collect(trans('koba.menu_page.sections'))->only(['breakfast', 'sandwiches', 'salads', 'mains']))

<section class="menu-preview section is-cream-2" aria-labelledby="menu-preview-title" data-tabs>
    <div class="wrap grid">
        <div class="mp__intro">
            <p class="eyebrow" data-reveal>{{ __('koba.menu_preview.eyebrow') }}</p>
            <x-site.heading id="menu-preview-title" :text="__('koba.menu_preview.title')" size="l" />
            <p class="body-copy" data-reveal>{{ __('koba.menu_preview.body') }}</p>

            <div class="mp__tabs" role="tablist" aria-orientation="vertical" aria-label="{{ __('koba.menu_preview.eyebrow') }}" data-reveal>
                @foreach ($sections as $key => $section)
                    <button class="mp__tab" type="button" role="tab" id="mtab-{{ $key }}" aria-controls="mpanel-{{ $key }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}" tabindex="{{ $loop->first ? '0' : '-1' }}">
                        <span>{{ $section['label'] }}</span>
                        <span class="index">{{ str_pad(count($section['items']), 2, '0', STR_PAD_LEFT) }}</span>
                    </button>
                @endforeach
            </div>

            <a class="btn" href="{{ route('menu') }}" data-reveal>{{ __('koba.menu_preview.cta') }} <x-site.arrow /></a>
        </div>

        <div class="mp__panels">
            @foreach ($sections as $key => $section)
                <div class="mp__panel {{ $loop->first ? 'is-active' : '' }}" role="tabpanel" id="mpanel-{{ $key }}" aria-labelledby="mtab-{{ $key }}" @unless ($loop->first) hidden @endunless>
                    <p class="mp__line">{{ $section['line'] }}</p>
                    <ol class="list-reset mp__list">
                        @foreach (array_slice($section['items'], 0, 5) as $i => $item)
                            <li style="--i: {{ $i }}">
                                <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="mp__name">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>
</section>
