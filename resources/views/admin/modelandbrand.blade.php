<x-layouts>
    <x-slot name="title">Model And Brand</x-slot>
    <x-slot name="content">
        <div class="container my-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>Model And Brand ( ) </h4>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#brand">
                            Model
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="text-center" id="loading-model"></h4>
        <div class="container">

            <div class='table-responsive'>
                <table class='table table-bordered display' id="example">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Model</th>
                            <th>Brand</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="model-data"></tbody>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- add customar model --}}

        <!-- The Modal -->
        <div class="modal fade" id="brand">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Model And Brand</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="add-model">
                            @csrf
                            <div class="form-group">
                                <label for="">Enter Brand</label>
                                <input type="text" class="form-control" id="brand" placeholder="Enter Brand"
                                    name="brand">
                            </div>
                            <div class="form-group">
                                <label for="">Enter Model</label>
                                <input type="text" class="form-control" id="model" placeholder="Enter Model"
                                    name="model">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success w-100" id="model-save" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="updateModel">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Model And Brand</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="update-model">
                            @csrf
                            <h4 class="text-center" id="loading"></h4>
                            <div id="edit-model"></div>
                            <div class="form-group">
                                <button class="btn btn-success w-100" id="model-update" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts>