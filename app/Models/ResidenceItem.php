<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceItem extends Model
{
    public $timestamps = false;
    protected $table = 'residence_items';
    protected $fillable = ['residence_id', 'item_id'];
}
