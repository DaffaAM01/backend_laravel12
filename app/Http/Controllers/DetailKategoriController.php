<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Resources\DetailKategoriResource;

class DetailKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $detailKategori = Kategori::all();
        if (!$request->expectsJson()) {
            return response()->json([
                'message' => 'Data hanya dapat diakses dalam format JSON'
            ], 406);
        }return DetailKategoriResource::collection($detailKategori)
            ->additional(['success' => true, 'message' => 'Data Detail Kategori Berhasil Diambil']);
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
            $detailKategori = $request->validate([
                'nama_kategori'   => 'required|string|max:255',
                'deskripsi' => 'required|string',
            ]);

            $detailKategori = Kategori::create([
                'nama_kategori'   => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Detail Kategori berhasil ditambahkan',
                'data'    => $detailKategori
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan Detail Kategori',
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
            $detailKategori = Kategori::findOrFail($id);
            return new DetailKategoriResource($detailKategori);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Detail Kategori not found',
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
            $detailKategori = Kategori::findOrFail($id);
            $request->validate([
                'nama_kategori'   => 'required|string|max:255',
                'deskripsi' => 'required|string',
            ]);
            $detailKategori->update([
                'nama_kategori'   => $request->nama_kategori,
                'deskripsi' => $request->deskripsi,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Detail Kategori berhasil diperbarui',
                'data'    => $detailKategori
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui Detail Kategori',
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
            $detailKategori = Kategori::findOrFail($id);
            $detailKategori->delete();

            return response()->json([
                'success' => true,
                'message' => 'Detail Kategori berhasil dihapus'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Detail Kategori',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
