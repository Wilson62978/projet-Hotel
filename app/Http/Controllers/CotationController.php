<?php

namespace App\Http\Controllers;

use App\Models\Cotation;
use Illuminate\Http\Request;

class CotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotations = Cotation::select(
            "cotations.*",
            "evenements.titre as evenement"
        )
            ->join('evenements', 'evenements.id', '=', 'cotations.evenement_id')
            ->get();
        return view("backend.cotations.index", compact("cotations"));
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

            $cotation = Cotation::find($id);
            $cotation->status = $request->get("status");
            $cotation->save();



            return response()->json(1);
        }

        return redirect(route("demandes.index"));
    }
}
