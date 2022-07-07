<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            contacts/edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    contacts/edit
                </div>

                <form method="POST" action="/dashboard/contacts/update" style="display:flex;flex-direction:column">
                    @csrf
                        <p>
                            <span style="color:red">Contacts:</span>
                        </p>
                        <p>
                            <span style="color:red">mail</span> : 
                            <input type="text" name="mail" value="{{$contacts['mail']}}">
                        </p>
                        <p>
                            <span style="color:red">phone</span> : 
                            <input type="text" name="phone" value="{{$contacts['phone']}}">
                        </p>
                        <p>
                            <span style="color:red">addr</span> : 
                            <input type="text" name="addr" value="{{$contacts['addr']}}">
                        </p>
                        <p>
                            <span style="color:red">map_x</span> : 
                            <input type="text" name="map_x" value="{{$contacts['map_x']}}">
                        </p>
                        <p>
                            <span style="color:red">map_y</span> : 
                            <input type="text" name="map_y" value="{{$contacts['map_y']}}">
                        </p>
                        <input type="submit" value="Submit">
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
