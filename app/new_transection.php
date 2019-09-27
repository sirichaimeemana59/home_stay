<?php

namespace App;

use App\GeneralModel;

class new_transection extends GeneralModel
{
    //new_transections
    protected $primaryKey = 'id';
    protected $table = 'new_transections';
    protected $fillable = ['news_id','photo'];
    public $timestamps;
}
