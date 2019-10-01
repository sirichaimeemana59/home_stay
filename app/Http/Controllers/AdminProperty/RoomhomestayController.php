<?php

namespace App\Http\Controllers\AdminProperty;

use App\Districts;
use App\home_stay;
use App\Property_Home_Stay;
use App\Province;
use App\room_home_stay_transection;
use App\Subdistricts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class RoomhomestayController extends Controller
{
    public function index(Request $request)
    {
        $home_stay = new room_home_stay_transection;
        if($request->method('post')){
            if($request->input('name')){
                $home_stay = $home_stay->where('name_th','like',"%".$request->input('name')."%")
                    ->orWhere('name_en','like',"%".$request->input('name')."%");
            }
        }

        $home_stay = $home_stay->where('property_id',Auth::user()->property_id);
        $p_row = $home_stay->paginate(50);

        if($request->ajax()){
            return view('home_admin_property.room_in_home_stay.list_room_element')->with(compact('p_row'));
        }else{
            return view('home_admin_property.room_in_home_stay.list_room')->with(compact('p_row'));
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
