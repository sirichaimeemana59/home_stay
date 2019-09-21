<?php
namespace App;
use App\GeneralModel;
use Illuminate\Foundation\Application;

class Districts extends GeneralModel
{
    protected $table = 'districts';
	public $timestamps = false;

    /*public function getDistricts()
    {	
        $lang = app()->getLocale();
        $districts = $this->orderBy('name_'.$lang, 'ASC')->pluck('name_'.$lang,'id')->toArray();
        asort($districts);
        $districtsFirst = array(''=> trans('messages.AboutProp.district'));
        $districtsAll = $districtsFirst + $districts;
        return $districtsAll;
    }*/

    public function getDistricts()
    {
        $lang = app()->getLocale();
        $districts = $this->orderBy('name_'.$lang, 'ASC')->pluck('name_'.$lang,'id')->toArray();
        asort($districts);
        $districtsFirst = array(''=> trans('messages.AboutProp.district'));
        $districtsAll = $districtsFirst + $districts;
        return $districtsFirst;
    }
}
