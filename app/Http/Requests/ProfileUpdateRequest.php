<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\utils\Utility;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_phone' => ['required', Rule::unique('user_addresses', 'phone')->ignore(Auth::user()->address->id), 'regex:^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,7}$^'],
            'user_date_of_birth' => ['required', 'date'],
            'user_address' => ['required', 'string', 'max:500'],
            'user_zip' => ['required', 'integer', 'max:100000', 'min:0'],
            'user_province' => ['required','string', 'max:50'],
            'user_state' => ['required','string', 'max:50'],
            'user_country' => ['required','string', 'max:50'],
            'user_image' => ['required', Rule::imageFile()],
            'user_currency' => ['required','string', Rule::exists('currencies', 'id')]
        ];
    }
}
