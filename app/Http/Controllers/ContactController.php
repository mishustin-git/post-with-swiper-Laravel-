<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function edit(){
        $contacts = Contacts::first();
        return view('contacts.edit',['contacts'=>$contacts]);
    }
    public function update(Request $request){
        $request_arr = $request->all();
        $contacts = Contacts::first();
        $contacts->mail = $request_arr['mail'];
        $contacts->phone = $request_arr['phone'];
        $contacts->addr = $request_arr['addr'];
        $contacts->map_x = $request_arr['map_x'];
        $contacts->map_y = $request_arr['map_y'];
        $contacts->save();
        return redirect('/dashboard/pages/edit/5');
    }
}
