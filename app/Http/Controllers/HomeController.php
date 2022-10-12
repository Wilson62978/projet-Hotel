<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Cotation;
use App\Models\Evenement;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $chambres = Chambre::where('published', 1)->get();

        return view('frontend.index', compact('chambres'));
    }

    public function chambres()
    {
        $chambres = Chambre::where('published', 1)->get();

        return view('frontend.chambre', compact('chambres'));
    }

    public function firstChambre(string $slug)
    {
        $chambre = Chambre::where('slug', $slug)->firstOrFail();
        return view('frontend.chambre_details', compact('chambre'));
    }

    public function checkout(Request $request)
    {
        // dd($request);
        $chambre = Chambre::findOrFail($request->chambre_id);
        $date_start = date('d-m-Y', strtotime($request->date_start));
        $date_end = date('d-m-Y', strtotime($request->date_start . "+" . 7 * $request->total_week . " days"));
        $price = $chambre->price * $request->total_week;
        $total_week = $request->total_week;
        return view('frontend.checkout', compact('chambre', 'date_start', 'date_end', 'price', 'total_week'));
    }

    public function booknow(Request $request)
    {
        // dd($request);
        return view('frontend.complete');
    }

    public function cotationCreate(Request $request)
    {
        $type = $request->query->get('type');
        $evenements = Evenement::all();
        return view('frontend.cotation_create', compact('evenements', "type"));
    }

    public function cotationStore(Request $request)
    {
        if (!$request->isMethod("POST")) return redirect("cotations.create");
        $request->validate([
            'nom' => ['required', 'min:3', 'max:225'],
            'prenom' => ['required', 'min:3', 'max:225'],
            'dateDebut' => ['required', 'date'],
            'email' => ['required', 'email'],
            'nombreParticipant' => ['required', 'numeric'],
            'telephone' => ['required', 'min:8', 'max:225'],
            'evenement_id' => ['required', 'exists:evenements,id'],
            'commentaire' => ['max:225'],
        ]);

        $cotationTab = $request->request->all();
        $cotationTab["hebergement"] = $request->request->get("hebergement") != null;
        $cotation = Cotation::create($cotationTab);
        return redirect()->route("cotations.create")->with("success", true);
    }

    public function cotationView(string $slug)
    {
        $evenement = Evenement::where('slug', $slug)->firstOrFail();
        return view('frontend.evenement_details', compact('evenement'));
    }

}
