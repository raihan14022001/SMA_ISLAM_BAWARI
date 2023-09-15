<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Blog;
use App\Models\kategori;
use App\Models\lampiran;
use Illuminate\Support\Facades\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('home_page.home.index');
    }

    public function guru()
    {
        return view('home_page.guru.index');
    }
    //berita
    public function berita_umum()
    {
        $data_id = kategori::where('nama_kategori', 'BERITA UMUM')->get();
        $data = Blog::with('lampiran', 'image_blog', )->where('kategori_id', $data_id->last()->id)->get();
        $kategori =  $data_id->last()->nama_kategori;
        return view('home_page.berita.berita_umum.index', compact('data', 'kategori'));
    }

    public function berita_sekolah()
    {
        $data_id = kategori::where('nama_kategori', 'BERITA SEKOLAH')->get();
        $data = Blog::with('lampiran', 'image_blog', )->where('kategori_id', $data_id->last()->id)->get();
        $kategori =  $data_id->last()->nama_kategori;
        return view('home_page.berita.berita_sekolah.index', compact('data', 'kategori'));
    }
    //download pdf
    public function download_pdf($id)
    {
        $file = lampiran::find($id);
        $path = public_path("/storage/{$file->path}");
        return \Response::download($path);
    }


    //home
    public function visi_misi()
    {
        return view('home_page.home.visi_misi.index');
    }
    public function sejarah()
    {
        return view('home_page.home.sejarah.index');
    }
    public function sarjana()
    {
        return view('home_page.home.sarjana.index');
    }
    public function struktur()
    {
        return view('home_page.home.struktur.index');
    }
    public function sambutan()
    {
        return view('home_page.home.sambutan.index');
    }
    public function kemitraan()
    {
        return view('home_page.home.kemitraan.index');
    }
    public function program()
    {
        return view('home_page.home.program.index');
    }
    public function komite()
    {
        return view('home_page.home.komite.index');
    }
    public function prestasi()
    {
        return view('home_page.home.prestasi.index');
    }

    //guru
    public function direktori_guru()
    {
        return view('home_page.guru.direktori_guru.index');
    }
    public function prestasi_guru()
    {
        return view('home_page.guru.prestasi_guru.index');
    }

    //siswa
    public function direktori_siswa()
    {
        return view('home_page.siswa.direktori_siswa.index');
    }
    public function prestasi_siswa()
    {
        return view('home_page.siswa.prestasi_siswa.index');
    }
    public function ektrakurikuler()
    {
        return view('home_page.siswa.ektrakurikuler.index');
    }
    public function osis()
    {
        return view('home_page.siswa.osis.index');
    }

    //informasi
    public function kalender()
    {
        return view('home_page.informasi.kalender.index');
    }
    public function beasiswa()
    {
        return view('home_page.informasi.beasiswa.index');
    }
    public function penerimaan()
    {
        return view('home_page.informasi.penerimaan.index');
    }
    public function informasi_alumni()
    {
        return view('home_page.informasi.informasi_alumni.index');
    }

    //agenda
    public function agenda()
    {
        return view('home_page.agenda.index');
    }
    //kontak
    public function kontak_sekolah()
    {
        return view('home_page.kontak.index');
    }

    //download
    public function download()
    {
        return view('home_page.download.index');
    }


    public function detail($id)
    {
        $data = Blog::with('image_blog', 'kategori','user', 'lampiran')->find($id);
        $kategoris = kategori::find($data->kategori_id);
        return view('home_page.section.show', compact('data', 'kategoris'));
    }





}
    