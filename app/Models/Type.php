<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'active', 'show_menu'];

    public function typeItems()
    {
        return $this->hasMany('App\Models\Item', 'type_id', 'id');
    }

    public function options() {
        return $this->hasManyThrough(
            'App\Models\Option',
            'App\Models\OptionType', 
            'type_id',
            'id',
            'id',
            'option_id');
    }
}
