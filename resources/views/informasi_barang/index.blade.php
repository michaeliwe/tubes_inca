@extends('layouts.app')
@section('title','Informasi Barang - ')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <h5>Informasi Barang</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('informasi_barang.create') }}" class="btn btn-primary btn-sm float-right">Tambah Informasi Barang</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="data-table">
                                <thead>
                                <tr>
                                    <th>Tanggal Transaksi</th>
                                    <th>ID Warehouse</th>
                                    <th>ID Pegawai</th>
                                    <th>Nama Bahan</th>
                                    <th>Stok Bahan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($informasi_barang as $item)
                                    <tr>
                                        <td>{{ $item->tanggal_transaksi }}</td>
                                        <td>{{ $item->id_warehouse }}</td>
                                        <td>{{ $item->id_pegawai }}</td>
                                        <td>{{ $item->nama_barang }}</td>
                                        <td>{{ $item->stok_barang }}</td>
                                        <td>
                                            <a href="{{ route('informasi_barang.edit', $item->id) }}"
                                               class="btn btn-primary btn-xs">Edit</a>
                                                    <button class="btn btn-danger  btn-xs "
                                                    onclick="forceDeletePost('{{ $item->id }}','{{ $item->id }}')" type="button">Delete</button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td class="text-center" colspan="7">Data Not Found</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

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

    <script>

            $('#data-table').DataTable();
    </script>
@endpush
