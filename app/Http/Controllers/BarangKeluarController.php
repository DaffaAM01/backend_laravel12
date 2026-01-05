<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use App\Http\Resources\BarangKeluarResource;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $barangkeluar = BarangKeluar::all();
        if (!$request->expectsJson()) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return BarangKeluarResource::collection($barangkeluar)
            ->additional(['success' => true, 'message' => 'Data Berhasil Diambil']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'barang_id' => 'required|integer|exists:barang,id',
                'jumlah_keluar' => 'required|integer',
                'alasan' => 'required|in:expired,rusak,hilang,lainnya',
                'tanggal_keluar' => 'required|date',
            ]);
            DB::transaction(function ()use  ($request) {
                $barang = Barang::findOrFail($request->barang_id);
                if($barang->qty< $request->jumlah_keluar){
                    throw new \Exception('qty barang tidak mecukupi');
                }
            $barang->decrement('qty', $request->jumlah_keluar);


            $barangkeluar = BarangKeluar::create([
                'barang_id' => $request->barang_id,
                'jumlah_keluar' => $request->jumlah_keluar,
                'alasan' => $request->alasan,
                'tanggal_keluar' => $request->tanggal_keluar,
            ]);



            return response()->json([
                'success' => true,
                'massage' => 'data barang telah ditambahkan',
                'data' => new BarangKeluarResource($barangkeluar)
            ]);
            });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menambah barang yang keluar',
                'erorr' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $barangkeluar = BarangKeluar::findOrFail($id);
            return new BarangKeluarResource($barangkeluar);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'barang berhasil ditampilkan',
                'error'   => $e->getMessage()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $barangkeluar = BarangKeluar::findOrFail($id);
            $barang = Barang::findOrFail($barangkeluar->barang_id);

            $jumlah_lama = $barangkeluar->jumlah_keluar;
            $jumlah_baru = $request->jumlah_keluar;

            $selisih = $jumlah_baru - $jumlah_lama;

            if ($selisih > 0 && $barang->qty < $selisih) {
                return redirect ()-> back ()-> with ('error', 'Stok barang tidak mencukupi untuk pembaruan ini.');
            }
            DB::transaction(function () use ($request, $barangkeluar, $barang, $jumlah_baru,$selisih) {
              $barang->decrement('qty', $selisih);

           $request->validate([
                'barang_id' => 'required|integer|exists:barang,id',
                'jumlah_keluar' => 'required|integer',
                'alasan' => 'required|in:expired,rusak,hilang,lainnya',
                'tanggal_keluar' => 'required|date',
            ]);
            $barangkeluar->update([
                'barang_id' => $request->barang_id,
                'jumlah_keluar' => $jumlah_baru,
                'alasan' => $request->alasan,
                'tanggal_keluar' => $request->tanggal_keluar,
            ]);

            return response()->json([
                'success' => true,
                'massage' => 'data barang telah diupdate',
                'data' => new BarangKeluarResource($barangkeluar)
            ]);
         });
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal mengupdate barang yang dikeluarkan',
                'erorr' => $e->getMessage()
            ]);
        }
    }

    public function destroy(string $id)
    {
        try {
            $barangkeluar = BarangKeluar::findOrFail($id);
            $barangkeluar->delete();

            return response()->json([
                'success' => true,
                'massage' => 'data barang yang dikeluarkan telah berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menghapus barang yang dikeluarkan',
                'erorr' => $e->getMessage()
            ]);
        }
    }
}
