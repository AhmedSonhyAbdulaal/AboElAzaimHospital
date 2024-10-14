<?php

namespace App\Http\Requests\WorkShop;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Update extends FormRequest
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
            'nameEN' => ['required','string',Rule::unique('work_shops','nameEN')->ignore($this->route('work_shop')->id)],
            'nameAR' => ['required','string',Rule::unique('work_shops','nameAR')->ignore($this->route('work_shop')->id)],
        ];
    }
}
