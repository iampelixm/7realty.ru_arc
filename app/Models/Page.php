<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    const STORAGE_PATH = '/pages/';
    protected $tabel = 'pages';
    protected $fillable = [
        'name', 'slug', 'active', 'text', 'section', 'params'
    ];

    public $attributes = [
        'params' => '[]'
    ];

    protected $casts = [
        'params' => 'Object'//AsCollection::class,
    ];
}
