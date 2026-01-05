<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total_harga' => $this->total_harga,
            'tanggal_beli' => $this->tanggal_beli,
            'pelanggan' => [
                'nama_pelanggan' => $this->pelanggan->nama_pelanggan ?? 'N/A',
            ],
        ];
    }
}
