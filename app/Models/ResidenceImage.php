<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceImage extends Model
{
    public $timestamps = false;
    protected $table = 'residence_images';
    protected $fillable = ['resindece_id', 'file', 'token', 'active', 'order_number', 'type'];
}
