<section class="craft section is-white" aria-labelledby="craft-title">
    <div class="wrap">
        <header class="grid craft__head">
            <div class="craft__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.craft.eyebrow') }}</p>
                <x-site.heading id="craft-title" :text="__('koba.craft.title')" size="l" />
            </div>
            <p class="lede craft__lede" data-reveal>“{{ __('koba.craft.body') }}”</p>
        </header>

        <ol class="craft__grid list-reset">
            @foreach (trans('koba.craft.items') as $i => $item)
                <li class="craft__item craft__item--{{ $i + 1 }}" data-parallax="{{ [0.04, -0.05, 0.07, -0.03, 0.05][$i] }}">
                    <figure>
                        <div class="media hover-zoom" data-reveal="media">
                            <x-site.img :src="$item['image']" sizes="(min-width: 900px) 40vw, 90vw" />
                        </div>
                        <figcaption class="craft__caption" data-reveal>
                            <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <strong class="display display--s">{{ $item['title'] }}</strong>
                            <span>{{ $item['line'] }}</span>
                        </figcaption>
                    </figure>
                </li>
            @endforeach
        </ol>
    </div>
</section>
