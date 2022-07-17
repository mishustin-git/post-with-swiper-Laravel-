<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить картинку в слайдер
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="/dashboard/swiper/create" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="swiper_id" name="swiper_id" value="{{$swiper_id}}"><br>
                    <input type="hidden" id="swiper_table" name="swiper_table" value="{{$swiper_table}}"><br>
                    <label for="order">Порядок:</label><br>
                    <input type="text" id="order" name="order" value=""><br>
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
