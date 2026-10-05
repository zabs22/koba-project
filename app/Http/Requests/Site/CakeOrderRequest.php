<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CakeOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'regex:/^\+?[0-9\s\-()]{9,20}$/'],
            'cake' => ['required', Rule::in([...array_keys(trans('koba.cakes')), 'custom'])],
            'size' => ['required', Rule::in(array_keys(trans('koba.order.sizes')))],
            'branch' => ['required', Rule::in(array_keys(trans('koba.locations.branches')))],
            'date' => ['required', 'date', 'after:today'],
            'notes' => ['nullable', 'required_if:cake,custom', 'string', 'max:1000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => __('koba.ui.required', ['field' => ':Attribute']),
            'required_if' => __('koba.ui.required', ['field' => ':Attribute']),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return trans('koba.order.fields');
    }
}
