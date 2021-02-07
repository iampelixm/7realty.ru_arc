<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    protected $fillable = ['id', 'name'];
    protected $hidden = [];

}