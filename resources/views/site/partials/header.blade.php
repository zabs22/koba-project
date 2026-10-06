@php
    $navItems = ['home', 'our-story', 'menu', 'cakes', 'experience', 'locations', 'contact'];
    $current = fn ($route) => request()->routeIs($route) ? 'page' : null;
@endphp

<header class="header" data-header>
    <div class="wrap header__inner">
        <a class="header__logo" href="{{ route('home') }}" aria-label="KOBA Patisserie and Bakery — {{ __('koba.nav.home') }}">
            <x-site.logo />
        </a>

        <nav class="nav" aria-label="Primary">
            <ul class="nav__list list-reset">
                @foreach ($navItems as $item)
                    <li>
                        <a class="nav__link" href="{{ route($item) }}" @if ($current($item)) aria-current="page" @endif>{{ __("koba.nav.$item") }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <a class="btn header__cta" href="{{ route('order') }}" @if ($current('order')) aria-current="page" @endif>
            {{ __('koba.ui.order_cake') }}
        </a>

        <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="overlay-menu" data-menu-toggle
                data-label-open="{{ __('koba.ui.menu_open') }}" data-label-close="{{ __('koba.ui.menu_close') }}" data-close-text="{{ __('koba.ui.close') }}">
            <span class="menu-toggle__text" data-menu-label aria-hidden="true">{{ __('koba.ui.menu') }}</span>
            <span class="menu-toggle__bars" aria-hidden="true"></span>
            <span class="sr-only" data-menu-sr>{{ __('koba.ui.menu_open') }}</span>
        </button>
    </div>
</header>

<div class="overlay-menu is-deep" id="overlay-menu" data-overlay-menu aria-label="Menu" role="dialog" aria-modal="true">
    <ul class="overlay-menu__list list-reset">
        @foreach ([...$navItems, 'order'] as $i => $item)
            <li class="overlay-menu__item" style="--i: {{ $i }}">
                <a class="overlay-menu__link" href="{{ route($item) }}" @if ($current($item)) aria-current="page" @endif>
                    <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    {{ $item === 'order' ? __('koba.ui.order_cake') : __("koba.nav.$item") }}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="overlay-menu__foot">
        <a class="u-link" href="mailto:{{ config('koba.email') }}">{{ config('koba.email') }}</a>
        <span>Sanford · Bole Atlas · 4 Killo</span>
    </div>
</div>
