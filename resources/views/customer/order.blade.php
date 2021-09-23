<x-layouts>
    <x-slot name="title">Order</x-slot>
    <x-slot name="content">
        <div class="container">
            <h4 class="my-3">Welcome {{Auth::user()->fname}} {{Auth::user()->lname}} Please Fill up this Form to create
                a new order</h4>
            <form id="add-order">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter First Name</label>
                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name"
                                name="fname">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Last Name</label>
                            <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                                name="lname">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Enter Location"
                                name="location">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Phone</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Model</label>
                           <select name="model" id="model" class="form-control form-control-lg">
                               <option value="" disabled selected >Select Option</option>
                               @foreach ($models as $model)
                                   <option value="{{$model->id}}">{{$model->model}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="">Enter Brand</label>
                            <select name="brand" id="brand" class="form-control form-control-lg">
                                <option value="" disabled selected >Select Option</option>
                                @foreach ($models as $model)
                                    <option value="{{$model->id}}">{{$model->brand}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                            <label for="">Enter Part</label>
                            <input type="text" class="form-control" id="part" placeholder="Enter Part" name="part">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Enter Part</label>
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>
                                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <button class="btn btn-success w-100" id="customar-save" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </x-slot>
</x-layouts>