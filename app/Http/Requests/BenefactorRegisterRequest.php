<?php

namespace App\Http\Requests;

use App\Rules\MaxWordsRule;
use App\Enums\CharityCategory;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;


class BenefactorRegisterRequest extends FormRequest
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
            // dd($this->stepOneRules());
            return $this->stepOneRules();   
        }       
        else if ($this->query->get('step') == 2) {
            return $this->stepTwoRules();
        }
            
        //last step
        return $this->stepThreeRules();
    }


    private function stepOneRules() : array
    {
        return [
            'first_name' => ['required', 'string', 'min:2', new MaxWordsRule(50)],
            'last_name' => ['required', 'string', 'min:2', new MaxWordsRule(2)],
            /*
                email validation
                https://minuteoflaravel.com/validation/laravel-email-validation-be-aware-of-how-you-validate/
            */
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            //Password default validations is in the AppServiceProvider 
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
        ];
    }

    private function stepTwoRules() : array
    {
        return array_merge($this->stepOneRules(), [
            'age' => ['required', 'numeric', 'min:18', 'max:100'],
            'gender' => ['required', 'string', Rule::in(['Male', 'Female', 'LGBT', 'Others'])],
            'city' => ['required', 'string'],
            'account_type' => ['required', 'string', Rule::in(['Personal', 'Business'])],
        ]);
    }

    private function stepThreeRules() : array
    {
        //https://stackoverflow.com/questions/42258185/how-to-validate-array-in-laravel
        return array_merge($this->stepTwoRules(), [
            'preferences' => [
                'array', 'required', 
            ],
            'preferences.*' => [
                'required', 'distinct', Rule::in(CharityCategory::getCategoriesName())
            ],
        ]);
    }   
}
