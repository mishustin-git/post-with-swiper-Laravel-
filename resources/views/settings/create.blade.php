<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            setting/add
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    setting/add
                </div>

                <form method="POST" action="{{route('settings.store')}}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <label for="title">title:</label><br>
                    <input type="text" id="title" name="title" value=""><br>
                    <label for="info">info:</label><br>
                    <input type="text" id="info" name="info" value=""><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
