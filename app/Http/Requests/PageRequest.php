<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str; 


class PageRequest extends FormRequest
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
