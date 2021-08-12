<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ItemRequest extends FormRequest
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
        // dd($this->route());
        // $this->merge([
        //     'slug' => Str::slug($this->name),
        // ]);


        return [
            'name'          =>  'required|string',
            'type_order'    =>  'required|string',
            'price'         =>  'required|numeric',
            'description'   =>  'required|string',
            //'square'        =>  'required|numeric',
            'address'       =>  'required|string',
            'type_id'       =>  'required|numeric',
            // 'latitude'      =>  'required|numeric|max:99',
            // 'longitude'     =>  'required|numeric|max:99',
            // 'all_rooms'     =>  'required|numeric',
            // 'bed_rooms'     =>  'required|numeric',
            // 'bath_rooms'    =>  'required|numeric',
            'video_url'     =>  'nullable',
            'residence_id'  =>  'nullable',
            'area_id'       =>  'required',
            'offer_index'   =>  'nullable|numeric|max:100',
            'active'        =>  'required|boolean',
            'slug'          =>  'unique:items,slug',
            'photos'        =>  'nullable|array|min:3',
            'user_id'       =>  'nullable',
            'remark'        =>  'string|nullable',

        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);

        return $this->all();;
    }
}
