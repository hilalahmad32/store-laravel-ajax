<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ListOfOrder extends Controller
{
    public function index()
    {
        return view("admin.list-of-order");
    }

    public function get()
    {
        $output = "";

        $users = User::orderBy("id", "DESC")->get();
        if (count($users) > 0) {
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
            foreach ($users as $user) {
                $output .= "
                    <tr>
                        <td>{$user->fname}</td>
                        <td>{$user->lname}</td>
                        <td>{$user->email}</td>
                        <td>{$user->location}</td>
                        <td>{$user->phone}</td>
                        <td>{$user->model}</td>
                        <td>{$user->brand}</td>
                        <td>{$user->is_part}</td>
                    </tr>
                    ";
            }
            $output .= "</tbody>
            </table>
        </div>";
            echo $output;
        }
    }

    public function search(Request $request)
    {
        $output = "";
        $search = '%' . $request->search . '%';
        $users = User::orderBy("id", "DESC")->where("fname", "like", $search)->get();
        if (count($users) > 0) {
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
            foreach ($users as $user) {
                $output .= "
                    <tr>
                        <td>{$user->fname}</td>
                        <td>{$user->lname}</td>
                        <td>{$user->email}</td>
                        <td>{$user->location}</td>
                        <td>{$user->phone}</td>
                        <td>{$user->model}</td>
                        <td>{$user->brand}</td>
                        <td>{$user->is_part}</td>
                        <td>
                        <button type='button' id='editcustomer' data-toggle='modal' data-target='#updateCustomar' data-id='{$user->id}' class='btn btn-primary'>Update</button>
                        <button type='button' id='delete-customer' data-id='{$user->id}' class='btn btn-danger'>Delete</button>
                        </td>
                    </tr>
                    ";
            }
            $output .= "</tbody>
            </table>
        </div>";
            echo $output;
        } else {
            echo "<h1>Data not found</h1>";
        }
    }
}
