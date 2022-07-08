<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            services-index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>list item1</th>
                            <th>list item2</th>
                            <th>list item3</th>
                            <th>img</th>
                        </tr>
                            @foreach ($services as $service)
                            <tr>
                                <td>{{$service['id']}}</td>
                                <td>{{$service['title']}}</td>
                                <td>{{$service['list_item_1']}}</td>
                                <td>{{$service['list_item_2']}}</td>
                                <td>{{$service['list_item_3']}}</td>
                                <td><img src="{{$service['img']}}" alt=""></td>
                                <td style="display:flex;flex-direction:column">
                                    <a href="/dashboard/services/edit/{{$service['id']}}">edit</a>
                                    <a href="/dashboard/services/destroy/{{$service['id']}}">delete</a>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                    <a href="/dashboard/services/create">Add new item</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
