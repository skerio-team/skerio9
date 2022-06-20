<?php

namespace App\Http\Requests\Admin\Stadium;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStadiumRequest extends FormRequest
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
            'name' => 'required|min:2|string',
        ];
    }

    public function messages(){
        return [
            'name.required'       => 'Nomi kiritilishi kerak!',
            'name.min'            => 'Nomi 2 ta belgidan ko`p bo`lishi kerak!',
            'name.string'         => 'Nomi matn ko`rinishida bo`lishi kerak!',
        ];
    }
}
