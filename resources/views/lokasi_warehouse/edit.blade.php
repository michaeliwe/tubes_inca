@extends('layouts.app')
@section('content')

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Edit Lokasi Warehouse</strong></span>

                    </div>
                    <div class="card-body">
                        <form action="{{route('lokasi_warehouse.update', $lokasi_warehouse->id_warehouse)}}" method="post">
                            @include('partials.alert_error')
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="id_pegawai">ID Pegawai</label>
                                <select name="id_pegawai" id="id_pegawai" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($data_transaksi as $item)
                                        <option value="{{ $item['id_pegawai'] }}" {{ isset($data_transaksi) ? ($item['id_pegawai'] == $lokasi_warehouse->id_pegawai ? 'selected' : '') : '' }}>
                                            {{ $item['id_pegawai'] . " - " . $item['nama_pegawai'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_bahan">ID Bahan</label>
                                <select name="id_bahan" id="id_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    @foreach($jenis_barang as $item)
                                        <option value="{{ $item->id_bahan }}" {{ isset($jenis_barang) ? ($item->id_bahan == $lokasi_warehouse->id_bahan ? 'selected' : '') : '' }}>
                                            {{ $item->nama_bahan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_warehouse">Alamat Warehouse</label>
                                <input type="text" name="alamat_warehouse" id="alamat_warehouse" class="form-control" value="{{ $lokasi_warehouse->alamat_warehouse }}">
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No Telp</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{ $lokasi_warehouse->no_telp }}">
                            </div>
                            <div class="form-group row float-right d-block">
                                <button class="btn btn-danger  btn-md "
                                        onclick="forceDeletePost('{{ $lokasi_warehouse->id_warehouse }}','{{ $lokasi_warehouse->id_warehouse }}')" type="button">Delete</button>
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
                text: "Akan Hapus Lokasi Warehouse " + postTitle,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('lokasi_warehouse.destroy', ':postId') }}";
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
