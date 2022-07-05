<?php

namespace App\Http\Requests\Benefactor;

use App\Models\Categories;
use App\Rules\MaxWordsRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BenefactorProfileRequest extends FormRequest
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
            'email' => [
                'required','string','email','max:255',
                'email', Rule::unique('users')->ignore($this->user()->id)
            ],
            'age' => ['required', 'numeric', 'min:18', 'max:100'],
            'gender' => ['required', 'string', Rule::in(['Male', 'Female', 'LGBT', 'Others'])],
            'city' => ['required', 'string', 'max:50'],
            'preferences' => [
                'array', 'required', 
            ],
            'preferences.*' => [
                'required', 'distinct', Rule::in(Categories::all()->pluck('id'))
            ],
        ];
    }

  

    public function messages()
    {
        return [
            'first_name.regex' => 'The first name must only contain letters, dashes and spaces',
            //allows letters, hyphens and spaces explicitly
            'last_name.regex' => 'The last name must only contain letters, dashes and spaces',
        ];
    }

    public function attributes()
    {
        return [
            'preferences.*' => 'preferences',
        ];
    }
}
