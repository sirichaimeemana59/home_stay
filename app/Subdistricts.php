<?php
namespace App;
use App\GeneralModel;
use Illuminate\Foundation\Application;

class Subdistricts extends GeneralModel
{
    protected $table = 'subdistricts';
	public $timestamps = false;

    /*public function getSubdistricts()
    {	
        $lang = app()->getLocale();
        $subdistricts = $this->orderBy('name_'.$lang, 'ASC')->pluck('name_'.$lang,'id')->toArray();
        asort($subdistricts);
        $subdistrictsFirst = array(''=> trans('messages.AboutProp.subdistricts'));
        $subdistrictsAll = $subdistrictsFirst + $subdistricts;
        return $subdistrictsAll;
    }*/

    public function getSubdistricts()
    {
        $lang = app()->getLocale();
        $subdistricts = $this->orderBy('name_'.$lang, 'ASC')->pluck('name_'.$lang,'id')->toArray();
        asort($subdistricts);
        $subdistrictsFirst = array(''=> trans('messages.AboutProp.subdistricts'));
        $subdistrictsAll = $subdistrictsFirst + $subdistricts;
        return $subdistrictsFirst;
    }
}
