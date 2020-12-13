@extends('layouts.app')
@section('title','Jenis Barang - ')
@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <h5>Jenis Barang</h5>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('jenis_barang.create') }}" class="btn btn-primary btn-sm float-right">Tambah Jenis Barang</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover dataTable" id="data-table">
                                <thead>
                                <tr>
                                    <th>ID Bahan</th>
                                    <th>Jenis Bahan</th>
                                    <th>Nama Bahan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($jenis_barang as $item)
                                    <tr>
                                        <td>{{ $item->id_bahan }}</td>
                                        <td>{{ $item->jenis_bahan }}</td>
                                        <td>{{ $item->nama_bahan }}</td>
                                        <td>
                                            <a href="{{ route('jenis_barang.edit', $item->id_bahan) }}"
                                               class="btn btn-primary btn-xs">Edit</a>
                                                    <button class="btn btn-danger  btn-xs "
                                                    onclick="forceDeletePost('{{ $item->id_bahan }}','{{ $item->nama_bahan }}')" type="button">Delete</button>
                                        </td>

                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td class="text-center" colspan="6">Data Not Found</td>
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
                text: "Akan Hapus Bahan " + postTitle,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('jenis_barang.destroy', ':postId') }}";
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
