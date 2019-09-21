<?php

namespace App\Http\Controllers;

use Request;
use Auth;
use Redirect;
use DB;
use App\User;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Session::put('locale','en');
        //return view ('home_user.home_user');
        if( Auth::user()->role == 1){
            Redirect::to('/super_admin/dashboard')->send();
        }
    }
}
