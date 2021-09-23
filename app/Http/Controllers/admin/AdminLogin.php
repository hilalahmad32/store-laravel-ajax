<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminLogin extends Controller
{
    public function index()
    {
        return view("admin.login");
    }
    public function adminlogin(Request $request)
    {
       $admin=Admin::where(["email"=>$request->email,'password'=>$request->password])->first();
       if($admin){
         echo 1;
          $data=[
               "name"=>$admin->name,
               "email"=>$admin->email,
               "admin"=>$admin->admin,
           ];
          $request->session()->put($data);
       }else{
           echo 0;
       }
    }
}
