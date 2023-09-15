<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    @yield('head')

</head>

<body>
    <div class="container-fluid">
        <marquee class="fs-2"> Selamat Datang di Website SMA ISLAM BAWARI PONTIANAK</marquee>
        <img class="mx-auto d-block mt-2 mb-2" src="{{ asset('Sma/sma bawari.png') }}" alt="">
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded fs-4 " aria-label="Thirteenth navbar example">
        <div class="container-fluid" style="background-color: #1a7db7">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11"
                aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0" href="#"></a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Profil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Home</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('visimisi')}}">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="{{url('sejarahsingkat')}}">Sejarah Singkat</a></li>
                            <li><a class="dropdown-item" href="{{url('sarjanaprasajana')}}">Sarjana & Prasajana</a></li>
                            <li><a class="dropdown-item" href="{{url('strukturorganisasi')}}">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{url('sambutankepalasekolah')}}">Sambutan Kepala Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{url('kemitraan')}}">Kemitraan</a></li>
                            <li><a class="dropdown-item" href="{{url('programkerja')}}">Program Kerja</a></li>
                            <li><a class="dropdown-item" href="{{url('komitesekolah')}}">komite Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{url('prestasi')}}">Presitasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">Guru</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('direktoriguru')}}">Direktori Guru</a></li>
                            <li><a class="dropdown-item" href="{{url('prestasiguru')}}">Prestasi Guru</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">Siswa</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('direktorisiswa')}}">Direktori Siswa</a></li>
                            <li><a class="dropdown-item" href="{{url('prestasisiswa')}}">Prestasi Siswa</a></li>
                            <li><a class="dropdown-item" href="{{url('ektrakurikuler')}}">Ektrakurikuler</a></li>
                            <li><a class="dropdown-item" href="{{url('osis')}}">Osis</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" data-bs-toggle="dropdown" aria-expanded="false">Berita</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('beritasekolah')}}">Berita Sekolah</a></li>
                            <li><a class="dropdown-item" href="{{url('beritaumum')}}">Berita Umum</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Informasi</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('kalenderakademik')}}">Kalender Akademik</a></li>
                            <li><a class="dropdown-item" href="{{url('beasiswa')}}">Beasiswa</a></li>
                            <li><a class="dropdown-item" href="{{url('penerimaansiswabaru')}}">Penerimaan Siswa baru</a></li>
                            <li><a class="dropdown-item" href="{{url('informasialumni')}}">Informasi Alumni</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ checkRouteActive('agenda') }}" aria-current="page"
                            href="{{ url('agenda') }}">Agenda</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ checkRouteActive('kontaksekolah') }}" aria-current="page"
                            href="{{ url('kontaksekolah') }}">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ checkRouteActive('download') }}" aria-current="page"
                            href="{{ url('download') }}">Download</a>
                    </li>
                </ul>

                {{-- <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <button class="btn btn-primary">Button</button>
                </div> --}}
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">

        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="#">Halaman Utama</a> --}}
                        <a href="{{ url('home') }}" class="nav-link {{ checkRouteActive('home') }}">home</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link active" aria-current="page" href="#">Halaman Utama</a> --}}
                        <a href="{{ url('guru') }}" class="nav-link {{ checkRouteActive('guru') }}">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('siswa') }}" class="nav-link {{ checkRouteActive('siswa') }}">siswa</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="#">Pricing</a> --}}
                        <a href="{{ url('berita_umum') }}"
                            class="nav-link {{ checkRouteActive('berita_umum') }}">berita
                            umum</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('isi')

    </div>
</body>
@yield('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>


</html>

@php
    function checkRouteActive($route)
    {
        if (Route::current()->uri == $route) {
            return 'active';
        }
    }
@endphp
