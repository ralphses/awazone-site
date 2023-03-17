<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSupportMessage extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'message_name' => ['required'],
            'message_email' => ['required', 'email'],
            'message_phone' => ['required', 'regex:^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,7}$^'],
            'subject' => ['required'],
            'message' => ['required'],
        ];
    }
}
