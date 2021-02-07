<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResCategory extends Model
{
    protected $table = 'res_categories';
    protected $fillable = ['name',  'active',  'slug'];

    public function areaResidence() { 

        return $this->hasManyThrough(
            'App\Models\Residence',
            'App\Models\ResidenceCategory', 
            'category_id',
            'id',
            'id',
            'residence_id');
    }
}
