<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservations::select(
            "reservations.*",
            "nationalites.titre as nationalite",
            "chambres.niveau_chambre as niveau_chambre",
            "chambres.price as prix_chambre",
            "chambres.name as nom_chambre",
            "chambres.quantity as quantite_chambre",
        )
            ->leftjoin('nationalites', 'nationalites.id', '=', 'reservations.nationalite_id')
            ->join('chambres', 'chambres.id', '=', 'reservations.chambre_id')
            ->get(); 
        return view("backend.reservations.index", compact("reservations"));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->getMethod() == "PUT") {

            $request->validate([
                "status" => ["required"],

            ]);

            $reservation = Reservations::find($id);
            if( $reservation->status==null){
                $reservation->status = false;
            }else $reservation->status = $request->get("status");
          
            $reservation->save();
            flash('Le statut a été changé avec succes')->success();



            return response()->json(1);
        }

        return redirect(route("demandes.index"));
    }
}
