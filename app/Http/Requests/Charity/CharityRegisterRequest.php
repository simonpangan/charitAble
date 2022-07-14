<?php

namespace App\Http\Requests\Charity;

use App\Models\Categories;
use App\Models\Location;
use App\Rules\MaxWordsRule;
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

        if ($this->query->get('step') == 2) {
            return $this->stepTwoRules();
        }

        return $this->stepThreeRules();
    }

    private function stepOneRules() : array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:200', "regex:/^([^\"!\*\\\\^<>{}_=+~|?]*)$/", 'unique:charities,name'],
            'charity_email' => ['required', 'string', 'email', 'max:255', 'unique:charities,charity_email'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Password::defaults()],
            'categories' => ['array', 'required'],
            'categories.*' => [ 
                'required', 'distinct', Rule::in(Categories::all()->pluck('id'))
            ],
        ];
    }

    private function stepTwoRules() : array
    {
        return array_merge($this->stepOneRules(), [
            'description' => ['required', 'string', 'max:63000'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'int', Rule::in(Location::all()->pluck('id'))],
            // 'fb_link'=> ['nullable', 'string', 'url', 'max:150'],
            // 'twitter_link'=> ['nullable', 'string', 'url', 'max:150'],
            // 'ig_link'=> ['nullable', 'string', 'url', 'max:150'],
            // 'website_link'=> ['nullable', 'string', 'url', 'max:150'],
            'logo'=> [
                'required', 'mimes:png,jpeg,jpg'
            ],
        ]);
    }

    private function stepThreeRules() : array
    {
        return array_merge($this->stepTwoRules(), [
            'documentFile' => ['nullable', 'array'],
            'documentFile.*' => ['required', 'mimes:jpg,jpeg,png,pdf', 'max:5240'],
        ]);
    }

    public function messages()
    {
        return [
            'charity_email.required' => 'The organization email field is required.',
            'email.required' => 'The head admin email field is required.',
            'name.regex' => 'Charity name has an illegal special characters ( ! , @ , # , ^ , % , * , < , > , \ , / , { , } , ? , | , ~)',
            'name.unique' => 'Charity name is already taken',
            'ig_link.url' => 'The instagram link must be a valid URL',
        ];
    }
}
