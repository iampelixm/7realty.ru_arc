<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidenceRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'          =>  'required|string',
            'description'   =>  'nullable|string',
            'address'        =>  'nullable|string',
            'longitude'     =>  'nullable|numeric|max:99',
            'latitude'      =>  'nullable|numeric|max:99',
            'all_flats'     =>  'nullable|numeric|min:0|max:2147483648',
            'area_id'       =>  'nullable',
            'active'        =>  'required|boolean',
            'show_menu'     =>  'required|boolean',
            'build_at'      =>  'nullable|date',
            'video_url'     =>  'nullable',
        ];
    }
}
