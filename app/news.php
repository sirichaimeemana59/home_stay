<?php

namespace App;

use App\GeneralModel;

class news extends GeneralModel
{
    protected $primaryKey = 'id';
    protected $table = 'news';
    protected $fillable = ['name_th','name_en','user_id','detail_en','detail_th'];
    public $timestamps;

    public function join_tran_news(){
        return $this->hasMany('App\new_transection','news_id','id');
    }
}
