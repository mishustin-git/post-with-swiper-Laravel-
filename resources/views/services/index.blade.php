<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Все услуги
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <tr>
                            <th>Заголовок</th>
                            <th>Первый элемент списка</th>
                            <th>Второй элемент списка</th>
                            <th>Третий элемент списка</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{$service['title']}}</td>
                                <td>{{$service['list_item_1']}}</td>
                                <td>{{$service['list_item_2']}}</td>
                                <td>{{$service['list_item_3']}}</td>
                                <td><img src="{{$service['img']}}" alt="" style="width:300px;"></td>
                                <td style="display: table-cell;">
                                    <a href="/dashboard/services/edit/{{$service['id']}}" style="margin-right:15px"><i class="fa-solid fa-pen"></i></a>
                                    <a href="/dashboard/services/destroy/{{$service['id']}}"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <a href="/dashboard/services/create" class="btn btn-primary" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">Добавить</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
