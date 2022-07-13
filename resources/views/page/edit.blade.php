<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Редактирование страницы - "{{$page['name']}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="/dashboard/pages/update/{{$page['id']}}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Название:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$page['name']}}">
                    </div>
                    @if ($page['type']!='main')
                        <div class="mb-3">
                            <label for="url" class="form-label">URL-slug:</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{$page['url']}}">
                        </div>
                    @endif
                    @if ($page['type']=='main')
                        <div class="mb-3" style="display: none">
                            <label for="url" class="form-label">URL-slug:</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{$page['url']}}">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок:</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{$page['title']}}">
                    </div>
                    @if ($page['type']=="main")
                        <div class="mb-3">
                            <label for="intro" class="form-label">Вступление:</label>
                            <input type="text" class="form-control" id="intro" name="intro" value="{{$page['intro']}}">
                        </div>
                    @endif
                    @if ($page['type']=="main" || $page['type']=="about")
                        <div class="mb-3">
                            <label for="button_text" class="form-label">Вступление:</label>
                            <input type="text" class="form-control" id="button_text" name="button_text" value="{{$page['button_text']}}">
                        </div>
                    @endif
                    @if ($page['type']!="main" && $page['type']!="portfolio")
                        <div class="mb-3">
                            <label for="text" class="form-label">Описание:</label>
                            <input type="text" class="form-control" id="text" name="text" value="{{$page['text']}}">
                        </div>
                    @endif
                    @if ($page['type']=='about')
                    <div class="mb-3">
                        <label for="image" class="form-label">Картинка:</label>
                        <img src="{{$page['img']}}" alt="" style="width:320px;" id="img">
                        <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                        <input type="hidden" name="image_url" value="{{$page['img']}}">
                        <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                        <input id="add_img" type="file" id="image" name="image">
                    </div>
                    @endif
                    {{-- <p>
                        <span style="color:red">type</span>: {{$page['type']}}
                    </p> --}}
                    <input type="submit" value="Обновить" class="btn btn-lg btn-success" style="display: block; width:175px; margin:0 auto; margin-bottom:25px;margin-top:15px;">
                    @if ($page['type']=='сontact')
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Контакты
                            </button>
                          </h2>
                          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table">
                                    <tr>
                                        {{-- <th>id</th> --}}
                                        <th>E-mail</th>
                                        <th>Телефон</th>
                                        <th>Адрес</th>
                                        <th>map_x</th>
                                        <th>map_y</th>
                                        <th>Действия</th>
                                    </tr>
                                    <tr>
                                        {{-- <td>{{$contacts['id']}}</td> --}}
                                        <td>{{$contacts['mail']}}</td>
                                        <td>{{$contacts['phone']}}</td>
                                        <td>{{$contacts['addr']}}</td>
                                        <td>{{$contacts['map_x']}}</td>
                                        <td>{{$contacts['map_y']}}</td>
                                        <td><a href="/dashboard/contacts"><i class="fa-solid fa-pen"></i></a></td>
                                    </tr>
                                </table>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Социальные сети
                            </button>
                          </h2>
                          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table">
                                    <tr>
                                        {{-- <th>id</th> --}}
                                        <th>#</th>
                                        <th>Название</th>
                                        <th>Ссылка</th>
                                        <th>Font Awesome Icon</th>
                                        <th>Дейстивия</th>
                                    </tr>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($socials as $social)
                                    <tr>
                                        {{-- <td>{{$social['id']}}</td> --}}
                                        <td>{{$i}}</td>
                                        <td>{{$social['title']}}</td>
                                        <td>{{$social['link']}}</td>
                                        <td>{{$social['icon_name']}}</td>
                                        <td>
                                            <a href="/dashboard/socials/edit/5" style="margin-right: 15px"><i class="fa-solid fa-pen"></i></a>
                                            <a href="/dashboard/socials/delete/5"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </table>
                                <a href="/dashboard/socials/create" class="btn btn-lg btn-primary" style="display: block;width: 175px;margin: 0 auto;">Добавить сеть</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endif
                </form>
                @if ($swipers != 0)
                <div class="accordion" id="">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                          Слайдер
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <table class="table">
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Картинка
                                    </th>
                                    <th style="text-align: center">
                                        № по порядку
                                    </th>
                                    <th style="text-align: center">
                                        Действия
                                    </th>
                                </tr>
                                @php
                                $i = 1;
                                @endphp
                                @if($swipers!='-1')
                                    @foreach($swipers as $swiper)
                                        <tr>
                                            <td style="text-align: center;line-height: 10;">{{$i}}</td>
                                            <td><img src="{{$swiper['img_swiper']}}" alt="" style="width:320px"></td>
                                            <td style="text-align: center;line-height: 10;">{{$swiper['swiper_order']}}</td>
                                            <td style="text-align: center;line-height: 10;">
                                                <a href="/dashboard/swiper/delete/{{$swiper['id']}}" style="margin-right:15px"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="/dashboard/swiper/edit/{{$swiper['id']}}"><i class="fa-solid fa-pen"></i></a>
                                            </td>
                                        </tr>
                                        @php
                                        $i++;
                                        @endphp
                                    @endforeach
                                @endif
                            </table>
                            <form method="POST" action="/dashboard/swiper/add" enctype="multipart/form-data" style="display: flex;flex-direction: column;align-items: center;">
                                @csrf
                                <input type="hidden" name="swiper_id" value="{{$page['id']}}">
                                <input type="hidden" name="swiper_table" value="pages">
                                <input type="submit" value="Добавить картинку" class="btn btn-lg btn-primary">
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
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
