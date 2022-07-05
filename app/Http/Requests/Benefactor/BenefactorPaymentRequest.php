<?php

namespace App\Http\Requests\Benefactor;

use App\Models\Categories;
use App\Rules\MaxWordsRule;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BenefactorPaymentRequest extends FormRequest
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
            // 'tip_level' => ['required', 'string', 'min:0', 'max:100'],
            // 'tip_price' => ['required', 'numerical'],
            // 'total_contribution_amount' => ['required', 'numerical', 'integer','min:150','max:70000'],
          
        ];
    }

}
