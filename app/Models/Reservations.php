<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    //methodePayement_id user_id chambre_id dateDebut dateFin montantnom prenom  email numero nationalite_id dateExpiration nomTitulaire cvvCvc numeroCarte
    protected $fillable = [
        "methodePayement_id",
        "user_id","chambre_id", "dateDebut", "dateFin", "montant", "nom", "prenom",
        "email", "numero", "nationalite_id", "dateExpiration", "nomTitulaire", "cvvCvc", "numeroCarte",
        "montantExact","tva"
    ];
}
