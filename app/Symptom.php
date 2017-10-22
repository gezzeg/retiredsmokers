<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    //


   public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getDescriptionAttribute($value)
    {
        return ucfirst($value);
    }

    public function symptomRecord(){
    	//return $this->hasMany('App\SymptomRecord','symptom_records_id','id');
    	return $this->hasMany('App\SymptomRecord','symptom_records_id');
    }

}
