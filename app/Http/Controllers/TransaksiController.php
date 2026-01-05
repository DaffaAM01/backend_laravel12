<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TransaksiResource;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = Transaksi::with(['pelanggan', 'details.barang'])->get();
        if (!$request->expectsJson()) {
            return view('transaksi', compact('transaksi'));
        }
        return TransaksiResource::collection($transaksi)
            ->additional(['success' => true, 'message' => 'Data transaksi berhasil dimuat']);
    }
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                $request->validate([
                    'pelanggan_id' => 'required|exists:pelanggan,id',
                    'items' => 'required|array',
                    'items.*.barang_id' => 'required|exists:barang,id',
                    'items.*.qty' => 'required|integer|min:1',
                    'items.*.jumlah_bayar' => 'required|integer',
                ]);

                $totalSeluruhnya = 0;
                $preparedItems = [];

                foreach ($request->items as $item) {
                    $barang = Barang::findOrFail($item['barang_id']);

                    if ($barang->qty < $item['qty']) {
                        throw new \Exception("qty '{$barang->nama_barang}' tidak cukup. Sisa: {$barang->qty}");
                    }
                    $hargaAsli = $barang->harga_barang;

                    if ($hargaAsli === null || $hargaAsli <= 0) {
                        throw new \Exception("Harga untuk barang '{$barang->nama_barang}' belum diatur di database (kolom harga_barang kosong).");
                    }

                    $subtotal = $item['qty'] * $hargaAsli;
                    $totalSeluruhnya += $subtotal;

                    $preparedItems[] = [
                        'barang_id'    => $barang->id,
                        'qty'          => $item['qty'],
                        'harga_barang' => $hargaAsli,
                        'jumlah_bayar' => $item['jumlah_bayar'],
                        'subtotal'     => $subtotal,
                    ];
                }
                $transaksi = Transaksi::create([
                    'pelanggan_id' => $request->pelanggan_id,
                    'total_harga'  => $totalSeluruhnya,
                    'tanggal_beli' => now(),
                ]);
                foreach ($preparedItems as $p) {
                    $transaksi->details()->create([
                        'barang_id'    => $p['barang_id'],
                        'qty'          => $p['qty'],
                        'harga_barang' => $p['harga_barang'],
                        'jumlah_bayar' => $p['jumlah_bayar'],
                        'subtotal'     => $p['subtotal'],
                        'kembalian'    => $p['jumlah_bayar'] - $p['subtotal'],
                    ]);
                    Barang::find($p['barang_id'])->decrement('qty', $p['qty']);
                }

                return new TransaksiResource($transaksi->load(['pelanggan', 'details.barang']));
            } catch (\Exception $th) {
                return response()->json([
                    'success' => false,
                    'error' => 'Gagal Simpan: ' . $th->getMessage()
                ], 400);
            }
        });
    }
    public function show(string $id)
    {
        try {
            $transaksi = Transaksi::with(['pelanggan', 'details.barang',])->findOrFail($id);
            return new TransaksiResource($transaksi);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'error' => $th->getMessage()], 500);
        }
    }
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        return DB::transaction(function () use ($request, $id) {
            try {
                $transaksi = Transaksi::findOrFail($id);

                $request->validate([
                    'pelanggan_id' => 'required|exists:pelanggan,id',
                    'tanggal_beli' => 'required|date',
                    'items' => 'required|array',
                    'items.*.barang_id' => 'required|exists:barang,id',
                    'items.*.qty' => 'required|integer|min:1',
                    'items.*.jumlah_bayar' => 'required|integer',
                ]);
                foreach ($transaksi->details as $oldDetail) {
                    Barang::find($oldDetail->barang_id)->increment('qty', $oldDetail->qty);
                }
                $transaksi->details()->delete();

                $totalSeluruhnya = 0;

                foreach ($request->items as $item) {
                    $barang = Barang::findOrFail($item['barang_id']);

                    if ($barang->qty < $item['qty']) {
                        throw new \Exception("qty '{$barang->nama_barang}' tidak mencukupi. Sisa stok tersedia: {$barang->qty}");
                    }

                    $hargaAsli = $barang->harga_barang;

                    if ($hargaAsli === null || $hargaAsli <= 0) {
                        throw new \Exception("Harga untuk barang '{$barang->nama_barang}' belum diatur.");
                    }

                    $subtotal = $item['qty'] * $hargaAsli;

                    $transaksi->details()->create([
                        'barang_id'    => $item['barang_id'],
                        'qty'          => $item['qty'],
                        'harga_barang' => $hargaAsli,
                        'jumlah_bayar' => $item['jumlah_bayar'],
                        'subtotal'     => $subtotal,
                        'kembalian'    => $item['jumlah_bayar'] - $subtotal,
                    ]);

                    $totalSeluruhnya += $subtotal;

                    $barang->decrement('qty', $item['qty']);
                }

                $transaksi->update([
                    'pelanggan_id' => $request->pelanggan_id,
                    'total_harga'  => $totalSeluruhnya,
                    'tanggal_beli' => $request->tanggal_beli,
                ]);

                return new TransaksiResource($transaksi->load(['pelanggan', 'details.barang']));
            } catch (\Exception $th) {
                return response()->json([
                    'success' => false,
                    'error' => 'Gagal Update: ' . $th->getMessage()
                ], 400);
            }
        });
    }
    public function destroy(string $id)
    {
        try {
            $transaksi = Transaksi::findOrFail($id);
            $transaksi->delete();
            return response()->json(['success' => true, 'message' => 'Data dihapus']);
        } catch (\Exception $th) {
            return response()->json(['success' => false, 'message' => 'Gagal hapus'], 500);
        }
    }
}
                    
