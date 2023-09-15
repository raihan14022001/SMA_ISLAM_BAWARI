@extends('home_page.app2')
@section('head')
    <title>berita umum</title>
@endsection

@section('isi')

    <p>berita umum</p>
    <br>
    <div class="row">
        @if ($data != null)
            @foreach ($data as $dataBlog)
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <img src="{{ asset($dataBlog->image_thumbnail) }}" class="card-img-top" alt="gambar" height="400">
                        {{-- <img src="{{ asset($data->image_thumbnail) }}" width='80' height='80'> --}}

                        <div class="card-body">
                            <h5 class="card-title">{{ $dataBlog->judul }} || {{ $kategori }} </h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content </p>
                            <a href="{{ route('detail.show', ['id' => $dataBlog->id]) }}" class="btn btn-primary">Go
                                somewhere</a>
                            {{-- <a href="{{ route('blog.show', ['id' => $val->id]) }}" class="btn btn-secondary"><i class="fa fa-info"></i></a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>no data</p>
        @endif

        <div>

        </div>
        <br>
        @include('home_page.section.saran_masukan')
    </div>

@endsection


@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
@if (session()->has('success'))
    swal("Success!", "Terima kasih atas saran dan masukannya", "success");
    {{ session()->forget('success'); }}
@endif 
</script>
@endsection
