<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DataTokoController;
use App\Http\Controllers\SuplayerController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DetailBarangController;
use App\Http\Controllers\DetailKategoriController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'loginAPI']);
    Route::get('/users', [AuthController::class, 'index'])->middleware('auth:sanctum');
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});

Route::prefix("barang")->group(function () {
    Route::post('/', [BarangController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [BarangController::class, 'index']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::put('/{id}', [BarangController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [BarangController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("pelanggan")->group(function () {
    Route::post('/', [PelangganController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [PelangganController::class, 'index']);
    Route::get('/{id}', [PelangganController::class, 'show']);
    Route::put('/{id}', [PelangganController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [PelangganController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("transaksi")->group(function () {
    Route::post('/', [TransaksiController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [TransaksiController::class, 'index']);
    Route::get('/{id}', [TransaksiController::class, 'show']);
    Route::put('/{id}', [TransaksiController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [TransaksiController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("suplayer")->group(function () {
    Route::post('/', [SuplayerController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [SuplayerController::class, 'index']);
    Route::get('/{id}', [SuplayerController::class, 'show']);
    Route::put('/{id}', [SuplayerController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [SuplayerController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("kategori")->group(function () {
    Route::post('/', [DetailKategoriController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [DetailKategoriController::class, 'index']);
    Route::get('/{id}', [DetailKategoriController::class, 'show']);
    Route::put('/{id}', [DetailKategoriController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [DetailKategoriController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("DetailBarang")->group(function () {
    Route::post('/', [DetailBarangController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [DetailBarangController::class, 'index']);
    Route::get('/{id}', [DetailBarangController::class, 'show']);
    Route::put('/{id}', [DetailBarangController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [DetailBarangController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("barangmasuk")->group(function () {
    Route::post('/', [BarangMasukController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::get('/{id}', [BarangMasukController::class, 'show']);
    Route::put('/{id}', [BarangMasukController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [BarangMasukController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("datatoko")->group(function () {
    Route::post('/', [DataTokoController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [DataTokoController::class, 'index']);
    Route::get('/{id}', [DataTokoController::class, 'show']);
    Route::put('/{id}', [DataTokoController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [DataTokoController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("barangkeluar")->group(function () {
    Route::post('/', [BarangKeluarController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::get('/{id}', [BarangKeluarController::class, 'show']);
    Route::put('/{id}', [BarangKeluarController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy'])->middleware('auth:sanctum');;
});

Route::prefix("service")->group(function () {
    Route::post('/', [ServiceController::class, 'store'])->middleware('auth:sanctum');;
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/{id}', [ServiceController::class, 'show']);
    Route::put('/{id}', [ServiceController::class, 'update'])->middleware('auth:sanctum');;
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->middleware('auth:sanctum');;
});

