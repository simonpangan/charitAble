<?php

namespace App\Http\Requests\Charity;

use App\Models\Categories;
use App\Models\Location;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

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
        if ($this->query->get('step') == 1) {   
            return $this->stepOneRules();   
        }
        
        return $this->stepOneRules();   
    }

    private function stepOneRules() : array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'charity_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'address' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', Rule::in(Location::all()->pluck('id'))],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'categories' => ['array', 'required'],
            'categories.*' => [
                'required', 'distinct', Rule::in(Categories::all()->pluck('id'))
            ],
        ];
    }

    public function messages()
    {
        return [
            'charity_email.required' => 'The organization email field is required.',
            'email.required' => 'The head admin email field is required.',
        ];
    }
}
