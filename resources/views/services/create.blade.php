<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить услугу
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="/dashboard/services/store" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Заголовок:</label><br>
                    <input type="text" id="title" name="title" value=""><br>
                    <label for="list_item_1">Первый элемент списка:</label><br>
                    <input type="text" id="list_item_1" name="list_item_1" value=""><br>
                    <label for="list_item_2">Второй элемент списка:</label><br>
                    <input type="text" id="list_item_2" name="list_item_2" value=""><br>
                    <label for="list_item_3">Третий элемент списка:</label><br>
                    <input type="text" id="list_item_3" name="list_item_3" value=""><br>
                    <label for="image">Картинка:</label><br>
                    <input type="file" id="image" name="image">
                    <!-- <label for="img_swiper">img_swiper:</label><br>
                    <input type="file" id="img_swiper" name="img_swiper"> -->
                    <input type="submit" class="btn btn-primary" value="Добавить" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
