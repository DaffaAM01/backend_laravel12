<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangMasukResource extends JsonResource
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
            'barang_id' => $this->barang_id,
            'suplayer_id' => $this->suplayer_id,
            'jumlah_masuk' => $this->jumlah_masuk,
            'tanggal_masuk' => $this->tanggal_masuk,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
