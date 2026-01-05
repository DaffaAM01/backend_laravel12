<?php

namespace App\Http\Controllers;

use App\Models\Suplayer;
use Illuminate\Http\Request;
use App\Http\Resources\SuplayerResource;

class SuplayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suplayer = Suplayer::all();
        if (!$request->expectsJson()) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return SuplayerResource::collection($suplayer)
            ->additional(['success' => true, 'message' => 'Data Suplayer Berhasil Diambil']);
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
        $request->validate([
            'nama_suplayer'   => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'alamat'         => 'required|string|max:255',
            'noHP'           => 'required|string|max:15',
        ]);

        $suplayer = Suplayer::create([
            'nama_suplayer'   => $request->nama_suplayer,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat'         => $request->alamat,
            'noHP'           => $request->noHP,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Suplayer berhasil ditambahkan',
            'data'    => new SuplayerResource($suplayer)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suplayer = Suplayer::find($id);
        if (!$suplayer) {
            return response()->json(['message' => 'Suplayer not found'], 404);
        }
        return new SuplayerResource($suplayer);
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
            $suplayer = Suplayer::findOrFail($id);

            $request->validate([
                'nama_suplayer'   => 'required|string|max:255',
                'nama_perusahaan' => 'required|string|max:255',
                'alamat'         => 'required|string|max:255',
                'noHP'           => 'required|string|max:15',
            ]);

            $suplayer->update([
                'nama_suplayer'   => $request->nama_suplayer,
                'nama_perusahaan' => $request->nama_perusahaan,
                'alamat'         => $request->alamat,
                'noHP'           => $request->noHP,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Suplayer berhasil diupdate',
                'data'    => new SuplayerResource($suplayer)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate Suplayer',
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
            $suplayer = Suplayer::findOrFail($id);
            $suplayer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Suplayer berhasil dihapus'
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus Suplayer',
                'error'   => $th->getMessage()
            ], 500);
        }
    }
}
