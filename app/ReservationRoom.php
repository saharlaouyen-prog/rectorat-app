<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationRoom extends Model
{
    protected $table='reservation_rooms';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
