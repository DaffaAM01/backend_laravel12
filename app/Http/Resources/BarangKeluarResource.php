<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangKeluarResource extends JsonResource
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
            'jumlah_keluar' => $this->jumlah_keluar,
            'alasan' => $this->alasan,
            'tanggal_keluar' => $this->tanggal_keluar,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
