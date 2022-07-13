<?php

namespace App\Http\Requests\Charity;

use App\Rules\MaxWordsRule;
use Illuminate\Foundation\Http\FormRequest;

class CharityPostStoreRequest extends FormRequest
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
            'main_content_body' => ['required', 'string', 'max:63000'],
            'main_content_body_image.' => ['array', 'nullable'],
            'main_content_body_image.*' => [
                'required', 'mimes:png,jpeg,jpg'
            ],
        ];
    }

    public function attributes()
    {
        return [
            'main_content_body' => 'message',
        ];
    }
}
