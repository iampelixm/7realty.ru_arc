<?php

namespace App\Http\Requests;
use Str;

use Illuminate\Foundation\Http\FormRequest;

class PageEditRequest extends FormRequest
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
            'text'          =>  'nullable|string',
            'active'        =>  'required|boolean',
            'slug'          =>  'unique:pages,slug',

        ];
    }

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
