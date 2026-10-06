@php
    $categories = trans('koba.creations.categories');
    $dishImages = config('koba.dish_images');
    $cakeSlugs = array_keys(trans('koba.cakes'));

    // Where each dish lives: signature cakes on the Cakes page, drinks in the
    // menu's bar section, everything else at its own anchor on the Menu page.
    $dishLink = function (string $category, string $slug) use ($cakeSlugs) {
        return match (true) {
            $category === 'cakes' && in_array($slug, $cakeSlugs, true) => route('cakes').'#cake-'.$slug,
            $category === 'drinks' => route('menu').'#drinks',
            default => route('menu').'#dish-'.$slug,
        };
    };
    $categoryLink = fn (string $category) => match ($category) {
        'cakes' => route('cakes'),
        'drinks' => route('menu').'#drinks',
        default => route('menu').'#'.$category,
    };
@endphp

<section class="creations section" aria-labelledby="creations-title" data-tabs>
    <x-site.leaf class="creations__leaf" data-parallax="0.06" />

    <div class="wrap creations__wrap">
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
                @php
                    $dishes = collect($category['items'])->map(fn ($name) => [
                        'name' => $name,
                        'slug' => $slug = \Illuminate\Support\Str::slug($name),
                        'image' => $dishImages[$slug] ?? null,
                        'href' => $dishLink($key, $slug),
                    ]);
                @endphp

                <div class="cpanel grid {{ $loop->first ? 'is-active' : '' }}" data-dishes
                     role="tabpanel" id="panel-{{ $key }}" aria-labelledby="tab-{{ $key }}" tabindex="0" @unless ($loop->first) hidden @endunless>

                    @if ($category['images'])
                        <a class="cpanel__feature media" href="{{ $categoryLink($key) }}" data-cursor="{{ __('koba.ui.view') }}" tabindex="-1" aria-hidden="true">
                            <x-site.img :src="$category['images'][0]" class="cpanel__img is-active" data-dish-image="" alt="" sizes="(min-width: 900px) 55vw, 92vw" />
                            @foreach ($dishes->whereNotNull('image') as $dish)
                                <x-site.img :src="$dish['image']" class="cpanel__img" data-dish-image="{{ $dish['slug'] }}" alt="" sizes="(min-width: 900px) 55vw, 92vw" position="50% 58%" />
                            @endforeach
                            <span class="cpanel__caption" data-dish-caption>{{ $category['label'] }}</span>
                        </a>
                    @else
                        <div class="cpanel__feature cpanel__poster is-dark" aria-hidden="true">
                            <span class="cpanel__poster-label">{{ $category['label'] }}</span>
                            <ul class="list-reset cpanel__poster-list">
                                @foreach ($dishes as $dish)
                                    <li data-dish-poster="{{ $dish['slug'] }}">{{ $dish['name'] }}</li>
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
                            @foreach ($dishes as $dish)
                                <li>
                                    <a class="cpanel__dish" href="{{ $dish['href'] }}" data-dish="{{ $dish['slug'] }}" data-dish-name="{{ $dish['name'] }}">
                                        <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                        <span class="cpanel__dish-name">{{ $dish['name'] }}</span>
                                        <x-site.arrow />
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <a class="link cpanel__all" href="{{ $categoryLink($key) }}">{{ __('koba.creations.view_all', ['category' => $category['label']]) }} <x-site.arrow /></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
