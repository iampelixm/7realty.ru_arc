<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
	protected $table = 'item_areas';
    protected $fillable = ['name', 'coordinates', 'active', 'city_id', 'slug'];
    
    protected $casts = [
        'coordinates' => 'json'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'obj_id', 'id')->where('type', 'areas');
    }

    public function items()
    {
        return $this->hasMany('App\Models\Item', 'area_id', 'id');
    }

    public function residence()
    {
        return $this->hasMany('App\Models\Residence', 'area_id', 'id');
    }
}