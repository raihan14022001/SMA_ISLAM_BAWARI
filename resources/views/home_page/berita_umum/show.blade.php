@extends('home_page.app2')
@section('head')
    <title>berita umum detail</title>
@endsection

@section('isi')
    <p class="text-end">{{ $kategoris->nama_kategori }}</p>
    <br>

    {{-- <p></p> --}}
    <p class="h2 text-center mb-5">{{ $data->judul }}</p>

    <p class="lead mb-5">{!! $data->isi !!}</p>

    <div class="mb-5">
        @foreach ($data->image_blog as $im)
            {{-- <img src="{{ asset()}}" width= '80' height='80'> --}}
            <div class="text-center">
                <img src="{{ asset('/storage/' . $im->image) }}" class="img-fluid mb-3" height="600" width="900">
            </div>
        @endforeach
    </div>
    <div>ini bagian file</div>

    @foreach ($data->lampiran as $file)
        {{-- {{ link_to_asset('/storage/' . $file->path, 'Open the pdf!') }} --}}
        <a href="{{ route('download', ['id' => $file->id]) }}"><i class="bi bi-filetype-pdf">{{ $file->keterangan }}</i></a> <br>
        {{-- <ion-icon name="document-outline"></ion-icon> --}}
        
        {{-- <p>{{ $file->keterangan }}</p> --}}
    @endforeach






    <p class="h4">Creator : {{ $data->user->name }}</p @endsection @section('script') @endsection
