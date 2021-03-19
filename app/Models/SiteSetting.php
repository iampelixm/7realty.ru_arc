<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;
    public $timestamps = false;

    public $fillable = ['name'];

    public $attributes = [
        'caption' => 'setting',
        'value' => '0'
    ];
}
