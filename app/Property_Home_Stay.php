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
        return $this->hasOne('App\Province','id','province_id');
    }

    public function join_Subdistricts(){
        return $this->hasOne('App\Subdistricts','id','sub_dis');
    }

    public function join_Districts(){
        return$this->hasOne('App\Districts','id','distric_id');
    }
}

