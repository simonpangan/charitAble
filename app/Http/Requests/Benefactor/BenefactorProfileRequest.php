<?php

namespace App\Http\Requests\Benefactor;

use App\Rules\MaxWordsRule;
use App\Enums\CharityCategory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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
            'first_name' => [
                'required', 'string', 'min:2', new MaxWordsRule(50)
            ],  
            'last_name' => ['required', 'string', 'min:2', new MaxWordsRule(2)],
            'email' => [
                'required','string','email','max:255',
                'email', Rule::unique('users')->ignore($this->user()->id)
            ],
            'age' => ['required', 'numeric', 'min:18', 'max:100'],
            'gender' => ['required', 'string', Rule::in(['Male', 'Female', 'LGBT', 'Others'])],
            'city' => ['required', 'string'],
            'account_type' => [
                'required', 'string', Rule::in(['Personal', 'Business'])
            ],
            'preferences' => [
                'array', 'required', 
            ],
            'preferences.*' => [
                'required', 'distinct', Rule::in(CharityCategory::getCategoriesName())
            ],
        ];
    }

    public function attributes()
    {
        return [
            'preferences.*' => 'preferences',
        ];
    }
}
