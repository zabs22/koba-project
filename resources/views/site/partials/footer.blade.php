@php
    $explore = ['our-story', 'menu', 'cakes', 'experience', 'locations', 'contact'];
@endphp

<footer class="footer is-deep">
    <div class="footer__pattern" aria-hidden="true"></div>

    <div class="wrap">
        <div class="footer__top grid">
            <div class="footer__brand">
                <a href="{{ route('home') }}" aria-label="KOBA — {{ __('koba.nav.home') }}"><x-site.logo variant="light" /></a>
                <p class="footer__tagline">{{ __('koba.footer.tagline') }}</p>
            </div>

            <nav class="footer__col" aria-label="Footer">
                <h2 class="footer__title">{{ __('koba.footer.explore') }}</h2>
                <ul class="list-reset">
                    @foreach ($explore as $item)
                        <li><a class="u-link" href="{{ route($item) }}">{{ __("koba.nav.$item") }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <div class="footer__col">
                <h2 class="footer__title">{{ __('koba.footer.visit') }}</h2>
                <ul class="list-reset">
                    @foreach (trans('koba.locations.branches') as $branch)
                        <li>
                            <span class="footer__branch">{{ $branch['short'] }}</span>
                            <a class="u-link" href="tel:{{ str_replace(' ', '', $branch['phone']) }}">{{ $branch['phone'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__title">{{ __('koba.footer.contact') }}</h2>
                <ul class="list-reset">
                    <li><a class="u-link" href="mailto:{{ config('koba.email') }}">{{ config('koba.email') }}</a></li>
                </ul>
                <h2 class="footer__title footer__title--spaced">{{ __('koba.footer.follow') }}</h2>
                <ul class="list-reset footer__social">
                    @foreach (config('koba.social') as $network => $url)
                        <li><a class="u-link" href="{{ $url }}" rel="noopener" target="_blank">{{ $network }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="footer__word" aria-hidden="true">
            <span class="ethiopic">ኮባ</span>
            <x-site.mark />
        </div>

        <div class="footer__bottom">
            <p>{{ __('koba.footer.rights') }}</p>
            <p class="footer__signoff">{{ __('koba.footer.signoff') }} <strong>We Are KOBA.</strong></p>
        </div>
    </div>
</footer>
