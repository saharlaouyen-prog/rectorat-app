<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class FoyerResponsable extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function room(){
        return $this->hasMany(Room::class,'room_id');
    }
}
