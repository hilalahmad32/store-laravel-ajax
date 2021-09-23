<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogout extends Controller
{
   
    public function adminlogout()
    {
        if(session()->has("name") || session()->has("email")){
            session()->pull("name");
            session()->pull("email");
            return redirect("/");
        }
    }
}
