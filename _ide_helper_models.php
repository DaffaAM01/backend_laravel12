<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $image
 * @property string $nama_barang
 * @property int $qty
 * @property int $harga_barang
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaksi> $transaksi
 * @property-read int|null $transaksi_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereHargaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereNamaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Barang whereUpdatedAt($value)
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $barang_id
 * @property int $jumlah_keluar
 * @property string $alasan
 * @property string $tanggal_keluar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereJumlahKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereTanggalKeluar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangKeluar whereUpdatedAt($value)
 */
	class BarangKeluar extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $barang_id
 * @property int $suplayer_id
 * @property int $jumlah_masuk
 * @property string $tanggal_masuk
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Suplayer $suplayer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereJumlahMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereSuplayerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BarangMasuk whereUpdatedAt($value)
 */
	class BarangMasuk extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_toko
 * @property string $alamat_toko
 * @property string $noHP_toko
 * @property string $pesan_footer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereAlamatToko($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereNamaToko($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereNoHPToko($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko wherePesanFooter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DataToko whereUpdatedAt($value)
 */
	class DataToko extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $barang_id
 * @property int $kategori_id
 * @property string $deskripsi
 * @property int $harga_jual
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \App\Models\Kategori $kategori
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereHargaJual($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereKategoriId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailBarang whereUpdatedAt($value)
 */
	class DetailBarang extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $transaksi_id
 * @property int $barang_id
 * @property int $qty
 * @property int $harga_barang
 * @property int $subtotal
 * @property int $jumlah_bayar
 * @property int $kembalian
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereHargaBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereJumlahBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereKembalian($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DetailTransaksi whereUpdatedAt($value)
 */
	class DetailTransaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_kategori
 * @property string|null $deskripsi
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Barang> $barangs
 * @property-read int|null $barangs_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereNamaKategori($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kategori whereUpdatedAt($value)
 */
	class Kategori extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_pelanggan
 * @property string $alamat
 * @property string $noHP
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaksi> $transaksi
 * @property-read int|null $transaksi_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereNamaPelanggan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereNoHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pelanggan whereUpdatedAt($value)
 */
	class Pelanggan extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $pelanggan_id
 * @property int $barang_id
 * @property string $keluhan
 * @property int $biaya_service
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Pelanggan $pelanggan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereBiayaService($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereKeluhan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service wherePelangganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nama_suplayer
 * @property string $nama_perusahaan
 * @property string $alamat
 * @property string $noHP
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereNamaPerusahaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereNamaSuplayer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereNoHP($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Suplayer whereUpdatedAt($value)
 */
	class Suplayer extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $pelanggan_id
 * @property int $total_harga
 * @property string $tanggal_beli
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DetailTransaksi> $details
 * @property-read int|null $details_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Pelanggan $pelanggan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi wherePelangganId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi whereTanggalBeli($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi whereTotalHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transaksi whereUpdatedAt($value)
 */
	class Transaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

