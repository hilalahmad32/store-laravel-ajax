<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class getOrder extends Controller
{
    public function index()
    {
        return view("customer.get-order");
    }
    public function get()
    {
        $output = "";

        $orders = Order::orderBy("id", "DESC")->limit(1)->get();
        if (count($orders) > 0) {
            $output .= "
            <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Locaiton</th>
                        <th>Phone</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Part</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($orders as $order) {
                $output .= "
                    <tr>
                        <td>{$order->fname}</td>
                        <td>{$order->lname}</td>
                        <td>{$order->email}</td>
                        <td>{$order->location}</td>
                        <td>{$order->phone}</td>
                        <td>{$order->models->model}</td>
                        <td>{$order->brands->brand}</td>
                        <td>{$order->is_part}</td>
                        <td>";
                        if($order["actions"]==0){
                           $output .="<span class='text-info'>Pending</span>";
                        }else if($order["actions"] == 1){
                            $output .="<span class='text-success'>Accept</span>";
                        }else if($order["actions"]) {
                            $output .="<span class='text-danger'>Reject</span>";
                        }
                        $output .="</td>
                    </tr>
                    ";
            }
            $output .= "</tbody>
            </table>
        </div>";
            echo $output;
        }
    }
}
