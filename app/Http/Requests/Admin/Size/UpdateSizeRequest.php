<?php

namespace App\Http\Requests\Admin\Size;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
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
             'number'  => 'required_without:letter|max:10',
             'letter' => 'required_without:number|max:10',
         ];
     }

    public function messages()
    {
        return [
            'number.required_without'    => 'Raqamli yoki harfli o`lcham to`ldirilishi kerak!',
            'number.max'                 => 'Raqamli o`lcham eng ko`pi bilan 10 ta belgidan oshmasligi kerak!',

            'letter.required_without'    => 'Raqamli yoki harfli o`lcham to`ldirilishi kerak!',
            'letter.max'                 => 'Harfli o`lcham eng ko`pi bilan 10 ta belgidan oshmasligi kerak!',

        ];
    }
}
