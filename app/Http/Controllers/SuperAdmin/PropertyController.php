<?php

namespace App\Http\Controllers\SuperAdmin;

use App\company;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Property_Home_Stay;
use App\Districts;
use App\Subdistricts;
use App\Province;
use App\User;

class PropertyController extends Controller
{

    public function index()
    {
        $property = new Property_Home_Stay;
        if(Request::method('post')) {
            if (Request::input('name')) {
                //dd(Request::input('name'));
                $property = $property->where('name_th', 'like', "%" . Request::input('name') . "%")
                    ->orWhere('name_en', 'like', "%" . Request::input('name') . "%");
            }
        }

        $p_row = $property->paginate(50);

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        if(!Request::ajax()){
            return view('property.list_property')->with(compact('p_row','provinces','districts','subdistricts'));
        }else{
            return view('property.list_property_element')->with(compact('p_row','provinces','districts','subdistricts'));
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

        $user = new User;
        $user->email = Request::input('email_admin');
        $user->password = Hash::make(Request::input('password'));
        $user->name = Request::input('name_admin');
        $user->role = 6;
        $user->property_id = $property->id;
        $user->save();

        return redirect('super_admin/list_property');
    }


    public function store(Request $request)
    {
        //
    }


    public function show()
    {
        $property = Property_Home_Stay::find(Request::input('id'));

        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        return view('property.view_property')->with(compact('property','provinces','districts','subdistricts'));
    }


    public function edit($id = null)
    {
        $property = Property_Home_Stay::find($id);
        $user = User::where('property_id',$id)->first();
//dd($user);
        $p = new Province;
        $provinces = $p->getProvince();

        $d = new Districts;
        $districts = $d->getDistricts();

        $s = new Subdistricts;
        $subdistricts = $s->getSubdistricts();

        return view('property.edit_property')->with(compact('property','provinces','districts','subdistricts','user'));
    }


    public function update()
    {
        $property =  Property_Home_Stay::find(Request::input('property_id'));
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
        //dd($property);

        if(!empty(Request::input('user_admin'))){
            $user = User::find(Request::input('user_admin'));
            $user->email = Request::input('email_admin');
            $user->password = empty(Request::input('password'))?$user->password:Hash::make(Request::input('password'));
            $user->name = Request::input('name_admin');
            $user->role = 6;
            $user->property_id = Request::input('property_id');
            $user->save();
        }else{
            $user = new User;
            $user->email = Request::input('email_admin');
            $user->password = Hash::make(Request::input('password'));
            $user->name = Request::input('name_admin');
            $user->role = 6;
            $user->property_id = Request::input('property_id');
            $user->save();
        }


        return redirect('super_admin/list_property');

    }


    public function destroy()
    {
        $property =  Property_Home_Stay::find(Request::input('id'));
        $property->delete();

        //return redirect('/super_admin/list_property');

    }

    public function dashboard(){
        return view('home_user.dashboard');
    }


    public function selectDistrict(){
        if(Request::isMethod('post')) {
            $d = new Districts;
            $d = $d->where('province_id',Request::get('id'));
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function Subdistrict(){
        if(Request::isMethod('post')){

            $s = new Subdistricts;
            $s = $s->where('district_id',Request::get('id'));
            $s = $s->get();
            return response()->json($s);
        }
    }


    public function selectDistrictEdit(){
        if(Request::isMethod('post')) {

            $property = Property_Home_Stay::find(Request::get('id'));
            //$p = Districts::find(Request::get('id'));

            $d = new Districts;
            $d = $d->where('province_id',$property['province_id']);
            $d = $d->get();

            return response()->json($d);
        }
    }

    public function editSubDis(){

        $property = Property_Home_Stay::find(Request::get('id'));

        $s = new Subdistricts;
        $s = $s->where('district_id',$property['distric_id']);
        $s = $s->get();

        return response()->json($s);
    }

    public function zip_code(){
        if(Request::isMethod('post')){
            $z = new Subdistricts;
            $z = $z->where('id',Request::get('id'));
            $z = $z->get();

            return response()->json($z);
        }
    }
}
