<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionType extends Model
{
    public $timestamps = false;
    protected $table = 'option_types';
    protected $fillable = ['option_id', 'type_id'];
}
