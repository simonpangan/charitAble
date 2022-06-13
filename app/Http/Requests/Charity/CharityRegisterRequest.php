<?php

namespace App\Http\Requests\Charity;

use App\Rules\MaxWordsRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CharityRegisterRequest extends FormRequest
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
            'charityName' => ['required', 'string', 'min:2', new MaxWordsRule(10)],
            /*
                email validation
                https://minuteoflaravel.com/validation/laravel-email-validation-be-aware-of-how-you-validate/
            */
            'charityEmail' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'headAdminEmail' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            //Password default validations is in the AppServiceProvider
            'password' => ['required', 'string', 'confirmed', Password::defaults()],

        ];
    }
}
