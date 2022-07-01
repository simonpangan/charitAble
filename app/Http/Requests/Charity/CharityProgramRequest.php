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
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'header' => ['nullable'],
            'total_needed_amount' => ['required', 'string'],

            'goals' => ['required', 'array'],
            'goals.*' => [
                'required',
            ],
            'goals.*.name' => [
                'required', 'string'
            ],
            'goals.*.date' => [
                'required', 'date'
            ],

            'expenses' => ['nullable', 'array'],
            'expenses.*.name' => [
                'required', 'string'
            ],
            'expenses.*.amount' => [
                'required', 'int'
            ],
            'expenses.*' => [
                'required',
            ],
        ];  
    }

    public function attributes()
    {
        return [
            'goals.*.name' => 'goal name',
            'goals.*.date' => 'goal name',
            'expenses.*.name' => 'expense name',
            'expenses.*.amount' => 'expense amount',
        ];
    }
}
