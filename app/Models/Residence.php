<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    protected $table = 'residences';
    protected $fillable = ['name', 'description', 'all_flats', 'build_at', 'address', 'all_rooms', 'bed_rooms', 'bath_rooms', 'active', 'latitude', 'longitude', 'area_id', 'video_url', 'show_menu'];

    protected $appends = ['data_id', 'url'];

    public function images()
    {
        return $this->hasMany('App\Models\ResidenceImage', 'residence_id', 'id');
    }

    public function getFirstImageAttribute()
    {
        return $this->images()->where('active', 1)->orderBy('order_number')->first();
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }


    public function items()
    {
        return $this->hasMany('App\Models\Item', 'residence_id', 'id');
    }

    public function getimagesApiAttribute()
    {
        $images =  $this->imagesActive()->get();
        $arr = [];
        foreach ($images as $key => $image) {
            $arr[$key] = url('storage/residences/'.$this->id.'/'.$image->file);
        }

        return $arr;
    }

    public function getminPriceAttribute()
    {
        return $this->items()->min('price');
    }

    public function getmaxPriceAttribute()
    {
        return $this->items()->max('price');
    } 

    public function getminSquareAttribute()
    {
        return $this->items()->min('square');
    }

    public function getmaxSquareAttribute()
    {
        return $this->items()->max('square');
    }    

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'obj_id', 'id')->where('type', 'residences');
    }

    public function commentsActive()
    {
        return $this->hasMany('App\Models\Comment', 'obj_id', 'id')->where('type', 'residences')->where('active', 1);
    }

    public function getItemsCountAttribute()
    {
    	return $this->items()->count();
    }

    public function scopeMain($query, $areas)
    {
        return $this->where('active', 1)
                    ->whereIn('area_id', $areas);
    }

    public function imagesActive()
    {
        return $this->hasMany('App\Models\ResidenceImage', 'residence_id', 'id')->where('active', 1)->orderBy('order_number', 'ASC');
    }

    public function categories() {
        return $this->hasManyThrough(
            'App\Models\ResCategory',
            'App\Models\ResidenceCategory', 
            'residence_id',
            'id',
            'id',
            'category_id');
    }

    public function category() {
        return $this->hasMany('App\Models\ResidenceCategory', 'category_id', 'id');
    }

    public function getDataIdAttribute()
    {
        return "zk".$this->id;
    }

    public function getUrlAttribute()
    {
            return route('site.residences_items', $this->id);
    }
}
