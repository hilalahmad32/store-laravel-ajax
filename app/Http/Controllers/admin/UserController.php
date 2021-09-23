<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        
        return view("admin.customar");
    }

    public function create(Request $request)
    {
        $user = new User();
        $is_user = $user->where(['email' => $request->email])->first();
        if ($is_user) {
            echo 2;
        } else {
            $user->fname = $request->fname;
            $user->lname = $request->lname;
            $user->email = $request->email;
            $user->brand = $request->brand;
            $user->model = $request->model;
            $user->location = $request->location;
            $user->phone = $request->phone;
            $user->is_part = $request->part;
            $user->password = Hash::make($request->password);
            $result = $user->save();
            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function get()
    {
        $output = "";

        $users = User::all();
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
        }
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $output = "";
        $output .= "
        <div class='form-group'>
        <label for=''>Enter First Name</label>
        <input type='text' value='{$user->fname}' class='form-control' id='fname' placeholder='Enter First Name'
            name='edit_fname'>
        <input type='hidden' value='{$user->id}' class='form-control' id='id' placeholder='Enter First Name'
            name='edit_id'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Last Name</label>
        <input type='text' value='{$user->lname}' class='form-control' id='lname' placeholder='Enter Last Name'
            name='edit_lname'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Email</label>
        <input type='email' value='{$user->email}' class='form-control' id='email' placeholder='Enter Email'
            name='edit_email'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Location</label>
        <input type='text' value='{$user->location}' class='form-control' id='location' placeholder='Enter Location'
            name='edit_location'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Phone</label>
        <input type='text' value='{$user->phone}' class='form-control' id='phone' placeholder='Enter Phone'
            name='edit_phone'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Model</label>
        <input type='text' value='{$user->model}' class='form-control' id='model' placeholder='Enter Model'
            name='edit_model'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Brand</label>
        <input type='text' value='{$user->brand}' class='form-control' id='brand' placeholder='Enter Brand'
            name='edit_brand'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Part</label>
        <input type='text' value='{$user->is_part}' class='form-control' id='part' placeholder='Enter Part' name='edit_part'>
    </div>";

        echo $output;
    }


    public function update(Request $request)
    {
        $user = User::find($request->edit_id);
        $user->fname = $request->edit_fname;
        $user->lname = $request->edit_lname;
        $user->email = $request->edit_email;
        $user->brand = $request->edit_brand;
        $user->model = $request->edit_model;
        $user->location = $request->edit_location;
        $user->phone = $request->edit_phone;
        $user->is_part = $request->edit_part;
        $result = $user->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $result = $user->delete();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
