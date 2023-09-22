<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\image_blog;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Services\BlogService;
use Storage;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $data = BlogService::BlogList($request);
        $kategoris = kategori::all();
        // dd($data);
        // dd($kategori);
        return view('admin.blog.index', compact('data', 'kategoris'));
    }
    public function edit_blog($id)
    {
        $data = Blog::with('image_blog', 'kategori', 'lampiran')->find($id);
        // dd($data);
        $kategoris = kategori::all();

        // dd($data);
        return view('admin.blog.form.form', compact('data', 'kategoris'));
    }
    public function show_blog($id)
    {
        $data = Blog::with('image_blog', 'kategori')->find($id);
        $kategoris = kategori::all();

        // dd($data);
        return view('admin.blog.show', compact('data', 'kategoris'));
    }
    public function create_blog(Request $request)
    {
        // $data = BlogService::BlogList($request);
        $kategoris = kategori::all();
        // dd($kategori);
        return view('admin.blog.form.form', compact('kategoris'));
    }
    public function save_blog(Request $request)
    {
        // dd($request);
        
        if(!isset($request['id'])){
            // dd('c');
            $validated = $request->validate([
                'user_id' => 'required',
                'judul' => 'required',
                'image.*' => 'required|mimes:jpeg,png,jpg',
                'image_thumbnail' => 'required|mimes:jpeg,png,jpg',
                'kategori' => 'required',
                'isi' => 'required',
                'path.*' => 'mimes:pdf',
                'keterangan' => '',
            ]);
            $params = $validated;
            // dd($params);

        }else{
            // dd("edit");
            $validated = $request->validate([
                'id'=>'required',
                'user_id' => 'required',
                'judul' => 'required',
                'image.*' => 'mimes:jpeg,png,jpg',
                'image_thumbnail' => 'mimes:jpeg,png,jpg',
                'kategori' => '',
                'isi' => '',
                'path.*' => 'mimes:pdf',
                'keterangan' => '',
            ]);
            $params = $validated;
            // dd($params);
        }     
        if ($request->hasFile('image_thumbnail')) {
            $file = $request->file('image_thumbnail');
            $extension = $file->getClientOriginalName();
            $filenames = time() . '.' . $extension;
            // $request->file('image_thumbnail')->getClientOriginalName();
            $path = $file->move('upload/image_thumbnail/', $filenames);
            $params["image_thumbnail"] = 'upload/image_thumbnail/'.$filenames;
        }
        $data = BlogService::BlogStore($params);
        if(!isset($request['id'])){
            return redirect('blog')->with('success', 'Berhasil menambahkan data');
        }else{
            return redirect('blog')->with('successEdit', 'Berhasil mengedit data');
        }
    }
    public function delete_blog($id)
    {
        $data = BlogService::delete($id);
        return redirect()->back()->with('success_hapus', 'Berhasil dihapus');
    }
}
