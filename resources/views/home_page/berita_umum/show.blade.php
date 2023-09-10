@extends('home_page.app2')
@section('head')
    <title>berita umum detail</title>
@endsection

@section('isi')

<p class="text-end" >{{ $kategoris->nama_kategori }}</p>
<br>

{{-- <p></p> --}}
<p class="h2 text-center mb-5">{{ $data->judul }}</p>

<p class="lead mb-5">{!! $data->isi !!}</p>

<div class="mb-5">
@foreach ($data->image_blog as $im)
{{-- <img src="{{ asset()}}" width= '80' height='80'> --}}
<div class="text-center">
<img src="{{ asset('/storage/' . $im->image) }}" class="img-fluid mb-3"  height="600" width="900">
</div>
@endforeach   
</div>




<p class="h4">Creator : {{ $data->user->name }}</p

@endsection
@section('script')
@endsection
