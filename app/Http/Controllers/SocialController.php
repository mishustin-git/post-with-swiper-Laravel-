<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;

class SocialController extends Controller
{
    public function create(){
        return view('socials.create');
    }
    public function store(Request $request){
        $request_arr = $request->all();
        $new_social = new Social;
        $new_social->title = $request_arr['title'];
        $new_social->link = $request_arr['link'];
        $new_social->icon_name = $request_arr['icon_name'];
        $new_social->save();
        return redirect('/dashboard/pages/edit/5');
    }
    public function edit($id){
        $social = Social::findOrFail($id);
        // $social = Social::All();
        // return $social;
        return view('socials.edit',['social'=>$social]);
    }
    public function update(Request $request, $id){
        $request_arr = $request->all();
        $social = Social::find($id);
        $social->title = $request_arr['title'];
        $social->link = $request_arr['link'];
        $social->icon_name = $request_arr['icon_name'];
        $social->save();
        return redirect('/dashboard/pages/edit/5');
    }
    public function destroy($id){
        Social::destroy($id);
        return redirect('/dashboard/pages/edit/5');
    }
}
