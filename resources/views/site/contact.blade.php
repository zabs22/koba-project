@php($fields = trans('koba.contact.fields'))

<x-site.layout page="contact" :title="__('koba.meta.pages.contact')" :description="__('koba.contact.lede')" image="drink-cappuccino">
    @include('site.partials.page-hero', [
        'eyebrow' => __('koba.contact.eyebrow'),
        'title' => __('koba.contact.title'),
        'lede' => __('koba.contact.lede'),
        'slides' => [['drink-cappuccino', '50% 55%'], ['drink-chocolate-pour', '50% 55%'], ['drink-mocha', '50% 55%']],
        'compact' => true,
    ])

    <section class="contact section--tight is-white" aria-label="{{ __('koba.contact.eyebrow') }}">
        <div class="wrap grid contact__grid">
            <div class="contact__details">
                <div class="contact__block" data-reveal>
                    <h2 class="eyebrow">{{ __('koba.contact.by_phone') }}</h2>
                    <ul class="list-reset contact__phones">
                        @foreach (trans('koba.locations.branches') as $branch)
                            <li>
                                <span class="contact__branch">{{ $branch['name'] }}</span>
                                <a class="contact__phone" href="tel:{{ str_replace(' ', '', $branch['phone']) }}">{{ $branch['phone'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="contact__block" data-reveal style="--d: 1">
                    <h2 class="eyebrow">{{ __('koba.contact.by_email') }}</h2>
                    <a class="contact__email u-link" href="mailto:{{ config('koba.email') }}">{{ config('koba.email') }}</a>
                </div>
                <div class="contact__block contact__cake" data-reveal style="--d: 2">
                    <div class="contact__cake-media media">
                        <x-site.img src="cake-cheesecake" sizes="160px" position="50% 62%" />
                    </div>
                    <div>
                        <p class="contact__cake-title">{{ __('koba.contact.cake_hint') }}</p>
                        <a class="link" href="{{ route('order') }}">{{ __('koba.contact.cake_hint_cta') }} <x-site.arrow /></a>
                    </div>
                </div>
            </div>

            <div class="contact__form-wrap">
                @if (session('status'))
                    <div class="order-success is-static" role="status">
                        <x-site.mark />
                        <h2 class="display display--m">{{ __('koba.contact.success_title') }}</h2>
                        <p class="lede">{{ session('status') }}</p>
                    </div>
                @endif

                <form class="enquiry-form" method="POST" action="{{ route('contact.store') }}" novalidate data-enquiry-form
                      data-msg-required="{{ __('koba.ui.required') }}"
                      data-msg-error="{{ __('koba.contact.error') }}"
                      data-msg-sending="{{ __('koba.contact.sending') }}">
                    @csrf
                    <h2 class="display display--m enquiry-form__title">{{ __('koba.contact.form_title') }}</h2>

                    <div class="enquiry-form__row">
                        <div class="field">
                            <label class="field__label" for="c-name">{{ $fields['name'] }}</label>
                            <input class="field__input" id="c-name" name="name" type="text" autocomplete="name" required maxlength="120" value="{{ old('name') }}" aria-describedby="c-name-error">
                            <p class="field__error" id="c-name-error" data-error-for="name">@error('name'){{ $message }}@enderror</p>
                        </div>
                        <div class="field">
                            <label class="field__label" for="c-email">{{ $fields['email'] }}</label>
                            <input class="field__input" id="c-email" name="email" type="email" autocomplete="email" required maxlength="180" value="{{ old('email') }}" aria-describedby="c-email-error">
                            <p class="field__error" id="c-email-error" data-error-for="email">@error('email'){{ $message }}@enderror</p>
                        </div>
                    </div>

                    <div class="enquiry-form__row">
                        <div class="field">
                            <label class="field__label" for="c-phone">{{ $fields['phone'] }}</label>
                            <input class="field__input" id="c-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" data-pattern="^\+?[0-9 ()\-]{9,20}$" value="{{ old('phone') }}" aria-describedby="c-phone-error">
                            <p class="field__error" id="c-phone-error" data-error-for="phone">@error('phone'){{ $message }}@enderror</p>
                        </div>
                        <div class="field">
                            <label class="field__label" for="c-branch">{{ $fields['branch'] }}</label>
                            <div class="select">
                                <select class="field__input" id="c-branch" name="branch" aria-describedby="c-branch-error">
                                    <option value="">{{ __('koba.contact.any_branch') }}</option>
                                    @foreach (trans('koba.locations.branches') as $key => $branch)
                                        <option value="{{ $key }}" @selected(old('branch') === $key)>{{ $branch['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="field__error" id="c-branch-error" data-error-for="branch">@error('branch'){{ $message }}@enderror</p>
                        </div>
                    </div>

                    <fieldset class="field" aria-describedby="c-topic-error">
                        <legend class="field__label">{{ $fields['topic'] }}</legend>
                        <div class="pills">
                            @foreach (trans('koba.contact.topics') as $value => $label)
                                <label class="pill">
                                    <input type="radio" name="topic" value="{{ $value }}" required @checked(old('topic', 'general') === $value)>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                        <p class="field__error" id="c-topic-error" data-error-for="topic">@error('topic'){{ $message }}@enderror</p>
                    </fieldset>

                    <div class="field">
                        <label class="field__label" for="c-message">{{ $fields['message'] }}</label>
                        <textarea class="field__input field__input--area" id="c-message" name="message" rows="6" required minlength="10" maxlength="2000" aria-describedby="c-message-error">{{ old('message') }}</textarea>
                        <p class="field__error" id="c-message-error" data-error-for="message">@error('message'){{ $message }}@enderror</p>
                    </div>

                    <p class="form-error" role="alert" data-form-error hidden></p>

                    <button class="btn" type="submit" data-submit>{{ __('koba.contact.submit') }} <x-site.arrow /></button>
                </form>

                <div class="order-success" data-enquiry-success hidden tabindex="-1">
                    <x-site.mark />
                    <h2 class="display display--m">{{ __('koba.contact.success_title') }}</h2>
                    <p class="lede">{{ __('koba.contact.success_body') }}</p>
                </div>
            </div>
        </div>
    </section>

    @include('site.sections.locations')
</x-site.layout>
