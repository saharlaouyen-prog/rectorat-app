<?php

namespace App\Http\Controllers\foyer;

use App\Http\Controllers\Controller;
use App\ReservationRoom;
use App\Room;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ChambreController extends Controller
{

    public function index()
    {
        $rooms = Room::where('foyer_id', Auth::guard('foyer')->id())->get();
        return view('foyer.room', compact('rooms'));
    }

    public function students()
    {
        $reservations = ReservationRoom::with('room', 'user')->whereHas('room', function ($q) {
            return $q->where('foyer_id', Auth::guard('foyer')->id());

        })->whereHas('user', function ($q) {
            return $q->where('room_id', null);

        })->where('is_accepted',null)->get();


        return view("foyer.room.students", compact("reservations"));


    }

    public function create()
    {
        if (Room::where('foyer_id', Auth::guard('foyer')->id())->count() >= Auth::guard('foyer')->user()->capacity) {
            return abort(403, 'you have reached the capacity');
        }
        return view("foyer.room.create");

    }

    public function show($id)
    {
        $room = Room::findOrFail($id);

        return view("foyer.room.show", compact("room"));


    }

    public function show_student($id)
    {
        $student = User::findOrFail($id);

        return view("foyer.student.show", compact("student"));


    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);

        return view("foyer.room.edit", compact("room"));

    }

    public function edit_student($id)
    {
        $reservation =  ReservationRoom::findOrFail($id);

        return view("foyer.student.edit", compact("reservation"));

    }

    public function store(Request $request)
    {
        $room = new Room();
        $room->foyer_id = auth()->guard('foyer')->user()->id;
        $room->description = ($request->description) ?? '';
        $room->name = $request->name;
        $room->tv = ($request->tv) ? 1 : 0;
        $room->wc = ($request->wc) ? 1 : 0;
        $room->wifi = ($request->wifi) ? 1 : 0;
        $room->kitchenette = ($request->kitchenette) ? 1 : 0;
        $room->lat = ($request->lat) ?? null;
        $room->lng = ($request->lng) ?? null;
        $room->price = $request->price;
        $room->type = $request->type;
        if (auth()->guard('foyer')->user()->is_public == 1) {
            $room->is_published = 1;
        }

        //Multiple images & files
        $files = [];


        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $name = $file->getClientOriginalName();
                $link = Storage::disk('public')->put('room', $file);

                $files[] = $link;
            }
        }
        $room->image = (!empty($files)) ? json_encode($files) : null;

        $room->save();

        return redirect()->route("foyer.dashboard.home")->with('success', 'Data Added Successfully.');
    }


    public function update(Request $request)
    {
        $room = Room::find($request->id);
        $room->description = ($request->description) ?? '';
        $room->name = $request->name;
        $room->tv = ($request->tv) ? 1 : 0;
        $room->wc = ($request->wc) ? 1 : 0;
        $room->wifi = ($request->wifi) ? 1 : 0;
        $room->kitchenette = ($request->kitchenette) ? 1 : 0;
        $room->lat = ($request->lat) ?? $room->lat;
        $room->lng = ($request->lng) ?? $room->lng;
        $room->price = $request->price;
        $room->type = $request->type;

        //Multiple images & files


        if ($request->hasFile('image')) {
            $files = [];

            foreach ($request->file('image') as $file) {

                $name = $file->getClientOriginalName();
                $link = Storage::disk('public')->put('room', $file);
                $files[] = $link;
            }

            $room->image = (!empty($files)) ? json_encode($files) : null;
        }


        $room->save();
        return redirect()->route("foyer.dashboard.home")->with('success', 'Updated');

    }

    public function update_student($id,Request $request)
    {
        $reservation = ReservationRoom::find($id);
        $reservation->num_pay = $request->num_pay;
        $reservation->payement = ($request->payement) ? 1 : 0;
        $reservation->resident = ($request->resident) ? 1 : 0;


        $reservation->save();
        return redirect()->route("foyer.dashboard.residents")->with('success', 'Updated');

    }

//    public function destroy($room)
//    {
//        $room = Room::find($room);
//        $room->delete();
//        return redirect()->back()->with('success', 'Room Deleted Successfully.');
//    }
//
//    public function destroy_student($student)
//    {
//        $student = User::find($student);
//        $student->delete();
//        return redirect()->back()->with('success', 'Student Deleted Successfully.');
//    }

    public function acceptReservation($id)
    {
        $reservation = ReservationRoom::find($id);
        $reservation->is_accepted= 1;
        $user = User::find($reservation->user_id);
        $user->room_id = $reservation->id;
        $user->save();
        $reservation->save();
        return redirect()->back()->with('success', 'reservation accepted Successfully.');
    }

    public function RefuseReservation($id)
    {
        $reservation = ReservationRoom::find($id);
        $reservation->is_accepted=0;
        $reservation->save();
        return redirect()->back()->with('success', 'reservation refused Successfully.');
    }

    public function residents()
    {

        $residents= $reservations = ReservationRoom::with('room', 'user')->whereHas('room', function ($q) {
            return $q->where('foyer_id', Auth::guard('foyer')->id());

        })->where('is_accepted',1)->get();

        return view("foyer.residents.index", compact("reservations"));

    }
}
