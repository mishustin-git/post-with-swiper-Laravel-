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
                    <table class="table">
                        <tr>
                            <th>Название</th>
                            <th>Содержание</th>
                            <th>Действия</th>
                        </tr>
                        @if ($data != '-1')
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$item['title']}}</td>
                                <td>{{ $item['info'] }}</td>
                                <td style="display:flex;flex-direction: row;">
                                    <a href="/dashboard/settings/{{$item['id']}}/edit" style="margin-right: 15px"><i class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('settings.destroy', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="fa-solid fa-trash-can" type="submit"></button>
                                      </form>
                                    {{-- <a href="/dashboard/settings/{{$item['id']}}/destroy"><i class="fa-solid fa-trash-can"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        <tr>
                            <th style="">
                                <a href="{{route('settings.create')}}" class="btn btn-primary">Добавить</a>
                                {{-- Скроем возможность пользователям добавлять свойства, только для нас --}}
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
