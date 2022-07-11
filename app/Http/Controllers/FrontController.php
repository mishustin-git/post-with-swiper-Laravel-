<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Swiper;
use App\Models\Contacts;
use App\Models\Social;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    public function main(){
        $page = Page::where(['type'=>'main'])->first();
        $temp= $page['id'];
        $swipers = Swiper::where(['swiper_table'=>'pages'])->where(['swiper_id'=>$temp])->orderBy('swiper_order','asc')->get();
        $pages = Page::all();
        $contacts = Contacts::first();
        $socials = Social::all();
        return view('front.main', ['swipers'=>$swipers,'main'=>$page,'pages'=>$pages,'contacts'=>$contacts,'socials'=>$socials]);
    }
    public function another($slug){
        $slug = "/".$slug;
        $page = Page::where(['url'=>$slug])->firstOrFail();
        $home = Page::where(['type'=>'main'])->first();
        $pages = Page::all();
        $contacts = Contacts::first();
        $socials = Social::all();
        $view = 'front.'.$page['type'];
        $temp = View::exists($view);
        if (View::exists($view)){
            return view($view, ['main'=>$page,'pages'=>$pages,'contacts'=>$contacts,'socials'=>$socials,'home'=>$home]);
        }
        else{
            abort(404);
        }
    }
}
