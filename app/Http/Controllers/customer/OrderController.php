<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\ModelAndBrand;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $model = ModelAndBrand::all();
        return view("customer.order", ["models" => $model]);
    }

    public function addOrder(Request $request)
    {
        $order = new Order();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->brand_id = $request->brand;
        $order->model_id = $request->model;
        $order->location = $request->location;
        $order->phone = $request->phone;
        $order->is_part = $request->part;
        $order->message = $request->message;
        $result = $order->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
