<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
class SettingsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Settings::all();
        // return $settings;
        return view('settings.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_array = $request->all();
        $new_settings = new Settings();
        $new_settings->title = $request_array['title'];
        $new_settings->info = $request_array['info'];
        $new_settings->save();
        return redirect()->route('settings.index');
        // return redirect('/dashboard/settings');
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
        //
        $need_setting = Settings::findOrFail($id);
        return view('settings.edit',['data'=>$need_setting]);
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
        $items_update = Settings::findOrFail($id);
        $items_update->title = $request->title;
        $items_update->info = $request->info;
        $items_update->save();
        return redirect('/dashboard/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_settings = Settings::findOrFail($id);
        $delete_settings->delete();
        return redirect('/dashboard/settings');
    }
}
