<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chambres = Chambre::select('chambres.*',  'u.file_name as thumbnail_img')
            ->leftjoin('uploads as u', 'chambres.thumbnail_img', '=', 'u.id')
            ->orderBy('chambres.created_at','desc')
            ->paginate(15);

        return view('backend.chambres.index', compact('chambres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.chambres.create');
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
            'name' => ['required', 'unique:chambres', 'min:10', 'max:255'],
            'thumbnail_img' => ['required', 'exists:uploads,id'],
            'photos' => ['required', 'exists:uploads,id'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'room_level' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:20'],
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->stock,
            'thumbnail_img' => $request->thumbnail_img,
            'description' => $request->description,
            'slug' => Str::slug($request->name),
            'niveau_chambre' => $request->room_level
        ];

        $chambre = Chambre::create($data);

        $chambre->photos()->sync(array_filter(explode(",", $request->photos)));

        flash('La chambre a été ajouté avec succès')->success();

        return Redirect::route('chambre.index');
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
        $chambre = Chambre::findOrFail($id);

        return view('backend.chambres.edit', compact('chambre'));
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
        $chambre = Chambre::findOrFail($id);

        $request->validate([
            'name' => ['required', 'unique:chambres,name,' . $chambre->id . 'except', 'min:10', 'max:255'],
            'thumbnail_img' => ['required', 'exists:uploads,id'],
            'photos' => ['required', 'exists:uploads,id'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'slug' => ['required', 'string', 'unique:chambres,slug,' . $chambre->id . 'except', 'max:225'],
            'room_level' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:20'],
        ]);

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->stock,
            'thumbnail_img' => $request->thumbnail_img,
            'description' => $request->description,
            'niveau_chambre' => $request->room_level
        ];

        if ($chambre->name !== $request->name && $chambre->slug === $request->slug) {
            $data = array_merge($data, ['slug' => Str::slug($request->name)]);
        } else {
            $data = array_merge($data, ['slug' => Str::slug($request->slug)]);
        }

        $chambre->update($data);

        $chambre->photos()->sync(array_filter(explode(",", $request->photos)));

        flash('La chambre a été modifié avec succès')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chambre::findOrFail($id);

        if (Chambre::destroy($id)) {
            return redirect()->route('chambre.index');
            flash('La chambres a été supprimé avec succès')->success();
        } else {
            flash('Something went wrong')->error();
            return back();
        }
    }

    public function updatePublished(Request $request)
    {
        $chambre = Chambre::find($request->id);

        $status = (int) $request->status;
        if ($chambre !== null && ($status === 1 || $status === 0)) {
            $chambre->published = $status;
            $chambre->save();
            if ($status === 1) {
                $msg = 'La chambre a été défini comme publié';
            } else {
                $msg = 'La chambre a été défini comme non publié';
            }
            return response()->json(['status' => true, 'msg' => $msg]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
