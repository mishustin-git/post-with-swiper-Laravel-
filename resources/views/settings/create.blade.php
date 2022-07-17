<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавить настройку
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{route('settings.store')}}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">Название:</label><br>
                    <input type="text" id="title" name="title" value=""><br>
                    <label for="info">Содержание:</label><br>
                    <input type="text" id="info" name="info" value=""><br>
                    <input type="submit" class="btn btn-primary" value="Добавить" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
