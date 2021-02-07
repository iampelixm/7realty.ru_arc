<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    public $timestamps = false;
    protected $table = 'item_categories';
    protected $fillable = ['item_id', 'category_id'];
}
