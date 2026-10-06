{{--
    Inner-page opening: full-bleed sliding photography under a KOBA-green gradient.
    @param string      $eyebrow
    @param string      $title    heading syntax: "|" line breaks, *highlight*
    @param string|null $lede
    @param array       $slides   image keys from config/koba.php, or [key, object-position]
    @param array       $actions  optional [[label, href, primary?], …]
    @param bool        $compact  shorter hero for task pages (order, contact)
--}}
@php
    $slides = collect($slides ?? [])->map(fn ($slide) => is_array($slide) ? $slide : [$slide, '50% 50%'])->values();
    $actions = $actions ?? [];
    $compact = $compact ?? false;
@endphp

<header class="page-hero {{ $compact ? 'page-hero--compact' : '' }}" data-hero-slider data-interval="7000">
    <div class="page-hero__slides" aria-hidden="true">
        @foreach ($slides as $i => [$key, $position])
            <div class="page-hero__slide {{ $i === 0 ? 'is-active' : '' }}" data-slide>
                <x-site.img :src="$key" :eager="$i === 0" alt="" sizes="100vw" :position="$position" />
            </div>
        @endforeach
    </div>
    <div class="page-hero__shade" aria-hidden="true"></div>
    <div class="page-hero__pattern" aria-hidden="true"></div>

    <div class="wrap page-hero__inner">
        <nav class="page-hero__crumbs" aria-label="Breadcrumb" data-reveal>
            <a class="u-link" href="{{ route('home') }}">KOBA</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $eyebrow }}</span>
        </nav>

        <div class="page-hero__title">
            <x-site.heading :text="$title" tag="h1" size="xl" :delay="1" />
        </div>

        @isset($lede)
            <p class="page-hero__lede" data-reveal style="--d: 4">{{ $lede }}</p>
        @endisset

        @if ($actions)
            <div class="btn-row page-hero__actions" data-reveal style="--d: 5">
                @foreach ($actions as $action)
                    <a class="btn {{ ($action[2] ?? false) ? 'btn--sand' : 'btn--ghost' }}" href="{{ $action[1] }}">
                        {{ $action[0] }} @if ($action[2] ?? false)<x-site.arrow />@endif
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    @if ($slides->count() > 1)
        <div class="page-hero__controls wrap">
            <ol class="list-reset page-hero__dots" aria-label="{{ __('koba.ui.slides') }}">
                @foreach ($slides as $i => $slide)
                    <li>
                        <button type="button" class="page-hero__dot {{ $i === 0 ? 'is-active' : '' }}" data-slide-to="{{ $i }}"
                                aria-label="{{ __('koba.ui.slide', ['n' => $i + 1, 'total' => $slides->count()]) }}" @if ($i === 0) aria-current="true" @endif>
                            <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <i aria-hidden="true"></i>
                        </button>
                    </li>
                @endforeach
            </ol>
            <button type="button" class="page-hero__pause" data-slide-pause
                    data-label-pause="{{ __('koba.ui.pause') }}" data-label-play="{{ __('koba.ui.play') }}" aria-label="{{ __('koba.ui.pause') }}">
                <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true"><path class="i-pause" d="M7 5h3v14H7zM14 5h3v14h-3z" fill="currentColor"/><path class="i-play" d="M8 5l11 7-11 7z" fill="currentColor"/></svg>
            </button>
        </div>
    @endif
</header>
