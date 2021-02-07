<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOption extends Model
{
    public $timestamps = false;
    protected $table = 'item_options';
    protected $fillable = ['option_id', 'item_id'];
}
