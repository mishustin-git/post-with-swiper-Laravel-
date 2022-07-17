<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактирование контактов:
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="/dashboard/contacts/update" style="display:flex;flex-direction:column">
                    @csrf
                    <label for="mail">Почта:</label><br>
                    <input type="text" id="mail" name="mail" value="{{$contacts['mail']}}"><br>
                    <label for="phone">Телефон:</label><br>
                    <input type="text" id="phone" name="phone" value="{{$contacts['phone']}}"><br>
                    <label for="addr">Адресс:</label><br>
                    <input type="text" id="addr" name="addr" value="{{$contacts['addr']}}"><br>
                    <label for="map_x">Координата X на карте:</label><br>
                    <input type="text" id="map_x" name="map_x" value="{{$contacts['map_x']}}"><br>
                    <label for="map_x">Координата Y на карте:</label><br>
                    <input type="text" id="map_y" name="map_y" value="{{$contacts['map_y']}}"><br>
                    <input type="submit" class="btn btn-success" value="Обновить" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
                </form>
            </div>
        </div>
    </div>
    <style>
        #add_img{
            display:none;
        }
        #add_img.active{
            display:block;
        }
        #img{
            display: block;
        }
        #img.remove{
            display: none;
        }
        #remove_img{
            display: block;
            cursor: pointer;
        }
        #remove_img.hide{
            display: none;
        }
    </style>
    <script>
        function hideImg(){
            document.getElementById('img').classList.add('remove');
            document.getElementById('add_img').classList.add('active');
            document.getElementById('remove_img').classList.add('hide');
            document.getElementById("input_remove_img").value = 1;
        }
    </script>
</x-app-layout>
