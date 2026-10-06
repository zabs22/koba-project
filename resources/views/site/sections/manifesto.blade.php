@php($fragments = trans('koba.manifesto.fragments'))

<section class="manifesto is-deep" aria-labelledby="manifesto-title" data-manifesto style="--steps: {{ count($fragments) + 2 }}">
    <div class="manifesto__stage">
        <div class="manifesto__texture" aria-hidden="true"></div>
        <x-site.leaf class="manifesto__leaf manifesto__leaf--a" />
        <x-site.leaf class="manifesto__leaf manifesto__leaf--b" />

        <div class="wrap manifesto__inner">
            <p class="eyebrow manifesto__eyebrow">{{ __('koba.manifesto.eyebrow') }}</p>

            <h2 id="manifesto-title" class="display manifesto__opening" data-step="0">
                <span>{{ __('koba.manifesto.opening.0') }}</span>
                <em>{{ __('koba.manifesto.opening.1') }}</em>
            </h2>

            <ol class="list-reset manifesto__fragments">
                @foreach ($fragments as $i => $fragment)
                    <li class="manifesto__fragment" data-step="{{ $i + 1 }}">
                        <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="manifesto__text">{{ $fragment }}</span>
                    </li>
                @endforeach
            </ol>

            <p class="manifesto__closing display" data-step="{{ count($fragments) + 1 }}">
                <x-site.mark />
                <span>{{ __('koba.manifesto.closing') }}</span>
            </p>

            <div class="manifesto__progress" aria-hidden="true">
                <span class="index" data-manifesto-count>00</span>
                <span class="manifesto__bar"><i data-manifesto-bar></i></span>
                <span class="index">{{ str_pad(count($fragments), 2, '0', STR_PAD_LEFT) }}</span>
            </div>
        </div>
    </div>
</section>
