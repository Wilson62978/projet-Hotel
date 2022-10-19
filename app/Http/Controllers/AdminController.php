<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reservationsTotales=Reservations::all()->count();
        $reservationsTraitees=Reservations::where("status",'!=',Null)->get()->count();
        $cotationsTotales=Reservations::all()->count();
        $cotationsTraitees=Reservations::where("status",'!=',Null)->get()->count();

        return view('backend.dashboard', compact('reservationsTraitees', 'cotationsTraitees',"reservationsTotales","cotationsTotales"));
    }
}
