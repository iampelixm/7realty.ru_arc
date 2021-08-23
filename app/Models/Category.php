<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Area;
use Cookie;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $table = 'categories';
    protected $fillable = ['name', 'type', 'active', 'main', 'offer_index', 'show_main', 'slug'];

    public function parent()
    {
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\CategoryToCategory',
            'category_id',
            'id',
            'id',
            'main_id'
        );
    }

    public function children()
    {
        return $this->hasManyThrough(
            'App\Models\Category',
            'App\Models\CategoryToCategory',
            'main_id',
            'id',
            'id',
            'category_id'
        );
    }

    public function items()
    {
        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\ItemCategory',
            'category_id',
            'id',
            'id',
            'item_id'
        );
    }

    public function offerItems()
    {

        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\ItemCategory',
            'category_id',
            'id',
            'id',
            'item_id'
        )->where('offer_index', '>', 0)->where('active',1)
            ->orderBy('offer_index', 'DESC');
    }

    public function areaItems()
    {

        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\ItemCategory',
            'category_id',
            'id',
            'id',
            'item_id'
        )->orderBy('offer_index', 'DESC');
    }

    public function areaResidence()
    {

        return $this->hasManyThrough(
            'App\Models\Residence',
            'App\Models\ResidenceCategory',
            'category_id',
            'id',
            'id',
            'residence_id'
        );
    }

    public function scopeOffers()
    {
        return $this
            ->where('offer_index', '>', 0)
            ->where('active', 1)
            ->orderBy('offer_index', 'DESC');
    }

    public function scopeOffersMain()
    {
        return $this->where('main', 1)
            ->where('offer_index', '>', 0)
            ->where('active', 1)
            ->orderBy('offer_index', 'DESC');
    }

    public function scopeMain()
    {
        return $this->where('main', 1)
            ->where('active', 1)
            ->where('show_main', 1);
    }

    public function scopeMenu()
    {
        return $this->where('menu_active', 1);
    }

    public function types()
    {
        return $this->hasManyThrough(
            'App\Models\Type',
            'App\Models\CategoryType',
            'category_id',
            'id',
            'id',
            'type_id'
        );
    }

    public function typesId()
    {
        return $this->hasMany('App\Models\CategoryType', 'category_id', 'id');
    }
}
