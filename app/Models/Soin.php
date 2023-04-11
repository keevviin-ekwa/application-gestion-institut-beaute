<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Soin extends Model
{
    use HasFactory;


    public function type(): BelongsTo
    {
        return $this->belongsTo(TypeSoin::class,'type_soin_id');
    }


    public function produits(){
        return $this->belongsToMany(Produit::class,'soin_produit');
    }
}
