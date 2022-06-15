<?php

namespace App\Http\Requests\Admin\StadiumSection;

use Illuminate\Foundation\Http\FormRequest;

class StoreStadiumSectionRequest extends FormRequest
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
            'stadium_id'=>  ['required'],
            'name'      =>  ['required'],
            'price'     =>  ['required'],
            'capacity'  =>  ['nullable'],
            'image.*'   =>  ['nullable|image|mimes:png,jpg,gif,jpeg'],
        ];
    }
}
