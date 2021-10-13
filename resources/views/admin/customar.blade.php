<x-layouts>
    <x-slot name="title">customar</x-slot>
    <x-slot name="content">
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Customer ( ) </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customar">
                            Add Customer
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">

            <div class='table-responsive'>
                <table class='table table-bordered display' id='example' style='width:100%'>
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
                    <tbody id="customer-data"></tbody>
                </table>
            </div>
        </div>
            {{-- add customar model --}}

            <!-- The Modal -->
            <div class="modal fade" id="customar">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Customar</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="add-customer">
                                @csrf
                                <div class="form-group">
                                    <label for="">Enter First Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name"
                                        name="fname">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Last Name</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name"
                                        name="lname">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Location</label>
                                    <input type="text" class="form-control" id="location" placeholder="Enter Location"
                                        name="location">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Phone</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone"
                                        name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Model</label>
                                    <input type="text" class="form-control" id="model" placeholder="Enter Model"
                                        name="model">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Brand</label>
                                    <input type="text" class="form-control" id="brand" placeholder="Enter Brand"
                                        name="brand">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Part</label>
                                    <input type="text" class="form-control" id="part" placeholder="Enter Part"
                                        name="part">
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter Password" name="password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success w-100" id="customar-save" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add customar model --}}

            <!-- The Modal -->
            <div class="modal fade" id="updateCustomar">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Customer</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="update-customer">
                                @csrf
                                <h4 class="text-center" id="loading"></h4>
                                <div id="edit-customer"></div>
                                <div class="form-group">
                                    <button class="btn btn-success w-100" id="customar-update"
                                        type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </x-slot>
</x-layouts>