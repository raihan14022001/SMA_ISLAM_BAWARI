@extends('layouts.app')
@section('head')
    <title>Blog | Dashboard</title>
@endsection
@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Responsive Hover Table</h3>
                            <a href="{{ route('blog.create') }}" class="btn btn-success float-right" ><i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">

                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Action</th>
                                        <th>Thumbnail</th>
                                        <th>Judul</th>
                                        <th>Kategori</th> 
                                        {{-- <th>Thumbnail</th> --}}
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
                                                <a href="{{ route('blog.edit',['id'=>$val->id]) }}" class="btn btn-primary" ><i class="fa fa-edit"></i></a>
                                                
                                                <a class="btn btn-danger userDelete" data-id="{{ $val->id }}"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td>
                                                {{-- <img src="" width= '50' height='50'  alt="image_thumbnail"> --}}
                                                <img src="{{ asset($val->image_thumbnail)}}" width= '50' height='50' >
                                                {{-- {{ $val->image_thumbnail }} --}}
                                                {{-- {{ asset($val->image_thumbnail) }} --}}
                                            </td>
                                            {{-- <img src="{{ asset($item->photo) }}" width= '50' height='50' --}}
                                            <td>{{  $val->judul }}</td>
                                            <td>{{  $val->kategori->nama_kategori }}</td>
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
                 {{-- <textarea name="isi" id="isi"></textarea> --}}

                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    @include('admin.blog.form')
@endsection

@section('script')


@endsection
