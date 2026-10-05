{{--
    Inner-page opening.
    @param string      $eyebrow
    @param string      $title   heading syntax: "|" line breaks, *light*
    @param string|null $lede
    @param string|null $image   config/koba.php image key for the wide band
    @param string|null $position object-position for the band image
--}}
<header class="page-hero">
    <div class="wrap grid page-hero__grid">
        <nav class="page-hero__crumbs" aria-label="Breadcrumb" data-reveal>
            <a class="u-link" href="{{ route('home') }}">KOBA</a>
            <span aria-hidden="true">/</span>
            <span aria-current="page">{{ $eyebrow }}</span>
        </nav>

        <div class="page-hero__title">
            <x-site.heading :text="$title" tag="h1" size="xl" :delay="1" />
        </div>

        @isset($lede)
            <p class="lede page-hero__lede" data-reveal style="--d: 4">{{ $lede }}</p>
        @endisset
    </div>

    @isset($image)
        <div class="page-hero__band">
            <div class="media" data-reveal="media">
                <x-site.img :src="$image" :eager="true" sizes="100vw" :position="$position ?? '50% 50%'" data-parallax="-0.06" />
            </div>
        </div>
    @endisset
</header>
