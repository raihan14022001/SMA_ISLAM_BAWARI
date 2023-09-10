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
                        <a href="{{ url('berita_umum') }}" class="nav-link {{ checkRouteActive('berita_umum') }}">berita
                            umum</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
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
