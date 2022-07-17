<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Setting edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('settings.update', $data->id ) }}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="title" class="form-label">Название:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$data['title']}}">
                    </div>
                    <div class="mb-3">
                        <label for="info" class="form-label">Содержание:</label>
                        <input type="text" class="form-control" id="info" name="info" value="{{$data['info']}}">
                    </div>
                    <input type="submit" value="Обновить" class="btn btn-lg btn-success" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
