<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nationalite;
use App\Models\Reservations;
use DateTime;
use Illuminate\Support\Facades\Date;

class Checkout extends Component
{   public $nom;
    public $prenom;
    public $email;
    public $numero;
    public $nationalite_id;
    public $cvvCvc ;
    public $card_month;
    public $card_year; 
    public $numeroCarte ;
    public  $nomTitulaire;




    protected $rules = [

        'nom' => ['required', "min:3"],
        'prenom' => ['required', "min:3"],
        'email' => ['required', "email"],
        'numero' => ['required', "min:8"],
        "nationalite_id"=>[],
        'nomTitulaire' => ['required', "min:3"],
        'numeroCarte' => ['required', "min:12"],
        'card_year' =>  ['required', 'min:4'],
        'card_month' => ['required', "integer", 'min:1', "max:12"], 
        'cvvCvc' => ['required', 'min:3', "max:3"], 

       

    ];




    public function render()
    {

        $chambre =session()->get('chambre');
        $date_start =session()->get('date_start');
        $date_end =session()->get('date_end');
        $price =session()->get('price');
        $total_week =session()->get('total_week');
        $pourcentage =session()->get('pourcentage');
        $price_ttc =session()->get('price_ttc');
        $reduction =session()->get('reduction');
        $tva= session()->get('tva');
        $nationalites = Nationalite::all();
        return view('livewire.checkout', compact("nationalites",'chambre', 'date_start', 'date_end', 'price', "tva", "reduction",'total_week',"pourcentage",'price_ttc',"reduction"));
    }



    public function submit()

    {  
      
        $this->validate();
         // methodePayement_id user_id chambre_id dateDebut dateFin montant nom prenom  email numero nationalite_id dateExpiration nomTitulaire cvvCvc numeroCarte
        $tab=[
            "methodePayement_id"=>null,
            "user_id"=>null,
            "chambre_id"=>session()->get('chambre')->id,
            "dateDebut"=>Date::createFromFormat("d-m-Y",session()->get('date_start')),
            "dateFin"=>  Date::createFromFormat("d-m-Y",session()->get('date_end')),
            "montant"=>session()->get('price_ttc'),
            "nom"=>$this->nom,
            "prenom"=>$this->prenom,
            "email"=>$this->email,
            "numero"=>$this->numero,
            "nationalite_id"=>$this->nationalite_id,
            "nomTitulaire"=>$this->nomTitulaire,
            "numeroCarte"=>$this->numeroCarte,
            "cvvCvc"=>$this->cvvCvc,
            "dateExpiration"=>Date::create($this->card_year,$this->card_month)

        ];

      
        Reservations::create($tab);
        session()->forget("chambre");
        session(["booking_success"=>true]);
        return redirect()->route("reserver");
    }
}
