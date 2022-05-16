<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            pages-index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>title</th>
                            <th>url</th>
                            <th>type</th>
                            <th>actions</th>
                        </tr>
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{$page['id']}}</td>
                                <td>{{$page['name']}}</td>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['url']}}</td>
                                <td>{{$page['type']}}</td>
                                <td style="display:flex;flex-direction:column">
                                    <a href="/dashboard/pages/{{$page['id']}}">show</a>
                                </td>
                            </tr>
                            @endforeach
                        <tr>
                            <th>
                                <a href="/dashboard/posts/add">add new item</a>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
