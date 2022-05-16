<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            page/edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    page/edit
                </div>

                <form method="POST" action="/dashboard/pages/update/{{$page['id']}}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <p>
                        <span style="color:red">id</span>: {{$page['id']}}
                    </p>
                    <p>
                        <span style="color:red">name</span> : 
                        <input type="text" name="name" value="{{$page['name']}}">
                    </p>
                    <p>
                        <span style="color:red">url</span>: 
                        <input type="text" name="url" value="{{$page['url']}}">
                    </p>
                    <p>
                        <span style="color:red">title</span>: 
                        <input type="text" name="title" value="{{$page['title']}}">
                    </p>
                    @if ($page['type']=="main")
                    <p>
                        <span style="color:red">intro</span>: 
                        <input type="text" name="intro" value="{{$page['intro']}}">
                    </p>
                    @endif
                    @if ($page['type']=="main" || $page['type']=="about")
                    <p>
                        <span style="color:red">button_text</span>:
                        <input type="text" name="button_text" value="{{$page['button_text']}}">
                    </p>
                    @endif
                    @if ($page['type']!="main" && $page['type']!="portfolio")
                    <p>
                        <span style="color:red">text</span>: 
                        <input type="text" name="text" value="{{$page['text']}}">
                    </p>
                    @endif
                    @if ($page['type']=='about')
                    <p>
                        <span style="color:red">img</span>:
                        <img src="{{$page['img']}}" alt="" style="width:320px;" id="img">
                        <div id="remove_img" onclick="hideImg()">Удалить изображение</div>
                        <input type="hidden" name="image_url" value="{{$page['img']}}">
                        <input type="hidden" value="0" name="remove_img" id="input_remove_img">
                        <input id="add_img" type="file" id="image" name="image">
                    </p>
                    @endif
                    <p>
                        <span style="color:red">type</span>: {{$page['type']}}
                    </p>
                    <input type="submit" value="Submit">
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
