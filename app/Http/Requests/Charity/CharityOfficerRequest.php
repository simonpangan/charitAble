<?php

namespace App\Http\Requests\Charity;

use App\Models\Categories;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class CharityOfficerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'last_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'position' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'officer_since' => ['required', 'date', 'before:tomorrow'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.regex' => 'The first name must only contain letters, hyphens and spaces',
            'last_name.regex' => 'The last name must only contain letters, hyphens and spaces',
            'position.regex' => 'The position  must only contain letters, hyphens and spaces',
        ];
    }
}
