<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    public $timestamps = false;
    protected $table = 'category_types';
    protected $fillable = ['category_id', 'type_id'];
}
