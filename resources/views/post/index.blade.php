<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            posts-index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>main_img:</p>
                    <p><img src="{{$posts['img_main']}}" alt="" style="width:320px"></p>
                    <p>title:</p>
                    <p>{{$posts['title']}}</p>
                    <p>beauty_description:</p>
                    <p>{{$posts['beauty_description']}}</p>
                    <p>beauty_list:</p>
                    <p>{!! $posts['beauty_list'] !!}</p>
                    <table>
                        <tr>
                            <th>img</th>
                            <th>order</th>
                            <th>actions</th>
                        </tr>
                        @if ($swipers != '-1')
                            @foreach ($swipers as $swiper)
                            <tr>
                                <td><img src="{{$swiper['img_swiper']}}" alt="" style="width:320px"></td>
                                <td>{{$swiper['swiper_order']}}</td>
                                <td>actions</td>
                            </tr>
                            @endforeach
                        @endif
                        <tr>
                            <th>
                                add new item
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
