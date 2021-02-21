<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable = ['price', 'user_id', 'name', 'description', 'type_id', 'type_order', 'added_at', 'special', 'square', 'latitude', 'longitude', 'address', 'all_rooms', 'bed_rooms', 'bath_rooms', 'active', 'option', 'residence_id', 'area_id', 'offer_index', 'video_url', 'slug'];

    protected $appends = ['data_id', 'url'];

    protected $casts = [
        'options' => 'collection',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function residence()
    {
        return $this->belongsTo(Residence::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image', 'item_id', 'id')->where('type', 'items');
    }

    public function imagesActive()
    {
        return $this->hasMany('App\Models\Image', 'item_id', 'id')->where('type', 'items')->where('active', 1)->orderBy('order_number', 'ASC');
    }

    public function getFirstImageAttribute()
    {
        return $this->images()->where('active', 1)->orderBy('order_number')->first();
    }

    public function getimagesApiAttribute()
    {
        $images =  $this->imagesActive()->get();
        $arr = [];
        foreach ($images as $key => $image) {
            $arr[$key] = url('storage/items/' . $image->item_id . '/' . $image->file);
        }

        return $arr;
    }

    public function getDataIdAttribute()
    {
        return "kv" . $this->id;
    }

    public function getUrlAttribute()
    {
        if ($this->slug != null) {
            return route('site.item.get', $this->slug);
        } else {
            return null;
        }
    }

    public function getOptionsCountAttribute()
    {
        //return 10;
        $options = (array) json_decode($this->option, true);
        return count($options);
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'obj_id', 'area_id')->where('type', 'areas');
    }

    public function commentsActive()
    {
        return $this->hasMany('App\Models\Comment', 'obj_id', 'area_id')->where('type', 'areas')->where('active', 1);
    }


    public function categories()
    {
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\ItemCategory',
            'item_id',
            'id',
            'id',
            'category_id'
        );
    }

    public function category()
    {
        return $this->hasMany('App\Models\ItemCategory', 'item_id', 'id');
    }

    public function scopeMain($query, $areas)
    {
        return $this->where('active', 1)
            ->whereIn('area_id', $areas);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getOptionsAttribute()
    {

        $options = [];

        foreach (json_decode($this->option) as $item_value) {
            $options[$item_value->slug ??
                strtolower(Str::slug($item_value->option_title, '_'))] = $item_value;
        }
        return $options;
    }

    public function optionsArr()
    {
        $options = [];
        foreach (json_decode($this->option, true) as $item_key => $item_value) {
            $options[$item_value['slug'] ?? $item_key] = $item_value;
        }
        return $options;
    }
}
