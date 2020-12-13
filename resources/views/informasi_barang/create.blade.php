@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Tambah Informasi Barang</strong></span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('informasi_barang.store')}}" method="post">
                            @csrf
                            @include('partials.alert_error')
                            <div class="form-group">
                                <label for="id_warehouse">ID Warehouse</label>
                                <select name="id_warehouse" id="id_warehouse" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($lokasi_warehouse as $item)
                                        <option value="{{ $item->id_warehouse }}">{{ $item->id_warehouse }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pegawai">ID Pegawai</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($data_transaksi as $item)
                                        <option value="{{ $item['id_pegawai'] }}">{{ $item['id_pegawai'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Bahan</label>
                                <select name="nama_barang" id="nama_barang" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($jenis_barang as $item)
                                        <option value="{{ $item->nama_bahan }}">{{ $item->nama_bahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok_barang">Stock Barang</label>
                                <input type="text" name="stok_barang" id="stok_barang" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="type_keluar_masuk">Type Keluar/Masuk</label>
                                <select name="type_keluar_masuk" id="type_keluar_masuk" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="keluar">Bahan Keluar</option>
                                    <option value="masuk">Bahan Masuk</option>
                                </select>
                            </div>
                            <div class="form-group float-right">
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        @if(Session::has('success'))
            swal("Success !", '{{ Session::get('success') }}', "success");
        @endif
    </script>
@endpush
