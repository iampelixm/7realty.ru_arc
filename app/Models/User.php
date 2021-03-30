<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasRolesAndAbilities, InteractsWithMedia;
    public $attributes=[
        'additional'=>'[]',
        'description'=>''
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'role', 'position', 'description', 'position', 'department', 'additional'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'additional'        => 'Object',
    ];

    public function favorites()
    {
        return $this->hasManyThrough(
            'App\Models\Item',
            'App\Models\UserFavorite',
            'user_id',
            'id',
            'id',
            'item_id'
        );
    }
}
