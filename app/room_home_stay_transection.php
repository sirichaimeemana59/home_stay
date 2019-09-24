<?php

namespace App;

use App\GeneralModel;

class room_home_stay_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'room_home_stay_transections';
    protected $fillable = ['property_id','type_id','home_stay_id','amount'];
    public $timestamps;
}
