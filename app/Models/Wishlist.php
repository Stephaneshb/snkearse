<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{



    use HasFactory;

    protected $fillable = [
        'user_id',      // Ajoute l'ID de l'utilisateur
        'sneaker_id',   // ID unique de la sneaker
        'name',         // Nom de la sneaker
        'image',        // URL de l'image
        'price',        // Prix de la sneaker
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

