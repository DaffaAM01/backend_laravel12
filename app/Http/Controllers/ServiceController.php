<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Resources\ServiceResource;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $service = Service::all();
        if (!$request->expectsJson()) {
            return response()->json(['massage' => 'data not found'], 404);
        }
        return ServiceResource::collection($service)
            ->additional(['success' => true, 'massage' => 'data service berhasil diambil']);
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
            $service = $request->validate([
                'pelanggan_id' => 'required|integer|exists:pelanggan,id',
                'barang_id'    =>  'required|integer|exists:barang,id',
                'keluhan'      =>  'required|string',
                'biaya_service' => 'required|integer',
                'status'       =>  'required|in:proses,selesai,diambil',
            ]);
            $service = Service::create([
                'pelanggan_id' => $request->pelanggan_id,
                'barang_id'    =>  $request->barang_id,
                'keluhan'      =>  $request->keluhan,
                'biaya_service' => $request->biaya_service,
                'status'       =>  $request->status,
            ]);
            return response()->json([
                'success' => true,
                'massage' => 'selamat anda telah berhasil menambah data',
                'data'    => new ServiceResource($service)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menambah data',
                'error'   => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            return (new ServiceResource($service))
                ->additional(['success' => true, 'massage' => 'data service berhasil diambil']);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'data not found',
                'error'   => $th->getMessage()
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
                'pelanggan_id' => 'required|integer|exists:pelanggan,id',
                'barang_id'    =>  'required|integer|exists:barang,id',
                'keluhan'      =>  'required|string',
                'biaya_service' => 'required|integer',
                'status'       =>  'required|in:proses,selesai,diambil',
            ]);

            $service = Service::findOrFail($id);
            $service->update($data);

            $service->update([
                'pelanggan_id' => $request->pelanggan_id,
                'barang_id'    =>  $request->barang_id,
                'keluhan'      =>  $request->keluhan,
                'biaya_service' => $request->biaya_service,
                'status'       =>  $request->status,
            ]);
            return response()->json([
                'success' => true,
                'massage' => 'data berhasil diupdate',
                'data'    => new ServiceResource($service)
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal mengupdate data',
                'error'   => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();
            return response()->json([
                'success' => true,
                'massage' => 'data berhsil dihapus',
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'success' => false,
                'massage' => 'gagal menghapus data',
                'error'   => $th->getMessage()
            ]);
        }
    }
}
