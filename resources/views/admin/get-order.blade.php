<x-layouts>
    <x-slot name="title">Order</x-slot>
    <x-slot name="content">
        <div class="container my-5">
            <h4 class="text-center" id="loading-data"></h4>

            <div class='table-responsive'>
                <table class='table table-bordered display' id="example">
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
                    <tbody id="order"></tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-layouts>