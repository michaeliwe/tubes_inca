<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\jenisBarang;

class jenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_barang = jenisBarang::all();
        return view('jenis_barang.index', compact('jenis_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis_barang.create');
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
            'jenis_bahan' => 'required|string|max:191',
            'nama_bahan' => 'required|string|max:191',
        ]);

        jenisBarang::create($validated);

        session()->flash('success', 'Tambah Jenis Barang Berhasil');
        return redirect()->route('jenis_barang.index');
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
        $jenis_barang = jenisBarang::find($id);
        return view('jenis_barang.edit', compact('jenis_barang'));
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
            'jenis_bahan' => 'required|string|max:191',
            'nama_bahan' => 'required|string|max:191',
        ]);

        $jenis_barang = jenisBarang::find($id);
        $jenis_barang->update($validated);

        session()->flash('success', 'Update Jenis Barang Berhasil');
        return redirect()->route('jenis_barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_barang = jenisBarang::find($id);
        $jenis_barang->delete();

        session()->flash('success', 'Hapus Jenis Barang Berhasil');
        return route('jenis_barang.index');
    }
}
