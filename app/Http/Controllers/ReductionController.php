<?php

namespace App\Http\Controllers;

use App\Models\Reduction;
use Illuminate\Http\Request;

class ReductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reductions = Reduction::all();
        $i=1;
        return view("backend.reductions.index",compact("reductions","i"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.reductions.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "duree"=>["required", "integer", "min:0"],
            "pourcentage"=>["required", "numeric","min:0"]
           
        ]);

        Reduction::create([
            "duree"=>$request->get("duree"),
            "pourcentage"=>$request->get("pourcentage")    
        ]);

        return redirect(route("reductions.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $reduction = Reduction::find($id);
        return view("backend.reductions.edit",compact("reduction"));
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
        $request->validate([
            "duree"=>["required", "integer", "min:0"],
            "pourcentage"=>["required", "numeric","min:0"]
        ]);
       
        Reduction::find($id)->update([
            "duree"=>$request->get("duree"),
            "pourcentage"=>$request->get("pourcentage")    
        ]);

        return redirect(route("reductions.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Reduction::find($id)->delete();
        return redirect(route("reductions.index"));
    }
}
