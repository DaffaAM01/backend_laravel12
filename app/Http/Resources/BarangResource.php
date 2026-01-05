<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'image'        => $this->image,
           'nama_barang'   => $this->nama_barang,
           'qty'         => $this->qty,
           'harga_barang'  => $this->harga_barang,
        ];
    }
}
