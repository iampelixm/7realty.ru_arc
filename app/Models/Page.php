<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	const STORAGE_PATH = '/pages/';
    protected $tabel = 'pages';
    protected $fillable = ['name', 'slug', 'active', 'text'];
}
