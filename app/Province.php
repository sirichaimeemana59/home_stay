<?php
namespace App;
use App\GeneralModel;
use Illuminate\Foundation\Application;

class Province extends GeneralModel
{
    protected $table = 'provinces';
    public $timestamps = false;

    public function getProvince()
    {
        /*$lang = session()->get('lang');
        $provinces = array(''=> trans('messages.AboutProp.province') );
        return $provinces += $this->orderBy('name_'.$lang, 'ASC')->lists('name_'.$lang,'code')->toArray();*/

        $lang = app()->getLocale();
        $provinces = $this->orderBy('name_in_'.$lang, 'ASC')->pluck('name_in_'.$lang,'id')->toArray();
        asort($provinces);
        $provinceFirst = array(''=> trans('messages.AboutProp.province'));
        $provincesAll = $provinceFirst + $provinces;
        return $provincesAll;
    }
}
