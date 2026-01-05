<?php

namespace App\Http\Controllers;

use App\Http\Resources\PelangganResource;
use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::all();
        if (!$request->expectsJson()) {
            return view('pelanggan', compact('pelanggan'));
        }
        return PelangganResource::collection($pelanggan)
            ->additional(['success' => true, 'message' => 'Data Berhasil Diambil']);
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
            $pelanggan = $request->validate([
                'nama_pelanggan' => 'required|string|max:255',
                'alamat' => 'required',
                'noHP' => 'required|string|max:10'
            ]);

            $pelanggan = Pelanggan::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat' => $request->alamat,
                'noHP' => $request->noHP,
            ]);

            return response()->json([
                'success' => true,
                'massage' => 'selamat anda telah berhasil menambah data',
                'data' => $pelanggan
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menambah data',
                'error' => $th->getMessage()
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $pelanggan = Pelanggan::find($id);
            return (new PelangganResource($pelanggan))
                ->additional([
                    'success' => true,
                    'message' => 'Data Berhasil Diambil'
                ]);
            // return response()->json([
            //     'success'=> true,
            //     'massage'=>'data berhasil ditampilkan',
            //     'data'=>$pelanggan
            // ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'data gagal ditampilkan',
                'error' => $th->getMessage()
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
            $data = $request->validate([
                'nama_pelanggan' => 'required|string|max:255',
                'alamat' => 'required',
                'noHP' => 'required|string|max:10'
            ]);

            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->update($data);

            return response()->json([
                'success' => true,
                'message' => 'data anda berhasil diedit',
                'data' => $pelanggan
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'data anda gagal diedit',
                'error' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pelanggan = Pelanggan::findOrFail($id);
            $pelanggan->delete();

            return response()->json([
                'success' => true,
                'massage' => 'Data Anda Berhsil Dihapus',
                'data' => $pelanggan
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menghapus data',
                'error' => $th->getMessage()
            ]);
        }
    }
}
