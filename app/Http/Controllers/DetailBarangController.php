<?php

namespace App\Http\Controllers;

use App\Models\DetailBarang;
use Illuminate\Http\Request;
use App\Http\Resources\DetailBarangResource;

class DetailBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $barangDetails = DetailBarang::all();
        if (!$request->expectsJson()) {
            return view('#', compact('barangDetails'));
        }
        return DetailBarangResource::collection($barangDetails)
            ->additional(['success' => true, 'message' => 'Data Berhasil Diambil']);
    }

    /**;
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
                'barang_id' => 'required|exists:barang,id',
                'deskripsi'   => 'required|string',
                'kategori_id'    => 'required|exists:kategori,id',
                'harga_jual'  => 'required|integer',
            ]);

            $detailBarang = DetailBarang::create([
                'barang_id' => $request->barang_id,
                'deskripsi'   => $request->deskripsi,
                'kategori_id'    => $request->kategori_id,
                'harga_jual'  => $request->harga_jual,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Detail Barang berhasil ditambahkan',
                'data'    => $detailBarang
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan Detail Barang',
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
            $detailBarang = DetailBarang::findOrFail($id);
            return new DetailBarangResource($detailBarang);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Detail Barang tidak ditemukan',
                'error'   => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $detailBarang = DetailBarang::findOrFail($id);

            $request->validate([
                'barang_id' => 'required|exists:barang,id',
                'deskripsi'   => 'required|string',
                'kategori_id'    => 'required|exists:barang,id',
                'harga_jual'  => 'required|integer',
            ]);

            $detailBarang->update([
                'barang_id' => $request->barang_id,
                'deskripsi'   => $request->deskripsi,
                'kategori_id'    => $request->kategori_id,
                'harga_jual'  => $request->harga_jual,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Detail Barang berhasil diupdate',
                'data'    => $detailBarang
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate Detail Barang',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $detailBarang = DetailBarang::findOrFail($id);
            $detailBarang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Detail Barang berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Detail Barang',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
