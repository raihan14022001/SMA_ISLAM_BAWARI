<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\kategori;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('home_page.home.index');
    }
    public function siswa()
    {
        return view('home_page.siswa.index');
    }
    public function guru()
    {
        return view('home_page.guru.index');
    }
    public function berita_umum()
    {
        $data_id = kategori::where('nama_kategori', 'berita umum')->get();
        $data = Blog::with('lampiran', 'image_blog', )->where('kategori_id', $data_id->last()->id)->get();
        $kategori =  $data_id->last()->nama_kategori;
        return view('home_page.berita_umum.index', compact('data', 'kategori'));
    }
    public function show_berita_umum($id)
    {
        $data = Blog::with('image_blog', 'kategori','user')->find($id);
        $kategoris = kategori::find($data->kategori_id);
        // dd($kategoris);
        // $data_id = kategori::where('kategori_id', 'berita umum')->get();

        return view('home_page.berita_umum.show', compact('data', 'kategoris'));
    }
}
