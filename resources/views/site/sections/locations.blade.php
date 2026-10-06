@php
    $branches = trans('koba.locations.branches');
    $full = $full ?? false;
    $mapsUrl = fn ($query) => 'https://www.google.com/maps/search/?api=1&query='.urlencode($query);
@endphp

<section class="locations section {{ $full ? 'locations--full' : '' }}" aria-labelledby="locations-title" data-locations>
    <div class="wrap">
        @unless ($full)
            <header class="grid locations__head">
                <div class="locations__heading">
                    <p class="eyebrow" data-reveal>{{ __('koba.locations.eyebrow') }}</p>
                    <x-site.heading id="locations-title" :text="__('koba.locations.title')" size="l" />
                </div>
                <p class="lede locations__lede" data-reveal>{{ __('koba.locations.body') }}</p>
            </header>
        @else
            <h2 id="locations-title" class="sr-only">{{ __('koba.locations.eyebrow') }}</h2>
        @endunless

        <div class="grid locations__body">
            <ol class="list-reset locations__list">
                @foreach ($branches as $slug => $branch)
                    <li class="branch {{ $loop->first ? 'is-active' : '' }}" id="{{ $slug }}" data-branch="{{ $loop->index }}" data-reveal style="--d: {{ $loop->index }}">
                        <div class="branch__head">
                            <span class="index">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="branch__mood">{{ $branch['mood'] }}</p>
                        </div>
                        <h3 class="branch__name display display--m">
                            <a href="{{ route('locations') }}#{{ $slug }}" data-cursor="{{ __('koba.ui.explore') }}">{{ $branch['short'] }}</a>
                        </h3>
                        <div class="branch__detail">
                          <div class="branch__detail-inner">
                            <p class="branch__tagline">{{ $branch['tagline'] }}</p>
                            <p class="body-copy">{{ $branch['body'] }}</p>
                            <div class="branch__actions">
                                <a class="branch__phone" href="tel:{{ str_replace(' ', '', $branch['phone']) }}">
                                    <span class="sr-only">{{ __('koba.ui.call') }} {{ $branch['name'] }}:</span>{{ $branch['phone'] }}
                                </a>
                                @unless ($full)
                                    <a class="link" href="{{ route('locations') }}#{{ $slug }}">{{ __('koba.ui.view_location') }}</a>
                                @endunless
                                <a class="link" href="{{ $mapsUrl($branch['maps']) }}" target="_blank" rel="noopener">{{ __('koba.ui.directions') }} <x-site.arrow /></a>
                            </div>

                            @if ($full)
                                <div class="branch__map" data-map data-src="https://www.google.com/maps?q={{ urlencode($branch['maps']) }}&output=embed" data-title="{{ $branch['name'] }}">
                                    <button class="btn btn--ghost" type="button" data-map-load>{{ __('koba.locations.map_show') }}</button>
                                    <p class="branch__map-note">{{ __('koba.locations.map_note') }}</p>
                                </div>
                            @endif
                          </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            <div class="locations__media" aria-hidden="true">
                <div class="locations__frame media" data-reveal="media">
                    @foreach ($branches as $branch)
                        <x-site.img :src="$branch['image']" class="{{ $loop->first ? 'is-active' : '' }}" data-branch-image="{{ $loop->index }}" alt="" sizes="(min-width: 900px) 40vw, 90vw" />
                    @endforeach
                </div>
                <p class="locations__mood display display--s">
                    @foreach ($branches as $branch)
                        <span class="{{ $loop->first ? 'is-active' : '' }}" data-branch-mood="{{ $loop->index }}">{{ $branch['mood'] }}.</span>
                    @endforeach
                </p>
            </div>
        </div>

        <div class="hours" aria-labelledby="hours-title">
            <h3 id="hours-title" class="eyebrow">{{ __('koba.locations.hours_title') }}</h3>
            <dl class="hours__list">
                @foreach (trans('koba.locations.hours') as $row)
                    <div class="hours__row" data-reveal style="--d: {{ $loop->index }}">
                        <dt>
                            <span class="hours__where">{{ $row['where'] }}</span>
                            <span class="hours__days">{{ $row['days'] }}</span>
                        </dt>
                        <dd class="display display--s">{{ $row['time'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </div>
</section>
