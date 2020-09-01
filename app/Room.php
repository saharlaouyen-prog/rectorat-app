<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }


    public function foyer()
    {
        return $this->belongsTo(FoyerResponsable::class, 'foyer_id');
    }

    public function isReservedByUser()
    {

        return ReservationRoom::where("user_id", Auth::id())->where('room_id', $this->id)->count() > 0;
    }

    public function reservation()
    {
        return $this->belongsToMany(User::class,'reservation_rooms');
    }
}
