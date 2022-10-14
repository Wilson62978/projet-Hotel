<?php

namespace App\Http\Livewire;

use App\Models\Chambre;
use App\Models\Reduction;
use Livewire\Component as Component;

class PostBooK extends Component
{




    public $chambre_id;

    public $date_start;
    public $total_week;
    public $chambre;



    protected $rules = [

        'chambre_id' => ['required', "exists:chambres,id"],
        'date_start' => ['required', "date"],
        'total_week' => ['required', "integer", 'min:1']

    ];






    public function submit()

    {

        $this->validate();

        $chambre = Chambre::findOrFail($this->chambre_id);
        $date_start = date('d-m-Y', strtotime($this->date_start));
        $date_end = date('d-m-Y', strtotime($this->date_start . "+" . 7 * $this->total_week . " days"));
        $price = $chambre->price * $this->total_week;
        $total_week = $this->total_week;
        $reductionObj = Reduction::where("duree", "<=", $this->total_week * 7)->orderBy("duree", "DESC")->first();
        $pourcentage = 0;
        if ($reductionObj) {
            $pourcentage = $reductionObj->pourcentage;
        }

        $reduction = $price * $pourcentage / 100;
        $price_reduction = $price - $reduction;
        $tva = $price_reduction * 18 / 100;
        $price_ttc =  $price_reduction + $tva;

        session(compact('chambre', 'date_start', 'date_end', 'price', 'total_week',"tva", "reduction", "pourcentage", 'price_ttc', "price_reduction"));
        return redirect()->route("chambre.checkout", ["id" => $chambre->id]);
    }


    public function render()
    {
        $this->chambre_id = $this->chambre->id;
        $chambre = $this->chambre;
        $this->date_start=$this->date_start;

        return view('livewire.post-boo-k', compact("chambre"));
    }
}
