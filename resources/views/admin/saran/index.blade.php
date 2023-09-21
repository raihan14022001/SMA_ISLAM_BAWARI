@extends('layouts.app')
@section('head')
    <title>Admin | Dashboard</title>
@endsection
@section('url')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Saran dan Masukan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Saran dan Masukan</a></li>
                        {{-- <li class="breadcrumb-item active">Blog</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Kontak</th>
                                        <th>Created</th>
                                        {{-- <th>Created</th> --}}

                                        {{-- <th>Reason</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $val)
                                        <tr>
                                            <td> {{ $key + $data->firstItem() }}</td>
                                            <td>
                                                <a href="{{ route('saran.show', ['id' => $val->id]) }}" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                                                {{-- <a class="btn btn-primary" data-toggle="modal"
                                                    data-target="#modal-lg{{ $val->id }}"><i
                                                        class="fa fa-edit"></i></a> --}}
                                                <a class="btn btn-danger saranDelete" data-id="{{ $val->id }}"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                            <td>{{ $val->nama }}</td>
                                            <td>{{ $val->kontak }}</td>
                                            <td>{{ $val->created_at }}</td>

                                            {{-- <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $data->links() }}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        @include('admin.admin.form')
    </section>
@endsection

@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        @if (session()->has('success_hapus'))
            swal("Success!", "Data Berhasil dihapus", "success");
            {{ session()->forget('success_hapus'); }}
        @endif
        $('.saranDelete').click(function() {
            var id = $(this).attr('data-id');
            swal({
                    title: "Apakah Anda Yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "saran/delete/" + id;
                    } else {
                        swal("Batal menghapus data!");
                    }
                });
        });
    </script>
@endsection
