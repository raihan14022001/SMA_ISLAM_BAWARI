@extends('layouts.app')
@section('head')
    <title>Blog | Dashboard</title>
@endsection
@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('blog.save') }}" id="form_blog" method="POST" enctype="multipart/form-data">
                                @csrf
                                @isset($data)
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                @endisset
                                <label for="judul">Judul</label>
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" id="user_id">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="judul" name="judul" id="judul" autocomplete="off">
                                </div>
                                @error('judul')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label>Thumbnail</label>
                                    <br>
                                    <input type="file" name="image_thumbnail" id="image_thumbnail">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <br>
                                    <input type="file" name="image" id="image" multiple>
                                </div>
                                @error('image')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                {{-- <br> --}}
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori" required>
                                        <option></option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kategori')
                                    <div class="invalid-feddback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label>Konten</label>
                                <textarea name="isi" id="isi" rows="4" cols="50" required>>@isset($data){{ $data->isi }} @endisset</textarea>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a href="{{ route('blog') }}" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </form>
    </section>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        type="text/javascript"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#isi'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        $().ready(function() {
            $("#form_blog").validate({
                ignore: [],
                rules: {
                    isi: {
                        required: true,
                    },
                },
                messages: {
                    isi: {
                        required: "",
                    },
                },
            });
        });
    </script>

    <script>
        @isset($data)
            $('#judul').val('{{ $data['judul'] }}').toString();
            $('#image_thumbnail').val('{{ $data['image_thumbnail'] }}').toString();
            $('#isi').val('{{ $data['isi'] }}').toString();
            $('#image').val('{{ $data['image_blog']['image'] }}').toString();
            $('#kategori').val('{{ $data['nama_kategori']['kategori'] }}').toString();
        @endisset
    </script>
@endsection
