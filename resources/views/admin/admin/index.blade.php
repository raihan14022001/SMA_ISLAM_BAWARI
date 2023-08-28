@extends('layouts.app')
@section('head')
    <title>Admin | Dashboard</title>
@endsection
@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>
                            {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
                            <a href="" class="btn btn-success float-right"data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i></a>
                            {{-- <button type="button" class="btn btn-default" >
                                Launch Large Modal
                              </button> --}}
                            {{-- <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Email</th>
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
                                                <a href="" class="btn btn-secondary"><i class="fa fa-info"></i></a>
                                                <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td>{{  $val->name }}</td>
                                            <td>{{  $val->email }}</td>
                                            <td>{{  $val->created_at }}</td>

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

@section('js')
@endsection
