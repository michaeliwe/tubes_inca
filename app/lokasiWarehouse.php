<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasiWarehouse extends Model
{
    protected $table = 'lokasi_warehouse';
    protected $primaryKey = 'id_warehouse';
    protected $fillable = [
        'id_pegawai', 'id_bahan', 'alamat_warehouse', 'no_telp'
    ];
    public $timestamps = false;

    public function jenis_barang()
    {
        return $this->belongsTo(jenisBarang::class, 'id_bahan');
    }

    public function informasi_barang()
    {
        return $this->hasMany(informasiBarang::class, 'id_warehouse');
    }
}
