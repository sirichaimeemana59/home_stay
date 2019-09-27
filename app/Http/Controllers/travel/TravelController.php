<?php

namespace App\Http\Controllers\travel;

use App\new_transection;
use App\news;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ImageUploadAndResizer;
use Image;
use App\travel;
use App\travel_transection;
use Auth;

class TravelController extends Controller
{

    public function index(Request $request)
    {
        $travel = new travel;

        $p_row = $travel->paginate(50);
        if($request->ajax()){
            return view('travel.list_travel_element')->with(compact('p_row'));
        }else{
            return view('travel.list_travel')->with(compact('p_row'));
        }
    }


    public function create()
    {
        return view('travel.form');
    }

    public function store(Request $request)
    {
        $travel = new travel;
        $travel->name_th = $request->input('name_th');
        $travel->name_en = $request->input('name_en');
        $travel->phone = $request->input('phone');
        $travel->location = $request->input('location');
        $travel->detail_th = $request->input('detail_th');
        $travel->detail_en = $request->input('detail_en');
        $travel->user_id = Auth::user()->id;
        $travel->save();

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            foreach ($file as $row){
                $uploader_top = new ImageUploadAndResizer($row, 'images/photo');
                //$uploader_top->width = 1920;
                //$uploader_top->height = 800;
                $fileNameToDatabase = $uploader_top->execute();

                $tran = new travel_transection;
                $tran->travel_id = $travel->id;
                $tran->photo = $fileNameToDatabase;
                $tran->save();
            }
        }


        return redirect('/super_admin/list_travel');
    }

    public function show($id)
    {
        $travel = travel::find($id);

        return view('travel.view')->with(compact('travel'));
    }

    public function edit($id)
    {
        $travel = travel::find($id);

        return view('travel.edit')->with(compact('travel'));
    }

    public function update(Request $request)
    {
        $travel = travel::find($request->input('id'));
        $travel->name_th = $request->input('name_th');
        $travel->name_en = $request->input('name_en');
        $travel->phone = $request->input('phone');
        $travel->location = $request->input('location');
        $travel->detail_th = $request->input('detail_th');
        $travel->detail_en = $request->input('detail_en');
        $travel->user_id = Auth::user()->id;
        $travel->save();
        //dd($travel);

        if(!empty($request->file('photo'))){
            $file = $request->file('photo');
            foreach ($file as $row){
                $uploader_top = new ImageUploadAndResizer($row, 'images/photo');
                //$uploader_top->width = 1920;
                //$uploader_top->height = 800;
                $fileNameToDatabase = $uploader_top->execute();

                $tran = new travel_transection;
                $tran->travel_id = $travel->id;
                $tran->photo = $fileNameToDatabase;
                $tran->save();
            }
        }


        return redirect('/super_admin/list_travel');
    }

    public function destroy(Request $request)
    {
        $new = travel::find($request->input('id'));
        $new->delete();

        $tran =  travel_transection::where('travel_id',$new->id)->delete();
    }

    public  function delete_photo(Request $request){
        $tran = travel_transection::find($request->input('id'));
        $tran->delete();
    }
}
