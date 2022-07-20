<?php

namespace App\Http\Requests\Charity;

use Illuminate\Foundation\Http\FormRequest;

class CharityProgramRequest extends FormRequest
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
        if (request()->routeIs('charity.program.store')) {
            $header = ['required'];
        } else if (request()->routeIs('charity.program.update')) {
            $header = ['nullable'];
        }

        return [
            'name' => ['required', 'string', 'max:50', "regex:/^([^\"\*\\\\^<>{}_=+~|?]*)$/"],
            'description' => ['required', 'string', 'max:63000'],
            'location' => ['required', 'string', 'max:70'],

            'header' => $header,
            'header.*' => ['required', 'mimes:jpg,png,jpeg', 'max:5240'],

            'goals' => ['required', 'array'],
            'goals.*' => [
                'required',
            ],
            'goals.*.name' => [
                'required', 'string', 'max:100'
            ],
            'goals.*.date' => [
                'required', 'date', 'after_or_equal:today',
            ],

            'expenses' => ['nullable', 'array'],
            'expenses.*' => [
                'required',
            ],
            'expenses.*.name' => [
                'required', 'string', 'max:50'
            ],
            'expenses.*.amount' => [
                'required', 'int', 'min:1'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'goals.*.name' => 'goal name',
            'goals.*.date' => 'goal date',
            'expenses.*.name' => 'expense name',
            'expenses.*.amount' => 'expense amount',
        ];
    }

    public function messages()
    {
        return [
            'goals.*.date.after_or_equal' => 'The goal date must be a date after or equal today',
            'name.regex' => 'Program name has an illegal special characters ( @ , # , ^ , % , * , < , > , \ , / , { , } , ? , | , ~)',

        ];
    }
}
