<?php

namespace App;

use App\GeneralModel;

class home_stay extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'home_stays';
    protected $fillable = ['property_id','name_th','name_en','phone','owner','location'];
    public $timestamps;

    public function join_transection(){
        return $this->hasMany('App\room_home_stay_transection','home_stay_id','id');
    }
}
