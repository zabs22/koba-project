@php
    $cakes = trans('koba.cakes');
    $steps = trans('koba.order.steps');
    $fields = trans('koba.order.fields');
    $selectedCake = old('cake', array_key_exists(request('cake'), $cakes) ? request('cake') : null);
    $tomorrow = now()->addDay()->toDateString();
    $describe = fn ($field, $hint = false) => trim(($hint ? "$field-hint " : '')."$field-error");
@endphp

<x-site.layout page="order" :title="__('koba.meta.pages.order')" :description="__('koba.order.lede')" image="cake-opera-caramel">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.order.eyebrow'),
        'title' => __('koba.order.title'),
        'lede' => __('koba.order.lede'),
        'slides' => [['cake-opera-caramel', '50% 58%'], ['cake-cheesecake', '50% 58%'], ['cake-vanilla', '50% 58%'], ['cake-chocolate-fudge', '50% 58%']],
        'compact' => true,
    ])

    <section class="order section--tight is-white" aria-label="{{ __('koba.order.eyebrow') }}">
        <div class="wrap grid order__grid">
            <aside class="order__aside">
                <ol class="list-reset order__progress" data-order-progress>
                    @foreach ([...$steps, __('koba.order.review')] as $i => $label)
                        <li class="{{ $i === 0 ? 'is-current' : '' }}" data-progress="{{ $i }}">
                            <span class="index">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <span>{{ $label }}</span>
                        </li>
                    @endforeach
                </ol>

                <div class="order__preview media" aria-hidden="true">
                    <div class="order__preview-blank is-active" data-preview="none"><x-site.mark /></div>
                    @foreach ($cakes as $slug => $cake)
                        <x-site.img :src="$cake['image']" alt="" data-preview="{{ $slug }}" sizes="(min-width: 900px) 26vw, 0px" position="50% 62%" />
                    @endforeach
                    <div class="order__preview-blank" data-preview="custom"><x-site.mark /></div>
                </div>

                <div class="order__talk">
                    <p class="order__talk-title">{{ __('koba.order.aside_title') }}</p>
                    <p class="body-copy">{{ __('koba.order.aside_body') }}</p>
                    <ul class="list-reset">
                        @foreach (trans('koba.locations.branches') as $branch)
                            <li><span>{{ $branch['short'] }}</span> <a class="u-link" href="tel:{{ str_replace(' ', '', $branch['phone']) }}">{{ $branch['phone'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>

            <div class="order__main">
                @if (session('status'))
                    <div class="order-success is-static" role="status">
                        <x-site.mark />
                        <h2 class="display display--l">{{ __('koba.order.success_title') }}</h2>
                        <p class="lede">{{ session('status') }}</p>
                    </div>
                @endif

                <form class="order-form" method="POST" action="{{ route('order.store') }}" novalidate data-order-form
                      data-msg-required="{{ __('koba.ui.required') }}"
                      data-msg-phone="{{ __('validation.regex', ['attribute' => $fields['phone']]) }}"
                      data-msg-date="{{ $fields['date_hint'] }}"
                      data-msg-step="{{ __('koba.order.step_of') }}"
                      data-msg-error="{{ __('koba.order.error') }}"
                      data-msg-sending="{{ __('koba.order.sending') }}">
                    @csrf

                    <p class="order-form__step-of index" data-step-of aria-live="polite"></p>

                    {{-- 01 · Your Details --}}
                    <fieldset class="ostep is-current" data-ostep="0">
                        <legend class="ostep__legend display display--m">{{ $steps[0] }}</legend>

                        <div class="field">
                            <label class="field__label" for="name">{{ $fields['name'] }}</label>
                            <input class="field__input" id="name" name="name" type="text" autocomplete="name" required maxlength="120"
                                   value="{{ old('name') }}" aria-describedby="{{ $describe('name') }}" @error('name') aria-invalid="true" @enderror>
                            <p class="field__error" id="name-error" data-error-for="name">@error('name'){{ $message }}@enderror</p>
                        </div>

                        <div class="field">
                            <label class="field__label" for="phone">{{ $fields['phone'] }}</label>
                            <input class="field__input" id="phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" required
                                   data-pattern="^\+?[0-9 ()\-]{9,20}$" value="{{ old('phone') }}" aria-describedby="{{ $describe('phone', true) }}" @error('phone') aria-invalid="true" @enderror>
                            <p class="field__hint" id="phone-hint">{{ $fields['phone_hint'] }}</p>
                            <p class="field__error" id="phone-error" data-error-for="phone">@error('phone'){{ $message }}@enderror</p>
                        </div>
                    </fieldset>

                    {{-- 02 · Your Cake --}}
                    <fieldset class="ostep" data-ostep="1">
                        <legend class="ostep__legend display display--m">{{ $steps[1] }}</legend>

                        <fieldset class="field" aria-describedby="cake-error">
                            <legend class="field__label">{{ $fields['cake'] }}</legend>
                            <div class="choices choices--cakes">
                                @foreach ($cakes as $slug => $cake)
                                    <label class="choice">
                                        <input type="radio" name="cake" value="{{ $slug }}" required @checked($selectedCake === $slug)>
                                        <span class="choice__media media">
                                            <x-site.img :src="$cake['image']" alt="" sizes="160px" position="50% 62%" />
                                        </span>
                                        <span class="choice__label">{{ $cake['name'] }}</span>
                                    </label>
                                @endforeach
                                <label class="choice choice--custom">
                                    <input type="radio" name="cake" value="custom" required @checked($selectedCake === 'custom')>
                                    <span class="choice__media choice__blank"><x-site.mark /></span>
                                    <span class="choice__label">{{ $fields['custom'] }}</span>
                                </label>
                            </div>
                            <p class="field__error" id="cake-error" data-error-for="cake">@error('cake'){{ $message }}@enderror</p>
                        </fieldset>

                        <fieldset class="field" aria-describedby="size-error">
                            <legend class="field__label">{{ $fields['size'] }}</legend>
                            <div class="pills">
                                @foreach (trans('koba.order.sizes') as $value => $label)
                                    <label class="pill">
                                        <input type="radio" name="size" value="{{ $value }}" required @checked(old('size') === $value)>
                                        <span>{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <p class="field__error" id="size-error" data-error-for="size">@error('size'){{ $message }}@enderror</p>
                        </fieldset>

                        <div class="field">
                            <label class="field__label" for="branch">{{ $fields['branch'] }}</label>
                            <div class="select">
                                <select class="field__input" id="branch" name="branch" required aria-describedby="branch-error" @error('branch') aria-invalid="true" @enderror>
                                    <option value="" disabled @selected(! old('branch'))>—</option>
                                    @foreach (trans('koba.locations.branches') as $key => $branch)
                                        <option value="{{ $key }}" @selected(old('branch') === $key)>{{ $branch['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="field__error" id="branch-error" data-error-for="branch">@error('branch'){{ $message }}@enderror</p>
                        </div>
                    </fieldset>

                    {{-- 03 · Your Date --}}
                    <fieldset class="ostep" data-ostep="2">
                        <legend class="ostep__legend display display--m">{{ $steps[2] }}</legend>
                        <div class="field">
                            <label class="field__label" for="date">{{ $fields['date'] }}</label>
                            <input class="field__input field__input--date" id="date" name="date" type="date" min="{{ $tomorrow }}" required
                                   value="{{ old('date') }}" aria-describedby="{{ $describe('date', true) }}" @error('date') aria-invalid="true" @enderror>
                            <p class="field__hint" id="date-hint">{{ $fields['date_hint'] }}</p>
                            <p class="field__error" id="date-error" data-error-for="date">@error('date'){{ $message }}@enderror</p>
                        </div>
                    </fieldset>

                    {{-- 04 · Your Request --}}
                    <fieldset class="ostep" data-ostep="3">
                        <legend class="ostep__legend display display--m">{{ $steps[3] }}</legend>
                        <div class="field">
                            <label class="field__label" for="notes">{{ $fields['notes'] }}</label>
                            <textarea class="field__input field__input--area" id="notes" name="notes" rows="5" maxlength="1000"
                                      aria-describedby="{{ $describe('notes', true) }}" @error('notes') aria-invalid="true" @enderror>{{ old('notes') }}</textarea>
                            <p class="field__hint" id="notes-hint">{{ $fields['notes_hint'] }} <span class="field__count" data-count-for="notes">0 / 1000</span></p>
                            <p class="field__error" id="notes-error" data-error-for="notes">@error('notes'){{ $message }}@enderror</p>
                        </div>
                    </fieldset>

                    {{-- Review --}}
                    <section class="ostep ostep--review" data-ostep="4" aria-labelledby="review-title">
                        <h2 id="review-title" class="ostep__legend display display--m">{{ __('koba.order.review') }}</h2>
                        <dl class="review" data-review>
                            @foreach ([['name', 0], ['phone', 0], ['cake', 1], ['size', 1], ['branch', 1], ['date', 2], ['notes', 3]] as [$field, $step])
                                <div class="review__row">
                                    <dt>{{ $fields[$field] }}</dt>
                                    <dd data-review-for="{{ $field }}">—</dd>
                                    <button class="review__edit link" type="button" data-goto="{{ $step }}">
                                        {{ __('koba.order.edit') }}<span class="sr-only"> {{ $fields[$field] }}</span>
                                    </button>
                                </div>
                            @endforeach
                        </dl>
                    </section>

                    <p class="form-error" role="alert" data-form-error hidden></p>

                    <div class="order-form__nav">
                        <button class="link order-form__back" type="button" data-prev>{{ __('koba.order.back') }}</button>
                        <button class="btn order-form__next" type="button" data-next>{{ __('koba.order.continue') }} <x-site.arrow /></button>
                        <button class="btn btn--sand order-form__submit" type="submit" data-submit>{{ __('koba.order.submit') }} <x-site.arrow /></button>
                    </div>
                </form>

                <div class="order-success" data-order-success hidden tabindex="-1">
                    <x-site.mark />
                    <h2 class="display display--l">{{ __('koba.order.success_title') }}</h2>
                    <p class="lede">{{ __('koba.order.success_body') }}</p>
                    <a class="link" href="{{ route('order') }}">{{ __('koba.order.success_again') }} <x-site.arrow /></a>
                </div>
            </div>
        </div>
    </section>
</x-site.layout>
