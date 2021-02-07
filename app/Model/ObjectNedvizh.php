<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ObjectNedvizh extends Model
{
    protected $fillable = ['id', 'price', 'name', 'object_type', 'add_data'];
    protected $hidden = [];

}