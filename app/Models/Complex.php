<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
	protected $table = 'residentialcomplexes';
    protected $fillable = ['name', 'add_data'];

}