<?php

namespace App\Http\Requests\Admin\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'sport_category_id' =>  ['required'],
            'team1_id'           =>  ['required'],
            'team2_id'           =>  ['required'],
            'stadium_section_id'=>  ['required'],
            'name'              =>  ['required'],
            'date'              =>  ['required'],
            'price'             =>  ['required', 'numeric'],
            'image.*'           =>  ['nullable|image|mimes:png,jpg,gif,jpeg'],
            'status'            =>  ['required'],
        ];
    }
}
