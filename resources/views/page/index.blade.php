<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Страница - "{{$page['name']}}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <tr>
                            <th>Страница</th>
                            <th>Заголовок</th>
                            <th>URL-slug</th>
                            @if ($page['type']=="main")
                            <th>Вступление</th>
                            @endif
                            @if ($page['type']=="main" || $page['type']=="about")
                            <th>Текст кнопки</th>
                            @endif
                            @if ($page['type']!="main" && $page['type']!="portfolio")
                            <th>Описание</th>
                            @endif
                            @if ($page['type']=='about')
                            <th style="width:320px">img</th>
                            @endif
                            {{-- <th>type</th> --}}
                            <th>Действия</th>
                        </tr>
                        <tr>
                            <td>{{$page['name']}}</td>
                            <td>{{$page['title']}}</td>
                            <td>{{$page['url']}}</td>
                            @if ($page['type']=="main")
                            <td>{{$page['intro']}}</td>
                            @endif
                            @if ($page['type']=="main" || $page['type']=="about")
                            <td>{{$page['button_text']}}</td>
                            @endif
                            @if ($page['type']!="main" && $page['type']!="portfolio")
                            <td>{!! $page['text'] !!}</td>
                            @endif
                            @if ($page['type']=='about')
                            <td><img src="{{$page['img']}}" alt="" style="width:320px"></td>
                            @endif
                            {{-- <td>{{$page['type']}}</td> --}}
                            <td><a href="/dashboard/pages/edit/{{$page['id']}}"><i class="fa-solid fa-pen"></a></td>
                        </tr>
                    </table>
                    {{-- <p>
                        <span style="color:red">name</span> : {{$page['name']}}
                    </p>
                    <p>
                        <span style="color:red">url</span>: {{$page['url']}}
                    </p>
                    <p>
                        <span style="color:red">title</span>: {{$page['title']}}
                    </p>
                    @if ($page['type']=="main")
                    <p>
                        <span style="color:red">intro</span>: {{$page['intro']}}
                    </p>
                    @endif
                    @if ($page['type']=="main" || $page['type']=="about")
                    <p>
                        <span style="color:red">button_text</span>: {{$page['button_text']}}
                    </p>
                    @endif
                    @if ($page['type']!="main" && $page['type']!="portfolio")
                    <p>
                        <span style="color:red">text</span>: {{$page['text']}}
                    </p>
                    @endif
                    @if ($page['type']=='about')
                    <p>
                        <span style="color:red">img</span>: <img src="{{$page['img']}}" alt="" style="width:320px"> 
                    </p>
                    @endif
                    <p>
                        <span style="color:red">type</span>: 
                    </p> --}}
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
                                            <a href="/dashboard/socials/edit/{{$social['id']}}" style="margin-right: 15px"><i class="fa-solid fa-pen"></i></a>
                                            <a href="/dashboard/socials/delete/{{$social['id']}}"><i class="fa-solid fa-trash-can"></i></a>
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
                    {{-- <p>
                        <span style="color:red">actions</span>: <a href="/dashboard/pages/edit/{{$page['id']}}">edit</a>
                    </p> --}}
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
    </div>
</x-app-layout>
