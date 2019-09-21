<?php

namespace App\Http\Controllers\SuperAdmin;

use Request;
use App\Http\Controllers\Controller;
use App\Property_Home_Stay;

class PropertyController extends Controller
{

    public function index()
    {
        if(Request::method('post')){
        $property = new Property_Home_Stay;
        $p_row = $property->paginate(50);

            return view('property.list_property')->with(compact('p_row'));
        }else{
            return view('property.list_property_element')->with(compact('p_row'));
        }
    }


    public function create()
    {
        $property = new Property_Home_Stay;
        $property->name_en  = Request::input('name_en');
        $property->name_th  = Request::input('name_th');
        $property->province_id  = Request::input('province_id');
        $property->distric_id   = Request::input('distric_id');
        $property->sub_dis  = Request::input('sub_dis');
        $property->code = Request::input('code');
        $property->address  = Request::input('address');
        $property->phone    = Request::input('phone');
        $property->owner    = Request::input('owner');
        $property->email    = Request::input('email');
        $property->location = Request::input('location');
        $property->save();

        return redirect('super_admin/list_property');
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
