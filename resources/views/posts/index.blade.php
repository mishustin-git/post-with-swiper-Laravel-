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
                    <table>
                        <tr>
                            <th>img</th>
                            <th>title</th>
                            <th>description</th>
                            <th>actions</th>
                        </tr>
                        @if ($posts != '-1')
                            @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{$post['img_main']}}" alt="" style="width:320px"></td>
                                <td>{{$post['title']}}</td>
                                <td>{{ $post['beauty_description'] }}</td>
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
