@props([
    'title' => null,
    'description' => null,
    'image' => 'croissant',
    'page' => 'home',
])

@php
    $metaTitle = $title ? $title.' | KOBA Patisserie & Bakery' : __('koba.meta.title');
    $metaDescription = $description ?? __('koba.meta.description');
    $ogImage = asset("images/koba/$image-960.webp");
    $branches = trans('koba.locations.branches');
    $hours = [
        'sanford' => '21:00',
        'bole-atlas' => '22:00',
        '4-killo' => '21:00',
    ];
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'KOBA Patisserie & Bakery',
        'url' => url('/'),
        'logo' => asset('images/brand/koba-logo.png'),
        'email' => config('koba.email'),
        'foundingDate' => '2020',
        'foundingLocation' => 'Addis Ababa, Ethiopia',
        'sameAs' => array_values(config('koba.social')),
        'subOrganization' => collect($branches)->map(fn ($branch, $key) => [
            '@type' => 'Bakery',
            'name' => $branch['name'],
            'telephone' => str_replace(' ', '', $branch['phone']),
            'servesCuisine' => ['Patisserie', 'Bakery', 'Café'],
            'address' => ['@type' => 'PostalAddress', 'addressLocality' => 'Addis Ababa', 'addressCountry' => 'ET'],
            'openingHoursSpecification' => [
                ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '07:00', 'closes' => $hours[$key]],
                ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Saturday', 'Sunday'], 'opens' => '06:00', 'closes' => '23:00'],
            ],
        ])->values()->all(),
    ];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="theme-color" content="#062e22">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="KOBA Patisserie & Bakery">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="en_ET">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..700&family=Montserrat:wght@200..900&family=Noto+Sans+Ethiopic:wght@300..600&display=swap">

    <script>
        (function (d) {
            var h = d.documentElement;
            h.classList.replace('no-js', 'js');
            try {
                if (sessionStorage.getItem('koba:transition')) {
                    h.classList.add('from-transition', 'no-loader');
                    sessionStorage.removeItem('koba:transition');
                } else if (sessionStorage.getItem('koba:visited')) {
                    h.classList.add('no-loader');
                }
            } catch (e) {}
            if (matchMedia('(prefers-reduced-motion: reduce)').matches) h.classList.add('no-loader');
        })(document);
    </script>

    @vite(['resources/css/site.css', 'resources/js/site.js'])

    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
</head>
<body data-page="{{ $page }}">
    <a class="skip-link" href="#main">{{ __('koba.ui.skip') }}</a>

    <div class="loader" aria-hidden="true">
        <div class="loader__inner">
            <x-site.logo variant="sand" />
            <span class="loader__bar"></span>
            <span class="loader__text">{{ __('koba.ui.loader') }}</span>
        </div>
    </div>

    <div class="curtain" aria-hidden="true"><x-site.mark /></div>

    @include('site.partials.header', ['page' => $page])

    <main id="main" tabindex="-1">
        {{ $slot }}
    </main>

    @include('site.partials.footer')

    <div class="cursor" aria-hidden="true"><span class="cursor__label"></span></div>
</body>
</html>
