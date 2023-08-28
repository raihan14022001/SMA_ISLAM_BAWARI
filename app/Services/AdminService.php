<?php

namespace App\Services;

use DB;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Request;



class AdminService
{
    public static function AdminList(Request $request)
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
            $data = User::paginate(5);
        }

      
        Paginator::useBootstrap();
        return $data;
    }
    public static function AdminStore($params)
    {
        // dd($params);
        $username = $params['name'].rand(pow(10, 8 - 1), pow(10, 8) -1);
        DB::beginTransaction();
        // try {
            $inputUser['user_name'] = $username;
            $inputUser['user_type'] = 'admin';
            $inputUser['name'] = $params['name'];
            $inputUser['email'] = $params['email'];
            $inputUser['nip'] = $params['nip'];
            $inputUser['gender'] = $params['gender'];
            $inputUser['password'] = Hash::make($params['password']);
            if(isset($params['image_url'])){
                $inputUser['image_url'] = $params['image_url'];
            }   
            if (isset($params['id'])) {
                // dd($params['id']);
                $petugas =  Admin::find($params['id']);
                $petugas->update([]);
                $user = $petugas->user()->update($inputUser);
            }else{
                $data = User::create($inputUser);
                $admin = $data->admin()->create([]);
            }
            DB::commit();
            // return $data;
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return $th;
        // }
    }
    public static function AdminDetail($id)
    {
        $data = Admin::with('user')->find($id);
        return $data;
    }
    public static function AdminEdit($id)
    {
        $data = Admin::with('user')->find($id);
        return $data;
    }
    public static function delete($id)
    {
        $data = Admin::with('user')->find($id);
        $data->delete();
        if($data){
            return "Deleted";
        }else{
            return "Failed";
        }
    }
}