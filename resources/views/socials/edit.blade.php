<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            social/edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    social/edit
                </div>

                <form method="POST" action="/dashboard/socials/update/{{$social['id']}}" style="display:flex;flex-direction:column" enctype="multipart/form-data">
                    @csrf
                    <p>
                        <span style="color:red">Socials:</span>
                    </p>
                    <p>
                        <span style="color:red">title</span> : 
                        <input type="text" name="title" value="{{$social['title']}}">
                    </p>
                    <p>
                        <span style="color:red">link</span> : 
                        <input type="text" name="link" value="{{$social['link']}}">
                    </p>
                    <p>
                        <span style="color:red">icon_name</span> : 
                        <input type="text" name="icon_name" value="{{$social['icon_name']}}">
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
