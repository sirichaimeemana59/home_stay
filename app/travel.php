<?php

namespace App;

use App\GeneralModel;

class travel extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'travels';
    protected $fillable = ['name_th','name_en','phone','location','user_id','detail_en','detail_th'];
    public $timestamps;

    public function join_tran(){
       return $this->hasMany('App\travel_transection','travel_id','id');
    }
}
