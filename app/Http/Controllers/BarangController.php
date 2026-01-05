<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Resources\BarangResource;

class BarangController extends Controller
{
    public function index(Request $request)
    {

        $barang = Barang::all();
        if (!$request->expectsJson()) {
            return view('dashboard', compact('barang'));
        }
        return BarangResource::collection($barang)
            ->additional(['success' => true, 'message' => 'Data Berhasil Diambil']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    

    public function store(Request $request)
    {
        try {
            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'nama_barang' => 'required|string',
                'qty' => 'required|integer',
                'harga_barang' => 'required|integer',
            ]);

            $filename = null;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('products'), $filename);
            }
            $barang = Barang::create([
                'image'        => $filename,
                'nama_barang'  => $request->nama_barang,
                'qty'        => $request->qty,
                'harga_barang' => $request->harga_barang
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Barang Berhasil Ditambah dan Disimpan',
                'data' => $barang
            ], 201);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $barang = Barang::findOrFail($id);

            return new BarangResource($barang);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'error' => 'Data tidak ditemukan: ' . $th->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $barang = Barang::findOrFail($id);

            $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nama_barang' => 'required|string|max:255',
                'qty' => 'required|integer',
                'harga_barang' => 'required|integer',
            ]);

            $filename = $barang->image;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('products'), $filename);
            }

            $barang->update([
                'image' => $filename,
                'nama_barang' => $request->nama_barang,
                'qty' => $request->qty,
                'harga_barang' => $request->harga_barang,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data Barang Berhasil Diupdate',
                'data' => new BarangResource($barang)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengupdate data',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    

    public function destroy(Request $request, string $id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();

            // Jika request berasal dari API (Postman)
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data Barang berhasil dihapus',
                    'data' => $barang
                ]);
            }

            return redirect()->route('dashboard')->with('success', 'Barang berhasil dihapus!');
        } catch (\Exception $th) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal menghapus data',
                    'error' => $th->getMessage()
                ], 500);
            }
            return back()->withErrors(['error' => 'Gagal menghapus data: ' . $th->getMessage()]);
        }
    }
}
