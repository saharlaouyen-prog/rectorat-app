<?php

namespace App\Http\Controllers\office;

use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('office.rooms.index', compact('rooms'));

    }

    public function togglePublish($id)
    {
        $room = Room::findOrFail($id);
        $room->is_published = $room->is_published == 1 ? 0 : 1;
        $room->save();

        return redirect()->route("office.dashboard.rooms")->with('success', 'room updated successfully.');


    }
}
