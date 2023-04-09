<?php

namespace App\Http\Resources;

use App\Models\TypeSoin;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SoinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'description' => $this->description,
            'duree'=>$this->duree,
            'cout'=> $this->cout,
            'type'=>TypeSoin::find($this->type_soin_id)->libelle,
            'created_at' => $this->created_at->format('d/m/y'),
            'updated_at' => $this->updated_at->format('d/m/y'),
        ];
    }
}
