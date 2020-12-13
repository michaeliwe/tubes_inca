<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisBarang extends Model
{
    protected $table = 'jenis_barang';
    protected $primaryKey = 'id_bahan';
    protected $fillable = [
        'jenis_bahan', 'nama_bahan'
    ];
    public $timestamps = false;

    public function lokasi_warehouse()
    {
        return $this->hasMany(lokasiWarehouse::class, 'id_bahan');
    }
}
