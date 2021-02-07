<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Areas extends Model
{
    protected $fillable = ['id', 'name', 'objNum', 'price', 'add_data'];
    protected $hidden = [];

}