@php($principles = trans('koba.philosophy.items'))

<section class="philosophy section is-dark" aria-labelledby="philosophy-title" data-principles>
    <div class="wrap">
        <header class="grid philosophy__head">
            <div class="philosophy__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.philosophy.eyebrow') }}</p>
                <x-site.heading id="philosophy-title" :text="__('koba.philosophy.title')" size="l" />
            </div>
            <p class="philosophy__hint" data-reveal>{{ __('koba.philosophy.hint') }}</p>
        </header>

        <div class="grid philosophy__body">
            <div class="philosophy__media" aria-hidden="true">
                <div class="philosophy__stack media" data-reveal="media">
                    @foreach ($principles as $i => $item)
                        <x-site.img :src="$item['image']" class="{{ $i === 0 ? 'is-active' : '' }}" data-principle-image="{{ $i }}" alt="" sizes="(min-width: 900px) 34vw, 90vw" />
                    @endforeach
                </div>
                <p class="philosophy__count index"><span data-principle-count>01</span> / {{ str_pad(count($principles), 2, '0', STR_PAD_LEFT) }}</p>
            </div>

            <ol class="philosophy__list list-reset">
                @foreach ($principles as $i => $item)
                    <li class="principle {{ $i === 0 ? 'is-active' : '' }}" data-principle="{{ $i }}" tabindex="0" data-reveal style="--d: {{ $i }}">
                        <span class="principle__index index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="principle__name">{{ $item['name'] }}</h3>
                        <div class="principle__more">
                            <p>{{ $item['line'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
