<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Обзор страниц
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Страница</th>
                            <th>Заголовок</th>
                            <th>URL-slug</th>
                            {{-- <th>type</th> --}}
                            <th style="text-align: center">Действия</th>
                        </tr>
                            @php
                            $i = 1
                            @endphp
                            @foreach ($pages as $page)
                            <tr>
                                {{-- <td>{{$page['id']}}</td> --}}
                                <td>{{$i}}</td>
                                <td>{{$page['name']}}</td>
                                <td>{{$page['title']}}</td>
                                <td>{{$page['url']}}</td>
                                {{-- <td>{{$page['type']}}</td> --}}
                                <td style="display:flex;flex-direction:row;justify-content: center;">
                                    <a href="/dashboard/pages/{{$page['id']}}" style="margin-right:15px"><i class="fa-solid fa-eye"></i></a>
                                    <a href="/dashboard/pages/edit/{{$page['id']}}"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                            @php
                            $i++
                            @endphp
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
