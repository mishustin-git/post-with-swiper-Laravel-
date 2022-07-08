<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    public function index(){
        $services = Services::all();
        return view("services.index",['services'=>$services]);
    }
    public function create(){
        return view("services.create");
    }
    public function store(Request $request){
        $request_arr = $request->all();
        if ($request_arr['title'] ){
            $new_post = new Services;
            // заполнение стандартных свойств
            $new_post->title = $request_arr['title'];
            $new_post->list_item_1 = $request_arr['list_item_1'];
            $new_post->list_item_2 = $request_arr['list_item_2'];
            $new_post->list_item_3 = $request_arr['list_item_3'];
            // загрузка главного изображения
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
                $request->file('image')->storeAs('public/services', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            $fileNameToBD = "/storage/services/".$fileNameToStore;
            // заполнение столбца главной картинки
            $new_post->img = $fileNameToBD;
            $new_post->save();
            return redirect('/dashboard/services');
        }
        else{
            return redirect()->route('/dashboard/services/create');
        }
        return $request_arr;
    }
    public function edit($id){
        $post = Services::find($id);
        if ($post)
        {
            return view('services.edit',['servise'=>$post]);
        }
        else{
            return redirect('/dashboard/services/');
        }
    }
    public function update(Request $request){
        $request_arr = $request->all();
        $int_id = intval($request_arr['id']);
        $current_post = Services::find($int_id);
        // перезаписываем новыми значениями
        $current_post->title = $request_arr['title'];
        $current_post->list_item_1 = $request_arr['list_item_1'];
        $current_post->list_item_2 = $request_arr['list_item_2'];
        $current_post->list_item_3 = $request_arr['list_item_3'];
        // обрабатываем картинку
        if ($request_arr['remove_img'] == 1){
            // изменяем путь вместо "storage" ставим "public"
            $img_url = str_replace('/storage','public',$request_arr['image_url']);
            // если такое изображение есть, тогда удаляем
            if(Storage::exists($img_url)){
                Storage::delete($img_url);
            }
            // Теперь загружаем картинку
            if ($request->hasFile('image')) {
                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
                $request->file('image')->storeAs('public/services', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            // формируем название файла для базы данных
            $fileNameToBD = "/storage/services/".$fileNameToStore;
            // теперь записываем новую картинку
            $current_post->img = $fileNameToBD;
        }
        $current_post->save();
        return redirect('/dashboard/services/');
    }
    public function destroy($id){
        $post = Services::find($id);
        $url_to_delete = str_replace('/storage','public',$post['img']);
        if(Storage::exists($url_to_delete)){
            Storage::delete($url_to_delete);
        }
        Services::destroy($id);
        return redirect('/dashboard/services');
    }
}
