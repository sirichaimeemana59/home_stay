<?php

namespace App\Http\Controllers\Is_admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Property_Home_Stay;

class Is_adminController extends Controller
{

    public function index_ADMIN($id = null)
    {
        Session::put('id_property',$id);

        return  redirect('/home_property');
    }

    public function index()
    {
        $property = Property_Home_Stay::find(Session::get('id_property'));

        Session::put('name_property',$property->{'name_'.Session::get('locale')});
//dd(Session::get('locale'));
        return  redirect('/admin_home_stay');
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
