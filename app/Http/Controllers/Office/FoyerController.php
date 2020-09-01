<?php

namespace App\Http\Controllers\office;

use App\FoyerResponsable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoyerController extends Controller
{
    public function index()
    {
        $foyers = FoyerResponsable::all();

        return view('office.foyer.index', compact("foyers"));
    }

    public function edit($id)
    {
        $foyer = FoyerResponsable::findOrFail($id);

        return view('office.foyer.edit', compact("foyer"));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'capacity' => 'required',
        ]);
        $foyer = FoyerResponsable::findOrFail($id);
        $foyer->address = ($request->address) ?? '';
        $foyer->name = $request->name;
        $foyer->capacity = $request->capacity;
        $foyer->is_active = ($request->is_active) ? 1 : 0;
        $foyer->is_public = ($request->is_public) ? 1 : 0;
        $foyer->save();

        return redirect()->route("office.dashboard.foyers")->with('success', 'foyer updated successfully.');

    }
}
