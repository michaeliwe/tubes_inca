<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\lokasiWarehouse;
use App\jenisBarang;

class lokasiWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi_warehouse = lokasiWarehouse::all();
        return view('lokasi_warehouse.index', compact('lokasi_warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $endpoint = "https://procurementdivision.000webhostapp.com/pegawai.php";
        $response = $client->request('GET', $endpoint);
        $responseBody = $response->getBody()->getContents();

        $data_transaksi = json_decode($responseBody, true);
        $jenis_barang = jenisBarang::all();

        return view('lokasi_warehouse.create', compact('data_transaksi', 'jenis_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'id_bahan' => 'required|integer',
            'alamat_warehouse' => 'required|string|max:191',
            'no_telp' => 'required|string|max:191',
        ]);

        lokasiWarehouse::create($validated);

        session()->flash('success', 'Tambah Lokasi Warehouse Berhasil');
        return redirect()->route('lokasi_warehouse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();
        $endpoint = "https://procurementdivision.000webhostapp.com/pegawai.php";
        $response = $client->request('GET', $endpoint);
        $responseBody = $response->getBody()->getContents();

        $data_transaksi = json_decode($responseBody, true);
        $jenis_barang = jenisBarang::all();
        $lokasi_warehouse = lokasiWarehouse::find($id);

        return view('lokasi_warehouse.edit', compact('data_transaksi', 'jenis_barang', 'lokasi_warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_pegawai' => 'required|integer',
            'id_bahan' => 'required|integer',
            'alamat_warehouse' => 'required|string|max:191',
            'no_telp' => 'required|string|max:191',
        ]);

        $lokasi_warehouse = lokasiWarehouse::find($id);
        $lokasi_warehouse->update($validated);

        session()->flash('success', 'Update Lokasi Warehouse Berhasil');
        return redirect()->route('lokasi_warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi_warehouse = lokasiWarehouse::find($id);
        $lokasi_warehouse->delete();

        session()->flash('success', 'Hapus Lokasi Warehouse Berhasil');
        return route('lokasi_warehouse.index');
    }
}
