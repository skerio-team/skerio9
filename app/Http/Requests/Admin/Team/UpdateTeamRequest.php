<?php

namespace App\Http\Requests\Admin\Team;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'name'                  => 'required|string|max:20',
            'sport_category_id'     => 'required',
            'year'                  => 'required',
            'official_site'         => 'required',
            'sport_category_id'     => 'required',
            'image'                 => 'file|max:5000|mimes:png,jpg,jpeg,gif',
        ];
    }

    public function messages()
    {
        return [
            'name.required'              => 'Bu nom to`ldirilishi kerak!',
            'name.string'                => 'Bu nom matn ko`rinishida bo`lishi kerak!',
            'name.max'                   => 'Bu nom eng ko`pi bilan 20 ta belgidan oshmasligi kerak!',

            'sport_category_id.required' => 'Sport Kategoriyasi tanlanishi kerak!',

            'year.required'              => 'Tashkil topgan yili kiritilishi kerak kerak!',

            'official_site.required'     => 'Rasmiy sayti kiritilishi kerak kerak!',

            'image.file'                 => 'Rasm fayl tipida bo`lishligi kerak!',
            'image.max'                  => 'Rasm hajmi 5 mb.dan oshmasligi kerak!',
            'image.mimes'                => 'Rasm: png, jpg, jpeg, gif tipida bo`lishi kerak!',

        ];
    }
}
