<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            service/create
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    service/create
                </div>

                <form method="POST" action="/dashboard/services/store" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">title:</label><br>
                    <input type="text" id="title" name="title" value=""><br>
                    <label for="list_item_1">list_item_1:</label><br>
                    <input type="text" id="list_item_1" name="list_item_1" value=""><br>
                    <label for="list_item_2">list_item_2:</label><br>
                    <input type="text" id="list_item_2" name="list_item_2" value=""><br>
                    <label for="list_item_3">list_item_3:</label><br>
                    <input type="text" id="list_item_3" name="list_item_3" value=""><br>
                    <label for="image">Img_main:</label><br>
                    <input type="file" id="image" name="image">
                    <!-- <label for="img_swiper">img_swiper:</label><br>
                    <input type="file" id="img_swiper" name="img_swiper"> -->
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
