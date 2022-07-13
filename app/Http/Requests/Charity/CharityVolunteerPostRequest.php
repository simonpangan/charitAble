<?php

namespace App\Http\Requests\Charity;

use Illuminate\Foundation\Http\FormRequest;

class CharityVolunteerPostRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:63000'],
            'is_face_to_face' => ['required', 'boolean'],
            'location' => ['nullable', 'string', 
                'required_if:is_face_to_face,true'
            ],
            'qualifications' => ['required', 'string', 'max:63000'],
            'incentives' => ['nullable', 'string', 'max:63000'],
        ];
    }

    public function messages()
    {
        return [
            'location.required_if' => 'Location is required when it is face to face.',
        ];
    }
}