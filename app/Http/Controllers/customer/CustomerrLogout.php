<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerrLogout extends Controller
{
   
    public function logout()
    {
       Auth::logout();
       return redirect("/");
    }
}
