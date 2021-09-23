<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view("admin.customar");
    }

    // public function create(Request $request)
    // {
    //     $admin=new Admin();
    //     $is_admin=$admin->where('email',$request->email)->first();
    //     if($is_admin){
    //         echo 2;
    //     }else{
    //         $admin->name=$request->name;
    //         $admin->email=$request->email;
    //         $admin->password=$request->password;
    //         $admin->name=$request->name;
    //     }
    // }
}
