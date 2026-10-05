<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'regex:/^\+?[0-9\s\-()]{9,20}$/'],
            'topic' => ['required', Rule::in(array_keys(trans('koba.contact.topics')))],
            'branch' => ['nullable', Rule::in(array_keys(trans('koba.locations.branches')))],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
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
        return trans('koba.contact.fields');
    }
}
