<?php

namespace App\Services;

use DB;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;



class BlogService
{
    public static function BlogList(Request $request)
    {
        if($request->has('keywords')){
            // $data = Admin::leftJoin('users', 'users.id', 'admins.user_id')->select('users.*', 'admins.*')
            // ->where(function ($row) use ($request){
            //         $row->where(function ($query) use ($request) {
            //             $query->where('users.name', 'like', '%' . $request->keywords . '%')
            //                 ->orWhere('users.nip', 'like', '%' . $request->keywords . '%');
            //         });
            // })->paginate(5);
// SELECT `users`.*, `admins*` FROM `admins` LEFT JOIN `users` ON `users`.`id` = `admins`.`user_id`
// WHERE ((`users`.`name` LIKE % $request % OR `users`.`nip` LIKE % $request %) )
        }else{
            $data = Blog::with('image_blog','kategori')->paginate(5);
        }

      
        Paginator::useBootstrap();
        return $data;
    }
    public static function BlogStore($params)
    {

            // Employee::create($requestData);

        DB::beginTransaction();
        // try {
            $inputUser['judul'] = $params['judul'];
            $inputUser['image_thumbnail'] = $params['image_thumbnail'];
            $inputUser['kategori_id'] = $params['kategori'];
            $inputUser['user_id'] = $params['user_id'];
            $inputUser['isi'] = $params['isi'];
            if (isset($params['id'])) {
                $admin =  User::find($params['id']);
                // dd($admin); 
                $data = $admin->update($inputUser);
            }else{
                // dd('Please');
                $data = Blog::create($inputUser);
                // $images = $data->image_blog()->create($inputUser);
                $aa['image'] = $params['image'];

                $images = $data->image_blog()->create($aa);

            }
            DB::commit();
            return $data;
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return $th;
        // }
    }
    public static function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        if($data){
            return "Deleted";
        }else{
            return "Failed";
        }
    }
}