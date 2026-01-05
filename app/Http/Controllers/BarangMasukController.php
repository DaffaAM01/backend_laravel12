<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use App\Http\Resources\BarangMasukResource;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $stockMasuk = BarangMasuk::all();
        if (!$request->expectsJson()) {
            return response()->json([
                'message' => 'Data hanya dapat diakses dalam format JSON'
            ], 406);
        }
        return BarangMasukResource::collection($stockMasuk)
            ->additional(['success' => true, 'message' => 'Data Barang Masuk Berhasil Diambil']);
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
            $stockMasuk = $request->validate([
                'barang_id'   => 'required|integer|exists:barang,id',
                'suplayer_id' => 'required|integer|exists:suplayer,id',
                'jumlah_masuk' => 'required|integer',
                'tanggal_masuk' => 'required|date',
            ]);

            $stockMasuk = BarangMasuk::create([
                'barang_id'   => $request->barang_id,
                'suplayer_id' => $request->suplayer_id,
                'jumlah_masuk' => $request->jumlah_masuk,
                'tanggal_masuk' => $request->tanggal_masuk,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Barang yang telah Masuk berhasil ditambahkan',
                'data'    => new BarangMasukResource($stockMasuk)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan Barang yang telah dimasukkan',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $stockMasuk = BarangMasuk::findOrFail($id);
            return new BarangMasukResource($stockMasuk);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'QTY Barang tidak ditemukan',
                'error'   => $e->getMessage()
            ], 404);
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
            $stockMasuk = BarangMasuk::findOrFail($id);

            $request->validate([
                'barang_id'   => 'required|integer|exists:barang,id',
                'suplayer_id' => 'required|integer|exists:suplayer,id',
                'jumlah_masuk' => 'required|integer',
                'tanggal_masuk' => 'required|date',
            ]);

            $stockMasuk->update([
                'barang_id'   => $request->barang_id,
                'suplayer_id' => $request->suplayer_id,
                'jumlah_masuk' => $request->jumlah_masuk,
                'tanggal_masuk' => $request->tanggal_masuk,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Barang yang telah dimasukkan berhasil diupdate',
                'data'    => new BarangMasukResource($stockMasuk)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate Barang yang telah ddimasukkan',
                'error'   => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $stockMasuk = BarangMasuk::findOrFail($id);
            $stockMasuk->delete();

            return response()->json([
                'success' => true,
                'message' => 'barang yang telah dimasukkan berhasil dihapus'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus barang yang telah dimasukkan',
                'error'   => $th->getMessage()
            ], 500);
        }
    }
}
