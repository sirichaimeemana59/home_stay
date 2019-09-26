<?php

namespace App;

use App\GeneralModel;

class travel_transection extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'travel_transections';
    protected $fillable = ['travel_id','photo'];
    public $timestamps;
}
