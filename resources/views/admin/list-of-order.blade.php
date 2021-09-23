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
            <div id="list-data"></div>
        </div>

    </x-slot>
</x-layouts>