<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenisBarang;
use App\lokasiWarehouse;
use App\informasiBarang;

class apiController extends Controller
{
    public function getJenisBarang()
    {
        $jenis_barang = jenisBarang::all();
        return response()->json($jenis_barang, 200);
    }

    public function getLokasiWarehouse()
    {
        $lokasi_warehouse = lokasiWarehouse::all();
        return response()->json($lokasi_warehouse, 200);
    }

    public function getInformasiBarang()
    {
        $informasi_barang = informasiBarang::all();
        return response()->json($informasi_barang, 200);
    }
}
