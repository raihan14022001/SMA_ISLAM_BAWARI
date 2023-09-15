@extends('home_page.app2')
@section('head')
    <title>Profile</title>
@endsection

@section('isi')
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">


                    <br>

                </div>
            </div>
            <div class="col-3">
                @include('home_page.section.saran_masukan')
            </div>

        </div>

    </div>
@endsection


@section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if (session()->has('success'))
            swal("Success!", "Terima kasih atas saran dan masukannya", "success");
            {{ session()->forget('success') }}
        @endif
    </script>
@endsection
