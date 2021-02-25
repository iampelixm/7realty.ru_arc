<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    protected $table = 'options';
    protected $fillable = ['name', 'active', 'values', 'method_input', 'require', 'slug'];

    public function getValueCountAttribute()
    {
        if ($this->values != null) {
            $values = (array) json_decode($this->values);
            $count = count($values);
        } else {
            $count = 0;
        }
        return $count;
    }

    public function types()
    {
        return $this->hasManyThrough(
            'App\Models\Type',
            'App\Models\OptionType',
            'option_id',
            'id',
            'id',
            'type_id'
        );
    }

    public function typesId()
    {
        return $this->hasMany('App\Models\OptionType', 'option_id', 'id');
    }
}
