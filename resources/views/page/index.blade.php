<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            pages-index
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>
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
                        <span style="color:red">type</span>: {{$page['type']}}
                    </p>
                    @if ($page['type']=='сontact')
                        <p>
                            <span style="color:red">Contacts:</span>
                        </p>
                        <table>
                            <tr>
                                <th>id</th>
                                <th>mail</th>
                                <th>phone</th>
                                <th>addr</th>
                                <th>map_x</th>
                                <th>map_y</th>
                            </tr>
                            <tr>
                                <td>{{$contacts['id']}}</td>
                                <td>{{$contacts['mail']}}</td>
                                <td>{{$contacts['phone']}}</td>
                                <td>{{$contacts['addr']}}</td>
                                <td>{{$contacts['map_x']}}</td>
                                <td>{{$contacts['map_y']}}</td>
                                <td><a href="#">edit</a></td>
                            </tr>
                        </table>
                        <p>
                            <span style="color:red">Socials:</span>
                        </p>
                        <table>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>link</th>
                                <th>icon_name</th>
                                <th>action</th>
                            </tr>
                            @foreach ($socials as $social)
                            <tr>
                                <td>{{$social['id']}}</td>
                                <td>{{$social['title']}}</td>
                                <td>{{$social['link']}}</td>
                                <td>{{$social['icon_name']}}</td>
                                <td><a href="#">delete</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <a href="#">add_social</a>
                    @endif 
                    <p>
                        <span style="color:red">actions</span>: <a href="/dashboard/pages/edit/{{$page['id']}}">edit</a>
                    </p>
                    @if ($swipers != 0)
                    <table>
                        <tr>
                            <th>
                                img
                            </th>
                            <th>
                                order
                            </th>
                            <th>
                                actions
                            </th>
                        </tr>
                        @if($swipers!='-1')
                            @foreach($swipers as $swiper)
                                <tr>
                                    <td><img src="{{$swiper['img_swiper']}}" alt="" style="width:320px"></td>
                                    <td>{{$swiper['swiper_order']}}</td>
                                    <td style="display:flex;flex-direction:column">
                                        <a href="/dashboard/swiper/delete/{{$swiper['id']}}">delete</a>
                                        <a href="/dashboard/swiper/edit/{{$swiper['id']}}">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                    <form method="POST" action="/dashboard/swiper/add" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="swiper_id" value="{{$page['id']}}">
                        <input type="hidden" name="swiper_table" value="pages">
                        <input type="submit" value="add item">
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
