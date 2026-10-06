@php($quotes = trans('koba.voices.quotes'))

<section class="voices section is-white" aria-labelledby="voices-title">
    <div class="wrap grid voices__head">
        <div class="voices__heading">
            <p class="eyebrow" data-reveal>{{ __('koba.voices.eyebrow') }}</p>
            <x-site.heading id="voices-title" :text="__('koba.voices.title')" size="l" />
        </div>
    </div>

    <div class="marquee" data-marquee>
        <div class="marquee__track">
            @foreach ([false, true] as $duplicate)
                <ul class="list-reset marquee__group" @if ($duplicate) aria-hidden="true" @endif>
                    @foreach ($quotes as $quote)
                        <li class="quote">
                            <blockquote><p>“{{ $quote }}”</p></blockquote>
                            <x-site.mark class="quote__mark" />
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>

    <div class="marquee marquee--reverse" aria-hidden="true" data-marquee>
        <div class="marquee__track">
            @foreach ([1, 2] as $copy)
                <ul class="list-reset marquee__group">
                    @foreach (array_reverse($quotes) as $quote)
                        <li class="quote quote--quiet"><p>{{ $quote }}</p><span class="quote__dot"></span></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
</section>
