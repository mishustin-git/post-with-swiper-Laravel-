<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Social;
use App\Models\Contacts;
use App\Models\Swiper;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        if (!$id){
            $pages = Page::all();
            return view('pages.index',['pages'=>$pages]);
        }
        else{
            $page = Page::find($id);
            if ($page){
                $swipers = Swiper::where('swiper_table','=','pages')
                    ->where('swiper_id','=',$id)
                    ->get()
                    ->toArray();
                if (count($swipers) == 0){
                    $swipers = -1;
                }
                if ($page['type']=='сontact'){
                    $socials = Social::all();
                    $contacts = Contacts::find(1);
                    return view('page.index',['page'=>$page,'socials'=>$socials,'contacts'=>$contacts,'swipers'=>0]);
                }
                else{
                    if ($page['type']=='main'){
                        return view('page.index',['page'=>$page,'swipers'=>$swipers]);
                    }
                    else{
                        return view('page.index',['page'=>$page,'swipers'=>0]);
                    }
                }
            }
            else{
                return redirect('/dashboard/pages/');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        // return $id;
        $page = Page::find($id);
        if ($page){
            // ищем возможные элементы свайпера
            $swipers = Swiper::where('swiper_table','=','pages')
                    ->where('swiper_id','=',$id)
                    ->get()
                    ->toArray();
            if (count($swipers) == 0){
                $swipers = -1;
            }
            if ($page['type']=='сontact'){
                $socials = Social::all();
                $contacts = Contacts::find(1);
                return view('page.edit',['page'=>$page,'socials'=>$socials,'contacts'=>$contacts,'swipers'=>0]);
            }
            else{
                if ($page['type']=='main'){
                    return view('page.edit',['page'=>$page,'swipers'=>$swipers]);
                }
                else{
                    return view('page.edit',['page'=>$page,'swipers'=>0]);
                }
            }
        }
        else{
            return redirect('/dashboard/pages/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_arr = $request->all();
        $page = Page::find($id);
        if ($page)
        {
            $page->url = $request_arr['url'];
            $page->title = $request_arr['title'];
            $page->name = $request_arr['name'];
            switch ($page['type']){
                case "main":
                    $page->intro = $request_arr['intro'];
                    $page->button_text = $request_arr['button_text'];
                    $page->save();
                    return redirect('/dashboard/pages/edit/'.$page['id']);
                    break;
                case "about":
                    $page->button_text = $request_arr['button_text'];
                    $page->text = $request_arr['text'];
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
                            $request->file('image')->storeAs('public/pages', $fileNameToStore);
                        }
                        else {
                            $fileNameToStore = 'noimage.jpg';
                        }
                        // формируем название файла для базы данных
                        $fileNameToBD = "/storage/pages/".$fileNameToStore;
                        // теперь записываем новую картинку
                        $page->img = $fileNameToBD;
                    }
                    $page->save();
                    return redirect('/dashboard/pages/edit/'.$page['id']);
                    break;
                case "portfolio":
                    $page->save();
                    return redirect('/dashboard/pages/edit/'.$page['id']);
                    break;
                case "services":
                    $page->text = $request_arr['text'];
                    $page->save();
                    return redirect('/dashboard/pages/edit/'.$page['id']);
                    break;
                case "сontact":
                    $page->text = $request_arr['text'];
                    $page->save();
                    return redirect('/dashboard/pages/edit/'.$page['id']);
                    break;
                default:  
                    return redirect('/dashboard/pages/');
            }
        }
        else{
            return redirect('/dashboard/pages/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
