<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class SuplayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'nama_suplayer'    => $this->nama_suplayer,
            'nama_perusahaan'  => $this->nama_perusahaan,
            'alamat'          => $this->alamat,
            'noHP'            => $this->noHP,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
        
    }
    
}
