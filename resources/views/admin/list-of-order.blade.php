<x-layouts>
    <x-slot name="title">customar</x-slot>
    <x-slot name="content">
        <div class="container mt-5">
            <div class="d-flex justify-content-end">
                <input type="text" name="search" id="search" class="form-control w-25">
            </div>
        </div>
        <div class="container">
            <h4 class="text-center" id="loading-data"></h4>

            <div class='table-responsive'>
                <table class='table table-bordered' id="example">
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
                    <tbody id="list-data"></tbody>
                </table>
            </div>
        </div>

    </x-slot>
</x-layouts>