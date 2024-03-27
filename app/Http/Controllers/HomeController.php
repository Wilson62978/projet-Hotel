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
        $chambres = Chambre::select('chambres.*',  'u.file_name as thumbnail_img')
            ->leftjoin('uploads as u', 'chambres.thumbnail_img', '=', 'u.id')
            ->orderBy('chambres.created_at','desc')
            ->where('published', 1)
            ->limit(3)
            ->get();

        return view('frontend.index', compact('chambres'));
    }

    public function chambres()
    {
        $chambres = Chambre::select('chambres.*', 'uploads.file_name as thumbnail_img')
            ->leftjoin('uploads', 'uploads.id', '=', 'chambres.thumbnail_img')
            ->where('chambres.published', 1)->get();

        return view('frontend.chambre', compact('chambres'));
    }

    public function firstChambre(string $slug)
    {
        $chambre = Chambre::select('chambres.*', 'uploads.file_name as thumbnail_img')
            ->leftjoin('uploads', 'uploads.id', '=', 'chambres.thumbnail_img')
            ->where('slug', $slug)
            ->where('chambres.published', 1)->firstOrFail();
        return view('frontend.chambre_details', compact('chambre'));
    }

    public function checkout(Request $request)
    {
       
        if(!$request->session()->get('chambre')) return redirect()->route("home");

        $chambre = $request->session()->get('chambre');
        $date_start =$request->session()->get('date_start');
        $date_end =$request->session()->get('date_end');
        $price = $request->session()->get('price');
        $total_week = $request->session()->get('total_week');
        $pourcentage = $request->session()->get('pourcentage');
        $price_ttc = $request->session()->get('price_ttc');
        $reduction = $request->session()->get('reduction');
        $tva=  $request->session()->get('tva');

        return view('frontend.checkout', compact('chambre', 'date_start', 'date_end', 'price', "tva", "reduction",'total_week',"pourcentage",'price_ttc',"reduction"));
    }

    public function booknow()
    {   
        if(!session()->get('booking_success')) return redirect()->route("home");

        session()->forget("booking_success");
       
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
