<?php

namespace App\Http\Requests;

use App\Rules\NoProfanity;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => ['required', 'string', 'max:100', 'regex:/^[\pL\s\'-]+$/u', new NoProfanity],
            'email'   => ['required', 'email:rfc,dns', 'max:255'],
            'subject' => ['required', 'string', 'max:200', new NoProfanity],
            'message' => ['required', 'string', 'max:2000', new NoProfanity],
        ];
    }

    public function messages(): array
    {
        return [
            'name.regex' => 'Name can only contain letters, spaces, hyphens, and apostrophes.',
        ];
    }
}
