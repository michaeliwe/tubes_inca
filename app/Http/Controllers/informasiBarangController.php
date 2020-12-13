<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\lokasiWarehouse;
use App\informasiBarang;
use App\jenisBarang;

class informasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $informasi_barang = informasiBarang::all();
        // return view('informasi_barang.index', compact('informasi_barang'));
    }

    public function indexReceipt()
    {
        $informasi_barang = informasiBarang::where('type_keluar_masuk', 'masuk')->get();
        return view('informasi_barang.index', compact('informasi_barang'));
    }

    public function indexIssue()
    {
        $informasi_barang = informasiBarang::where('type_keluar_masuk', 'keluar')->get();
        return view('informasi_barang.index', compact('informasi_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();
        $endpoint = "https://procurementdivision.000webhostapp.com/request.php";
        $response = $client->request('GET', $endpoint);
        $responseBody = $response->getBody()->getContents();

        $data_transaksi = json_decode($responseBody, true);
        $jenis_barang = jenisBarang::all();
        $lokasi_warehouse = lokasiWarehouse::all();

        return view('informasi_barang.create', compact('data_transaksi', 'jenis_barang', 'lokasi_warehouse'));
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
            'id_warehouse' => 'required|integer',
            'id_pegawai' => 'required|integer',
            'nama_barang' => 'required|string|max:191',
            'stok_barang' => 'required|string|max:191',
            'tanggal_transaksi' => 'required|date',
            'type_keluar_masuk' => 'required|string|max:191',
        ]);

        informasiBarang::create($validated);

        session()->flash('success', 'Tambah Informasi Barang Berhasil');

        if ($validated['type_keluar_masuk'] === "masuk")
        {
            return redirect()->route('informasi_barang_masuk');
        }

        else
        {
            return redirect()->route('informasi_barang_keluar');
        }

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
        $endpoint = "https://procurementdivision.000webhostapp.com/request.php";
        $response = $client->request('GET', $endpoint);
        $responseBody = $response->getBody()->getContents();

        $data_transaksi = json_decode($responseBody, true);
        $lokasi_warehouse = lokasiWarehouse::all();
        $jenis_barang = jenisBarang::all();

        $informasi_barang = informasiBarang::find($id);

        return view('informasi_barang.edit', compact('data_transaksi', 'jenis_barang', 'informasi_barang', 'lokasi_warehouse'));
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
            'id_warehouse' => 'required|integer',
            'id_pegawai' => 'required|integer',
            'nama_barang' => 'required|string|max:191',
            'stok_barang' => 'required|string|max:191',
            'tanggal_transaksi' => 'required|date',
            'type_keluar_masuk' => 'required|string|max:191',
        ]);

        $informasi_barang = informasiBarang::find($id);
        $informasi_barang->update($validated);

        session()->flash('success', 'Update Informasi Barang Berhasil');

        if ($validated['type_keluar_masuk'] === "masuk")
        {
            return redirect()->route('informasi_barang_masuk');
        }

        else
        {
            return redirect()->route('informasi_barang_keluar');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi_barang = informasiBarang::find($id);
        $type = $informasi_barang->type_keluar_masuk;
        $informasi_barang->delete();

        session()->flash('success', 'Hapus Informasi Barang Berhasil');

        if ($type === "masuk")
        {
            return route('informasi_barang_masuk');
        }

        else
        {
            return route('informasi_barang_keluar');
        }
    }
}
