@extends('layouts.app')
@section('content')

    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card no-b my-3 shadow">
                    <div class="card-header white">
                        <span class="card-title"><strong>Edit Jenis Barang</strong></span>

                    </div>
                    <div class="card-body">
                        <form action="{{route('jenis_barang.update', $jenis_barang->id_bahan)}}" method="post">
                            @include('partials.alert_error')
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="jenis_bahan">Jenis Bahan</label>
                                <select name="jenis_bahan" id="jenis_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Raw Material" {{ 'Raw Material' == $jenis_barang->jenis_bahan ? 'selected' : '' }}>
                                        Raw Material
                                    </option>
                                    <option value="Finished Material" {{ 'Finished Material' == $jenis_barang->jenis_bahan ? 'selected' : '' }}>
                                        Finished Material
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_bahan">Nama Bahan</label>
                                <select name="nama_bahan" id="nama_bahan" class="form-control select2">
                                    <option selected disabled>Pilih satu</option>
                                    <option value="Kulit Sapi Coklat" {{ 'Kulit Sapi Coklat' == $jenis_barang->nama_bahan ? 'selected' : '' }}>
                                        Kulit Sapi Coklat
                                    </option>
                                    <option value="Kulit Sapi Hitam" {{ 'Kulit Sapi Hitam' == $jenis_barang->nama_bahan ? 'selected' : '' }}>
                                        Kulit Sapi Hitam
                                    </option>
                                    <option value="Kulit Sapi Silver" {{ 'Kulit Sapi Silver' == $jenis_barang->nama_bahan ? 'selected' : '' }}>
                                        Kulit Sapi Silver
                                    </option>
                                </select>
                            </div>
                            <div class="form-group row float-right d-block">
                                <button class="btn btn-danger  btn-md "
                                        onclick="forceDeletePost('{{ $jenis_barang->id_bahan }}','{{ $jenis_barang->nama_bahan }}')" type="button">Delete</button>
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
@endpush
