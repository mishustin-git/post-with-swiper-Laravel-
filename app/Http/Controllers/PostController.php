<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Swiper;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null){
        if (!empty($id))
        {
            $posts = Post::find($id);
            if ($posts)
            {
                $swipers = Swiper::where('post_id', $id)->get()->toArray();
                if ($swipers){
                    return view('post.index',['posts'=>$posts,'swipers'=>$swipers]);
                }
                else{
                    return view('post.index',['posts'=>$posts,'swipers'=>'-1']);
                }
            }
            else{
                return redirect('/dashboard/posts/');
            }
        }
        else{
            $posts = Post::all()->toArray();
            if ($posts)
            {
                return view('posts.index',['posts'=>$posts]);
            }
            else
            {
                return view('posts.index',['posts'=>'-1']);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('posts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request_arr = $request->all();
        if ($request_arr['title'] && $request_arr['description'] && $request_arr['list']){
            $new_post = new Post;
            // заполнение стандартных свойств
            $new_post->title = $request_arr['title'];
            $new_post->beauty_description = $request_arr['description'];
            $new_post->beauty_list = $request_arr['list'];
            $new_post->slug = $request_arr['slug'];
            // загрузка главного изображения
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
            $new_post->img_main = $fileNameToBD;
            $new_post->save();
            return redirect('/dashboard/posts/edit/'.$new_post['id']);
        }
        else{
            return redirect()->route('posts/add');
        }
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
        $post = Post::find($id);
        if ($post)
        {
            $swipers = Swiper::where('post_id',$id)->get()->toArray();
            if($swipers)
            {
                return view('post.edit',['post'=>$post,'swipers'=>$swipers]);
            }
            else{
                return view('post.edit',['post'=>$post,'swipers'=>'-1']);
            }
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
    public function update(Request $request){
        $request_arr = $request->all();
        $int_id = intval($request_arr['id']);
        $current_post = Post::find($int_id);
        // перезаписываем новыми значениями
        $current_post->title = $request_arr['title'];
        $current_post->beauty_description = $request_arr['description'];
        $current_post->beauty_list = $request_arr['list'];
        $current_post->slug = $request_arr['slug'];
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
            $current_post->img_main = $fileNameToBD;
        }
        $current_post->save();
        return redirect('/dashboard/posts/'.$request_arr['id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $post = Post::find($id);
        $swipers = Swiper::where('post_id',$id)->get()->toArray();
        // сначала удаляем элементы swiper
        if ($swipers)
        {
            $swiper_id = [];
            foreach($swipers as $swiper){
                array_push($swiper_id,$swiper['id']);
                $url_to_delete = str_replace('/storage','public',$swiper['img_swiper']);
                if(Storage::exists($url_to_delete)){
                    Storage::delete($url_to_delete);
                }
            }
            Swiper::destroy($swiper_id);
        }
        // после удаляем пост
        Post::destroy($id);
        return redirect('/dashboard/posts/');
    }
}
