<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\image_blog;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Services\BlogService;

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
        $data = Blog::with('image_blog', 'kategori')->find($id);
        // dd($data);
        return view('admin.blog.index', compact('data'));
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
            $validated = $request->validate([
                'user_id' => 'required',
                'judul' => 'required|min:3|max:255',
                'image' => 'required|mimes:jpeg,png,jpg|max:2048',
                'image_thumbnail' => 'required|mimes:jpeg,png,jpg|max:2048',
                'kategori' => 'required',
                'isi' => 'required',
            ]);
            // dd($request);

            
            $params = $validated;
        }else{
            // dd("edit");
            $validated = $request->validate([
                'id'=>'required',
                'name' => 'min:3|max:255',
                'email' => 'email:dns',
                'password' => 'same:password_confirmation',
                'password_confirmation' => ''
            ]);
            $params = $validated;
            // dd($params);
        }        

        $fileName = time().$request->file('image')->getClientOriginalName();
        $pathI = $request->file('image')->storeAs('images', $fileName, 'public');
        $params["image"] = '/storage/'.$pathI;

        $fileNames = time().$request->file('image_thumbnail')->getClientOriginalName();
        $path = $request->file('image_thumbnail')->storeAs('images', $fileNames, 'public');
        $params["image_thumbnail"] = '/storage/'.$path;


        // dd($params);



        $data = BlogService::BlogStore($params);
        if(!isset($request['id'])){
            return redirect('blog')->with('success', 'Berhasil menambahkan data');
        }else{
            return redirect('blog')->with('successEdit', 'Berhasil mengedit data');
        }
    }
}
