<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class ItemEditRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          =>  'required|string',
            'type_order'    =>  'required|string',
            'price'         =>  'required|numeric',
            'description'   =>  'required|string',
            'square'        =>  'required|numeric',
            'address'       =>  'required|string',
            'type_id'       =>  'required|numeric',
            'latitude'      =>  'required|numeric|max:99',
            'longitude'     =>  'required|numeric|max:99',
            'all_rooms'     =>  'required|numeric',
            'bed_rooms'     =>  'required|numeric',
            'bath_rooms'    =>  'required|numeric',
            'video_url'     =>  'nullable',
            'residence_id'  =>  'nullable',
            'area_id'       =>  'required',
            'offer_index'   =>  'nullable|numeric|max:100',
            'active'        =>  'required|boolean',
            'slug'          =>  'unique:items,slug,' . $this->route()->parameter('item')->id,
            'user_id'       =>  'nullable',
            'remark'        =>  'string|nullable',

        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        if (!isset($this->slug_change)) {
            $this->except('slug');
        } else {
            $this->merge([
                'slug' => Str::slug($this->name),
            ]);
        }


        return $this->all();;
    }
}
