<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forms;
// use Illuminate\Support\Facades\View;

class AjaxContactController extends Controller
{
    public function index(){
        return view('ajax-contact-us-form');
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:employees|max:255',
        //     'message' => 'required'
        // ]);
        
        $save = new Forms;
        
        $save->name = $request->name;
        $save->phone = $request->phone;
        $save->email = $request->email;
        $save->message = $request->message;
        // return "store"; 
        
        $save->save();
 
        return redirect('ajax-form')->with('status', 'Ajax Form Data Has Been validated and store into database');
    }
}
