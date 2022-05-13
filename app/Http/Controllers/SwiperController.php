<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Swiper;
use Illuminate\Support\Facades\Storage;

class SwiperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $post = Post::find($id);
        if ($post)
        {
            return view('swiper.add',['post_id'=>$id]);
        }
        else{
            return redirect('/dashboard/posts/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request_arr = $request->all();
        $new_swiper = new Swiper();
        $new_swiper->post_id = $request_arr['post_id'];
        $new_swiper->swiper_order = $request_arr['order'];
        //работа с картинками
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'. time().'.'.$extension;// Upload Image$path = 
            $request->file('image')->storeAs('public/swiper', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        $fileNameToBD = "/storage/swiper/".$fileNameToStore;
        // заполнение столбца главной картинки
        $new_swiper->img_swiper = $fileNameToBD;
        $new_swiper->save();
        return redirect('/dashboard/posts/'.$request_arr['post_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $swiper = Swiper::find($id);
        if ($swiper){
            return view('swiper.edit',['swiper'=>$swiper]);
        }
        else{
            return redirect('/dashboard/posts/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request_arr = $request->all();
        $int_id = intval($request_arr['id']);
        $current_swiper = Swiper::find($int_id);
        // перезаписываем новыми значениями
        $current_swiper->swiper_order = $request_arr['order'];
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
                $request->file('image')->storeAs('public/swiper', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            // формируем название файла для базы данных
            $fileNameToBD = "/storage/swiper/".$fileNameToStore;
            // теперь записываем новую картинку
            $current_swiper->img_swiper = $fileNameToBD;
        }
        $current_swiper->save();
        return redirect('/dashboard/posts/'.$current_swiper['post_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $curent_swiper = Swiper::find($id);
        if ($curent_swiper)
        {
            $url_to_delete = str_replace('/storage','public',$curent_swiper['img_swiper']);
            if(Storage::exists($url_to_delete)){
                Storage::delete($url_to_delete);
            };
            Swiper::destroy($id);
            return redirect('/dashboard/posts/'.$curent_swiper['post_id']);
        }
        else
        {
            return redirect('/dashboard/posts/');
        }
    }
}
