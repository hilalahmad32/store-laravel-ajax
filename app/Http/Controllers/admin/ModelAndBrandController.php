<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ModelAndBrand;
use Illuminate\Http\Request;

class ModelAndBrandController extends Controller
{
    public function index()
    {
        return view("admin.modelandbrand");
    }

    public function create(Request $request)
    {
        $model = new ModelAndBrand();

        $is_model = $model->where("model", $request->model)->orWhere('brand', $request->brand)->first();
        if ($is_model) {
            echo 2;
        } else {
            $model->model = $request->model;
            $model->brand = $request->brand;
            $result = $model->save();
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
        $models = ModelAndBrand::all();
        if (count($models) > 0) {
            $output .= "
            <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Model</th>
                        <th>Brand</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($models as $model) {
                $output .= "
                    <tr>
                        <td>{$model->id}</td>
                        <td>{$model->model}</td>
                        <td>{$model->brand}</td>
                        <td>
                        <button type='button' id='editmodel' data-toggle='modal' data-target='#updateModel' data-id='{$model->id}' class='btn btn-primary'>Update</button>
                        <button type='button' id='delete-model' data-id='{$model->id}' class='btn btn-danger'>Delete</button>
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
        $model = ModelAndBrand::find($id);
        $output = "";
        $output .= "
        <div class='form-group'>
        <label for=''>Enter Brand</label>
        <input type='text' value='{$model->brand}' class='form-control' id='brand' placeholder='Enter Brand'
            name='edit_brand'>
        <input type='hidden' value='{$model->id}' class='form-control' id='id' placeholder='Enter First Name'
            name='edit_id'>
    </div>
    <div class='form-group'>
        <label for=''>Enter Model</label>
        <input type='text' value='{$model->model}' class='form-control' id='model' placeholder='Enter Model'
            name='edit_model'>
    </div> ";

        echo $output;
    }

    public function update(Request $request)
    {
        $model = ModelAndBrand::find($request->edit_id);
        $model->model = $request->edit_model;
        $model->brand = $request->edit_brand;
        $result = $model->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $model = ModelAndBrand::find($id);
        $result = $model->delete();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
