<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model

{
    use HasFactory;

    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeProduit::class,'type_produit_id');

    }

    public function fournisseurs(): BelongsTo
    {
       return $this->belongsTo(Fournisseur::class,'fournisseur_id');
    }

}
