<?php

namespace App\Http\Controllers\Admin_home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Property_Home_Stay;
use App\home_stay;
use App\room_home_stay_transection;


class AdminhomeController extends Controller
{

    public function index(Request $request)
    {
        $home_stay = new home_stay;

        if($request->method('post')){
            if($request->input('name')){
                $home_stay = $home_stay->where('name_th','like',"%".$request->input('name')."%")
                    ->orWhere('name_en','like',"%".$request->input('name')."%");
            }
        }

        $home_stay = $home_stay->where('property_id',Session::get('id_property'));
        $p_row = $home_stay->paginate(50);

        if($request->ajax()){
            return view('admin_home_stay.list_home_element')->with(compact('p_row'));
        }else{
            return view('admin_home_stay.list_home')->with(compact('p_row'));
        }
    }


    public function create(Request $request)
    {
        //dd($request->input('data'));
        $home_stay = new home_stay;
        $home_stay->property_id = Session::get('id_property');
        $home_stay->name_th = $request->input('name_th');
        $home_stay->name_en = $request->input('name_en');
        $home_stay->phone = $request->input('phone');
        $home_stay->owner = $request->input('owner');
        $home_stay->location = $request->input('location');
        //dd($home_stay);
        $home_stay->save();

        if(!empty($request->input('data'))){
            foreach ($request->input('data') as $t){
                $room_home_stay_transection = new room_home_stay_transection;
                $room_home_stay_transection->property_id = Session::get('id_property');
                $room_home_stay_transection->type_id = $t['type_id'];
                $room_home_stay_transection->home_stay_id = $home_stay->id;
                $room_home_stay_transection->amount = $t['amount'];
                $room_home_stay_transection->detail = $t['detail'];
                $room_home_stay_transection->price = $t['price'];
                $room_home_stay_transection->save();
            }
        }
        return redirect('/admin_home_stay');
    }

    public function form()
    {
        return view('admin_home_stay.form_create');
    }


    public function show(Request $request)
    {
        $home = home_stay::find($request->input('id'));

        return view('admin_home_stay.view')->with(compact('home'));
    }


    public function edit($id = null)
    {
        $home = home_stay::find($id);

        return view('admin_home_stay.edit')->with(compact('home'));
    }


    public function update(Request $request)
    {
        //dd($request->input('data_'));
        $home_stay = home_stay::find($request->input('id_hidden'));
        $home_stay->property_id = $request->input('id_hidden_property');
        $home_stay->name_th = $request->input('name_th');
        $home_stay->name_en = $request->input('name_en');
        $home_stay->phone = $request->input('phone');
        $home_stay->owner = $request->input('owner');
        $home_stay->location = $request->input('location');
        $home_stay->save();

        if(!empty($request->input('data_'))){
            //dd($request->input('data_'));
            foreach ($request->input('data_') as $y){
                $room_home_stay_transection = room_home_stay_transection::find($y['id_room']);
                $room_home_stay_transection->property_id = Session::get('id_property');
                $room_home_stay_transection->type_id = $y['type_id'];
                $room_home_stay_transection->home_stay_id = $request->input('id_hidden');
                $room_home_stay_transection->amount = $y['amount'];
                $room_home_stay_transection->detail = $y['detail'];
                $room_home_stay_transection->price = $y['price'];
                $room_home_stay_transection->save();
            }
        }

        if(!empty($request->input('data'))){
            foreach ($request->input('data') as $t){
                $room_home_stay_transection = new room_home_stay_transection;
                $room_home_stay_transection->property_id = Session::get('id_property');
                $room_home_stay_transection->type_id = $t['type_id'];
                $room_home_stay_transection->home_stay_id = $request->input('id_hidden');
                $room_home_stay_transection->amount = $t['amount'];
                $room_home_stay_transection->detail = $t['detail'];
                $room_home_stay_transection->price = $t['price'];
                $room_home_stay_transection->save();
            }
        }

        return redirect('/admin_home_stay');
    }

    public function destroy(Request $request)
    {
        $home = home_stay::find($request->input('id'));
        $home->delete();
    }

    public function delete_room(Request $request){
        $home = room_home_stay_transection::find($request->input('id'));
        $home->delete();
    }
}
