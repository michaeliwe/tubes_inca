<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class informasiBarang extends Model
{
    protected $table = 'informasi_barang';
    protected $fillable = [
        'id_warehouse','id_pegawai', 'nama_barang', 'stok_barang', 'tanggal_transaksi', 'type_keluar_masuk'
    ];
    public $timestamps = false;

    public function lokasi_warehouse()
    {
        return $this->belongsTo(lokasiWarehouse::class, 'id_warehouse');
    }
}
