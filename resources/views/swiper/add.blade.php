<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            swiper/add
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    posts/add
                </div>

                <form method="POST" action="/dashboard/swiper/create" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="post_id" name="post_id" value="{{$post_id}}"><br>
                    <label for="order">order:</label><br>
                    <input type="text" id="order" name="order" value=""><br>
                    <label for="image">Img_swiper:</label><br>
                    <input type="file" id="image" name="image">
                    <!-- <label for="img_swiper">img_swiper:</label><br>
                    <input type="file" id="img_swiper" name="img_swiper"> -->
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
