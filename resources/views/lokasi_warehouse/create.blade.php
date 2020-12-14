@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Tambah Lokasi Warehouse</strong></span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('lokasi_warehouse.store')}}" method="post">
                            @csrf
                            @include('partials.alert_error')
                            <div class="form-group">
                                <label for="id_pegawai">ID Pegawai</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($data_transaksi as $item)
                                        <option value="{{ $item['id_pegawai'] }}">{{ $item['id_pegawai'] . " - " . $item['nama_pegawai'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_bahan">ID Bahan</label>
                                <select name="id_bahan" id="id_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($jenis_barang as $item)
                                        <option value="{{ $item->id_bahan }}">{{ $item->nama_bahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_warehouse">Alamat Warehouse</label>
                                <input type="text" name="alamat_warehouse" id="alamat_warehouse" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control">
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
