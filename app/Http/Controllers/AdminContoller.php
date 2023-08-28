<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AdminService;

class AdminContoller extends Controller
{
    public function index(Request $request)
    {
        $data = AdminService::adminList($request);
        return view('admin.admin.index', compact('data'));
    }
}
