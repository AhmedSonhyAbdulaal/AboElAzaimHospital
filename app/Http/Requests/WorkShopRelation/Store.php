<?php

namespace App\Http\Requests\WorkShopRelation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_type' => ['required', 'string',Rule::exists('roles','role_type')],
            'nationality' => ['required', 'string',Rule::exists('nationalities','nation')],
            'price' => ['required', 'numeric',Rule::exists('prices','id')],
            'workshop' => ['required', 'string',Rule::exists('work_shops','name')],
        ];
    }
}
