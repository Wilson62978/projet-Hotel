<?php

use App\Models\Evenement;

function h_evenements(){
    return Evenement::all();
}