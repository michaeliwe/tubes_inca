@extends('layouts.app')
@section('content')

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Edit Informasi Barang</strong></span>

                    </div>
                    <div class="card-body">
                        <form action="{{route('informasi_barang.update', $informasi_barang->id)}}" method="post">
                            @include('partials.alert_error')
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_warehouse">ID Warehouse</label>
                                <select name="id_warehouse" id="id_warehouse" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($lokasi_warehouse as $item)
                                        <option value="{{ $item->id_warehouse }}" {{ isset($jenis_barang) ? ($item->id_warehouse == $informasi_barang->id_warehouse ? 'selected' : '') : '' }}>
                                            {{ $item->id_warehouse }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_pegawai">ID Pegawai</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($data_transaksi as $item)
                                        <option value="{{ $item['id_pegawai'] }}" {{ isset($data_transaksi) ? ($item['id_pegawai'] == $informasi_barang->id_pegawai ? 'selected' : '') : '' }}>
                                            {{ $item['id_pegawai'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">ID Bahan</label>
                                <select name="nama_barang" id="nama_barang" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($jenis_barang as $item)
                                        <option value="{{ $item->nama_bahan }}" {{ isset($jenis_barang) ? ($item->nama_bahan == $informasi_barang->nama_barang ? 'selected' : '') : '' }}>
                                            {{ $item->nama_bahan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok_barang">Stock Barang</label>
                                <input type="number" name="stok_barang" id="stok_barang" class="form-control" value="{{ $informasi_barang->stok_barang }}">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_transaksi">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control" value="{{ $informasi_barang->tanggal_transaksi }}">
                            </div>
                            <div class="form-group">
                                <label for="type_keluar_masuk">Type Keluar/Masuk</label>
                                <select name="type_keluar_masuk" id="type_keluar_masuk" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="keluar" {{ 'keluar' == $informasi_barang->type_keluar_masuk ? 'selected' : '' }}>
                                        Bahan Keluar
                                    </option>
                                    <option value="masuk" {{ 'masuk' == $informasi_barang->type_keluar_masuk ? 'selected' : '' }}>
                                        Bahan Masuk
                                    </option>
                                </select>
                            </div>
                            <div class="form-group row float-right d-block">
                                <button class="btn btn-danger  btn-md "
                                        onclick="forceDeletePost('{{ $informasi_barang->id }}','{{ $informasi_barang->id }}')" type="button">Delete</button>
                                <button class="btn btn-primary  btn-md ">Update</button>
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function forceDeletePost(postId, postTitle) {
            swal({
                title: "Apakah yakin?",
                text: "Akan Hapus Informasi Barang " + postTitle,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('informasi_barang.destroy', ':postId') }}";
                    theUrl = theUrl.replace(":postId", postId);
                    $.ajax({
                        type: 'POST',
                        url: theUrl,
                        data: {_method: "delete"},
                        success: function (data) {
                            window.location.href = data;
                        },
                        error: function (data) {
                            console.log(data);
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });
                }
            }));
        }
    </script>
@endpush
