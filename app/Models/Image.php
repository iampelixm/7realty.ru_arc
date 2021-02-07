<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;
    protected $fillable = ['item_id', 'file', 'token', 'active', 'order_number', 'type'];
}
