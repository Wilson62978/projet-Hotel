<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    
    /**
     * The chambre that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'thumbnail_img',
        'description',
        'slug',
        'niveau_chambre'
    ];

    public function photos()
    {
        return $this->belongsToMany(Upload::class, 'photos', 'chambre_id', 'upload_id');
    }

}
