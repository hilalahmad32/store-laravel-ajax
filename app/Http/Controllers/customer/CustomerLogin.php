<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLogin extends Controller
{
    public function index()
    {
        return view("customer.login");
    }

    public function loginuser(Request $request)
    {
        $user=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if($user){
            echo 1;
        }else{
            echo 0;
        }
    }
}
