<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class getOrderController extends Controller
{
    public function index()
    {
        return view("customer.get-order");
    }
    public function get()
    {
        $output = "";

        $orders = Order::orderBy("id", "DESC")->get();
        if (count($orders) > 0) {
            $output .= "";
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
                           $output .="<button type='button' id='approve' data-id='{$order->id}' class='btn btn-primary'>Approve</button>
                           <button type='button' id='reject' data-id='{$order->id}' class='btn btn-danger'>Reject</button>";
                        }else if($order["actions"] == 1){
                            $output .="<span class='text-success'>Accept</span>";
                        }else if($order["actions"] == 2) {
                            $output .="<span class='text-danger'>Reject</span>";
                        }
                        $output .="</td>
                    </tr>
                    ";
            }
            echo $output;
        }
    }

    public function approve(Request $request)
    {
        $id=$request->id;
        $order=Order::find($id);
        $order->actions=1;
        $result=$order->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function reject(Request $request)
    {
        $id=$request->id;
        $order=Order::find($id);
        $order->actions=2;
        $result=$order->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}
