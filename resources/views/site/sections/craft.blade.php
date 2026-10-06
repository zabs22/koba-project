@php
    // Balance the masonry: place each photograph in the currently shortest
    // column, using its real proportions, so the three columns end level.
    $items = trans('koba.craft.items');
    $columns = [[], [], []];
    $heights = [0, 0, 0];
    foreach ($items as $i => $item) {
        [$w, $h] = config('koba.images.'.$item['image']);
        $shortest = array_search(min($heights), $heights);
        $columns[$shortest][] = $i;
        $heights[$shortest] += $h / $w;
    }
@endphp

<section class="craft section is-white" aria-labelledby="craft-title">
    <div class="wrap">
        <header class="grid craft__head">
            <div class="craft__heading">
                <p class="eyebrow" data-reveal>{{ __('koba.craft.eyebrow') }}</p>
                <x-site.heading id="craft-title" :text="__('koba.craft.title')" size="l" />
            </div>
            <p class="lede craft__lede" data-reveal>“{{ __('koba.craft.body') }}”</p>
        </header>

        {{-- Masonry: photographs keep their proportions and stack tightly. --}}
        <div class="craft__masonry">
            @foreach ($columns as $c => $indexes)
                <ol class="craft__col list-reset">
                    @foreach ($indexes as $i)
                        @php($item = $items[$i])
                        <li class="craft__tile">
                            <figure class="craft__figure media" data-reveal="media" style="--d: {{ $c + $loop->index }}">
                                <x-site.img :src="$item['image']" sizes="(min-width: 1100px) 31vw, (min-width: 600px) 46vw, 46vw" />
                                <figcaption class="craft__caption">
                                    <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                    <strong>{{ $item['title'] }}</strong>
                                    <span class="craft__line">{{ $item['line'] }}</span>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                </ol>
            @endforeach
        </div>
    </div>
</section>
