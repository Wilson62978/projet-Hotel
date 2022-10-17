<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view("backend.evenements.index", compact("evenements"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        return view("backend.evenements.edit");
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
            "titre" => ["required", "unique:evenements,titre"],
            "description" => ["required"],
            'image' => ["required:false", 'file', 'mimes:png,jpg,jpeg'],
        ]);

        Evenement::create([
            "titre" => $request->get("titre"),
            "description" => $request->get("description"),
            "slug" => str_replace(" ", "-", $request->get("titre")),
            "image" => $this->uploads($request, "image"),
            "status" => true,
        ]);

        return redirect(route("evenements.index"));
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

        $evenement = Evenement::find($id);
        return view("backend.evenements.edit", compact("evenement"));
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

            $evenement = Evenement::find($id);
            $evenement->status = $request->get("status");
            $evenement->save();



            return response()->json(1);
        }


        $request->validate([
            "titre" => ["required", "unique:evenements,titre," . $id],
            "description" => ["required"],
            'image' => ["required:false", 'file', 'mimes:png,jpg,jpeg'],
        ]);
        $evenement = Evenement::find($id);

        Evenement::find($id)->update([
            "titre" => $request->get("titre"),
            "description" => $request->get("description"),
            "slug" => str_replace(" ", "-", $request->get("titre")),
            "image" => $this->uploads($request, "image") ??  $evenement->image,
            "status" => $evenement->status
        ]);



        return redirect(route("evenements.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Evenement::find($id)->delete();
        return redirect(route("evenements.index"));
    }


    public function uploads(Request $request, $file_name)
    {
        $file = $request->$file_name;

        if ($file == null)  return false;

        $extension = $file->getClientOriginalExtension();
        $original_name = $file->getClientOriginalName();
        $size = $file->getSize();
        $type = $file->getClientOriginalExtension();

        $name = $file->storeAs('uploads', $file_name . time() . '.' . $extension, 'public');

        return $name;
    }
}
