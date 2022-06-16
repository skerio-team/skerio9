<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
             'name'  => 'required|max:20|string',
             'image' => 'file|max:5000|mimes:png,jpg,jpeg,gif',
         ];
     }
 
     public function messages()
     {
         return [
             'name.required'  => 'Brend nomi to`ldirilishi kerak!',
             'name.max'       => 'Brend nomi eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',
             'name.string'    => 'Brend nomi matn ko`rinishida bo`lishi kerak!',
             
             'image.file'     => 'Rasm fayl tipida bo`lishligi kerak!',
             'image.max'      => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
             'image.mimes'    => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',
         ];
     }
}
