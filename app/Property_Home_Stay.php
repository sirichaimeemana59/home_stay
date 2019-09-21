<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property_Home_Stay extends Model
{
    protected $table = 'property_home_stays';
    protected $fillable = ['name_en','name_th','province_id','distric_id','sub_dis','code','address','phone','owner','email','location'];
    public $timestamps;
    protected $primaryKey = 'id';

    public function join_province(){
        return $this->hasOne('App\Province','province_id','id');
    }

    public function join_sub_distric(){
        return $this->hasOne('App\Subdistricts','sub_dis','id');
    }

    public function join_distric(){
        return$this->hasOne('App\Districts','distric_id','id');
    }
}

