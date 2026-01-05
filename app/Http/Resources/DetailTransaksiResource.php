<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailTransaksiResource extends JsonResource
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
            'transaksi_id' => $this->transaksi_id,
            'barang_id'    => $this->barang_id,
            'qty'          => $this->qty,
            'harga_barang' => $this->harga_barang,
            'subtotal'        => $this->total,
            'jumlah_bayar'   => $this->jumlah_bayar,
            'kembalian'    => $this->kembalian,
        ];
    }
}
