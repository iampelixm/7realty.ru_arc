<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    public $timestamps = false;
    protected $table = 'user_favorites';
    protected $fillable = ['user_id', 'item_id'];
}
