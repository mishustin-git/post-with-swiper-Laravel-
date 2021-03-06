<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Услуги редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="/dashboard/services/update" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <p>Картинка</p>
                    <img src="{{$servise['img']}}" alt="" style="width:320px;" id="img">
                    <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                    <input type="hidden" name="image_url" value="{{$servise['img']}}">
                    <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                    <input type="hidden" name="id" value="{{$servise['id']}}">
                    <input id="add_img" type="file" id="image" name="image">
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$servise['title']}}">
                    </div>
                    <div class="mb-3">
                        <label for="list_item_1" class="form-label">Первый элемент списка:</label>
                        <input type="text" class="form-control" id="list_item_1" name="list_item_1" value="{{$servise['list_item_1']}}">
                    </div>
                    <div class="mb-3">
                        <label for="list_item_2" class="form-label">Второй элемент списка:</label>
                        <input type="text" class="form-control" id="list_item_2" name="list_item_2" value="{{$servise['list_item_2']}}">
                    </div>
                    <div class="mb-3">
                        <label for="list_item_3" class="form-label">Третий элемент списка:</label>
                        <input type="text" class="form-control" id="list_item_3" name="list_item_3" value="{{$servise['list_item_3']}}">
                    </div>
                    <input type="submit" value="Обновить" class="btn btn-lg btn-success" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
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
