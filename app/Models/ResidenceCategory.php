<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceCategory extends Model
{
    public $timestamps = false;
    protected $table = 'residence_categories';
    protected $fillable = ['residence_id', 'category_id'];

    
}
