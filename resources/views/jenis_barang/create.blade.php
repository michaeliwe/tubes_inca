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
                                <input type="text" name="jenis_bahan" id="jenis_bahan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama_bahan">Nama Bahan</label>
                                <input type="text" name="nama_bahan" id="nama_bahan" class="form-control">
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
