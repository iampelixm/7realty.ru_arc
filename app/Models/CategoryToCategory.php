<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryToCategory extends Model
{
	public $timestamps = false;
    protected $table = 'category_to_categorys';
    protected $fillable = ['main_id', 'category_id'];
}
