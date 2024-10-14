<?php

namespace App\Http\Requests\Booking;

use App\Models\Attendee;
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
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255'],
            'tel' => ['required','string','regex:/^\d{11}$/',Rule::unique('attendees','tel')->ignore(Attendee::where('email',$this->email)->first()?->id)],
            'nationality' => ['required',Rule::exists('nationalities','nation')],
            'role' => ['required',Rule::exists('roles','role_type')],
            'workShops' => ['required','array','min:1'],
            'workShops.*' => ['required','array'],
            // 'workShops.*.price' => ['required',Rule::exists('prices','price')],
            'workShops.*.name' => ['required',Rule::exists('work_shops','nameEN')],
            'images' => ['nullable','array'],
            'images.*' => ['nullable','file','mimes:png,jpeg,gif,pdf'],
        ];
    }
}
