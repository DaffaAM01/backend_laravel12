<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataTokoResource extends JsonResource
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
            'nama_toko' => $this->nama_toko,
            'alamat_toko' => $this->alamat_toko,
            'noHP_toko' => $this->noHP_toko,
            'pesan_footer' => $this->pesan_footer,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
