@extends('layouts.app')

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Tambah Jenis Barang</strong></span>
                    </div>
                    <div class="card-body">
                        <form action="{{route('jenis_barang.store')}}" method="post">
                            @csrf
                            @include('partials.alert_error')
                            <div class="form-group">
                                <label for="jenis_bahan">Jenis Bahan</label>
                                <select name="jenis_bahan" id="jenis_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Raw Material">Raw Material</option>
                                    <option value="Finished Material">Finished Material</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_bahan">Nama Bahan</label>
                                <select name="nama_bahan" id="nama_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Kulit Sapi Coklat">Kulit Sapi Coklat</option>
                                    <option value="Kulit Sapi Hitam">Kulit Sapi Hitam</option>
                                    <option value="Kulit Sapi Silver">Kulit Sapi Silver</option>
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
