<?php

namespace App\Http\Controllers;

use App\Models\DataToko;
use Illuminate\Http\Request;
use App\Http\Resources\DataTokoResource;

class DataTokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $datatoko = DataToko::all();
        if (!$request->expectsJson()) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return DataTokoResource::collection($datatoko)
            ->additional(['success' => true, 'message' => 'Data Toko Berhasil Diambil']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_toko' => 'required|string|max:255',
                'alamat_toko' => 'required|string|max:255',
                'noHP_toko' => 'required|string|max:15',
                'pesan_footer' => 'required|string',
            ]);
            $datatoko = DataToko::create([
                'nama_toko' => $request->nama_toko,
                'alamat_toko' => $request->alamat_toko,
                'noHP_toko' => $request->noHP_toko,
                'pesan_footer' => $request->pesan_footer,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Data Toko berhasil ditambahkan',
                'data'    => new DataTokoResource($datatoko)
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menambahkan Data Toko',
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
            $datatoko = DataToko::findOrFail($id);
            return new DataTokoResource($datatoko);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Toko gagal dimasukkan',
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
            $datatoko = DataToko::findOrFail($id);

            $request->validate([
                'nama_toko' => 'required|string|max:255',
                'alamat_toko' => 'required|string|max:255',
                'noHP_toko' => 'required|string|max:15',
                'pesan_footer' => 'required|string',
            ]);

            $datatoko->update([
                'nama_toko' => $request->nama_toko,
                'alamat_toko' => $request->alamat_toko,
                'noHP_toko' => $request->noHP_toko,
                'pesan_footer' => $request->pesan_footer,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Toko berhasil diupdate',
                'data'    => new DataTokoResource($datatoko)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate Data Toko',
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
            $datatoko = DataToko::findorFail($id);
            $datatoko->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Toko berhasil dihapus'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Data Toko',
                'error'   => $th->getMessage()
            ], 500);
        }
    }
}
